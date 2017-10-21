<?php namespace Charis\Repositories\User;

use Charis\Models\Role;
use Charis\Models\User;
use Charis\Models\Country;
use Charis\Models\Locale;
use Charis\Models\Timezone;
use Charis\Models\Address;
use Charis\Repositories\Organization\RoleRepository;
use Charis\Service\FileService;

/**
 * Class TargetRepository
 * @package Charis\Repositories\Target
 */
class UserRepository implements IUserRepository
{
    /**
     *
     */
    const DEFAULT_LIMIT = 10;

    /**
     * @var RoleRepository
     */
    protected $organizationRoleRepository = null;

    /**
     * @var FileService
     */
    protected $fileService = null;

    /**
     * List all users
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function all()
    {
        return User::all();
    }

    /**
     * Add a user
     *
     * @param $name
     * @param $email
     * @param $enabled
     * @param $token
     * @param $password
     * @param $systemRole
     * @param bool $phone
     * @param bool $countryId
     * @param bool $timezoneId
     * @param bool $localeId
     * @param bool $origin
     * @param bool $organizationId
     * @param bool $organizationRole
     * @return bool|User
     */
    public function add(
        $name,
        $email,
        $enabled,
        $token,
        $password,
        $systemRole = false,
        $phone = false,
        $countryId = false,
        $timezoneId = false,
        $localeId = false,
        $origin = false,
        $organizationId = false,
        $organizationRole = false
    ) {
        $user = new User();

        $user->{User::NAME} = $name;
        $user->{User::EMAIL} = $email;
        $user->{User::ACTIVATED} = $enabled;
        $user->{User::TOKEN} = $token;
        $user->{User::PASSWORD} = bcrypt($password);
        $user->{User::ID_SYSTEM_ROLE} = $systemRole;

        if (!$phone == false) {
            $user->{User::PHONE} = $phone;
        }

        if ($countryId == false) {
            $user->{User::ID_COUNTRY} = Country::DEFAULT_COUNTRY_BRAZIL;
        }

        if ($timezoneId == false) {
            $user->{User::ID_TIMEZONE} = Timezone::DEFAULT_TIMEZONE_BRAZIL;
        }

        if ($localeId == false) {
            $user->{User::ID_LOCALE} = Locale::DEFAULT_LOCALE_BRAZIL;
        }

        if ($systemRole == false) {
            $user->{User::ID_SYSTEM_ROLE} = Role::ID_REGISTERED_USER;
        }

        if ($user->save()) {
            if (!empty($organizationId) && !empty($organizationRole)) {
                $this->getOrganizationRoleRepository()->addUserToOrganization(
                    $user->id, $organizationId, $organizationRole
                );
            }
            return $user->id;
        }

        return false;
    }

    public function edit(
        $id,
        $name = false,
        $email = false,
        $enabled = false,
        $systemRole = false,
        $phone = false,
        $countryId = false,
        $timezoneId = false,
        $localeId = false,
        $origin = false
    ) {
        $user = User::find($id);

        if ($name) {
            $user->name = $name;
        }

        if ($email) {
            $user->email = $email;
        }

        if ($enabled) {
            $user->enabled = $enabled;
        }

        if ($systemRole) {
            $user->systemRole = $systemRole;
        }

        if ($phone) {
            $user->phone = $phone;
        }

        if ($countryId) {
            $user->countryId = $countryId;
        }

        if ($timezoneId) {
            $user->timezoneId = $timezoneId;
        }

        if ($localeId) {
            $user->localeId = $localeId;
        }

        if ($origin) {
            $user->origin = $origin;
        }

        return $user->save();
    }

    /**
     * Remove a user
     *
     * @param $id
     * @return mixed
     */
    public function remove($id)
    {
        return User::find($id)->delete();
    }

    /**
     * Find a user
     *
     * @param bool $name
     * @param bool $email
     * @param bool $countryId
     * @param bool $cityName
     * @param bool $address
     * @param bool $systemRole
     * @param bool $deleted
     * @return mixed
     */
    public function findUser(
        $name = false,
        $email = false,
        $countryId = false,
        $cityName = false,
        $address = false,
        $systemRole = false,
        $deleted = false
    ) {
        $data = User::query();

        if ($name) {
            $data->where(User::NAME, 'like', '%' . $name . '%');
        }

        if ($email) {
            $data->where(User::EMAIL, $email);
        }

        if ($countryId) {
            $data->where(User::ID_COUNTRY, $countryId);
        }

        if ($systemRole) {
            $data->where(User::ID_SYSTEM_ROLE, $name);
        }

        if ($deleted) {
            $data->where(User::DELETE_AT, $name);
        }

        if ($address || $cityName) {
            $data->join(Address::TABLE_NAME, function ($join) use ($address) {
                $join->on(User::TABLE_NAME . '.' . User::ID, '=', Address::ID_OWNER)
                    ->raw(' and ' . \DB::raw(Address::OWNER_TYPE . " = '" . User::class . "'"));
            });

            if ($address) {
                $data->where(Address::ADDRESS, 'like', '%' . $address . '%');
            }

            if ($cityName) {
                $data->where(Address::CITY, 'like', '%' . $cityName . '%');
            }
        }


        return $data->get();
    }

    /**
     * Find users nearby
     *
     * @param $userId
     * @return bool
     */
    public function findNearbyOrganizations($userId)
    {
        $location = $this->location()->get()->first();
        if (!$location) {
            return false;
        }
        $lat = $location->latitud;
        $long = $location->longitud;
        if (empty($lat) || empty($long)) {
            return false;
        }
        $raw = '111.045 * DEGREES(ACOS(COS(RADIANS(' . $lat . ')) * COS(RADIANS(latitud)) * COS(RADIANS(longitud) - RADIANS(' . $long . ')) + SIN(RADIANS(' . $lat . ')) * SIN(RADIANS(latitud))))';
        $users = UserLocation::select('user_id', 'latitud', 'longitud', 'address',
            DB::raw($raw . ' AS distance'))->with('user')->where('user_id', '!=', $this->id)
            ->havingRaw('distance < 50')->orderBy('distance', 'ASC')->get();
        return $users;
    }


    /**
     * Find a user by Id
     *
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return User::find($id)->get();
    }

    /**
     * Find user by e-mail
     *
     * @param $email
     * @return mixed
     */
    public function findByEmail($email)
    {
        return $this->findUser(false, $email);
    }

    /**
     * Find users byt city
     *
     * @param $cityName
     * @return mixed
     */
    public function findByCity($cityName)
    {
        return $this->findUser(false, false, false, $cityName);
    }

    /**
     * Find users by country
     *
     * @param $countryId
     * @return mixed
     */
    public function findByCountry($countryId)
    {
        return $this->findUser(false, false, $countryId);
    }

    /**
     * Find users by system role
     *
     * @param $systemRole
     * @return mixed
     */
    public function findBySystemRole($systemRole)
    {
        return $this->findUser(false, false, false, false, false, $systemRole);
    }

    /**
     * Find user by name
     *
     * @param $name
     * @return mixed
     */
    public function findByName($name)
    {
        return $this->findUser($name);
    }

    /**
     * Lists the deleted users
     *
     * @return mixed
     */
    public function findDeletedUsers()
    {
        return User::onlyTrashed()->get();
    }

    /**
     *
     *
     * @param $userId
     * @param $organizationId
     * @param $roleId
     * @return bool
     */
    public function addOrganizationRole($userId, $organizationId, $roleId)
    {
        return $this->getOrganizationRoleRepository()->addUserToOrganization($userId, $organizationId, $roleId);
    }



    /**
     * @return RoleRepository
     */
    public function getOrganizationRoleRepository()
    {
        if ($this->organizationRoleRepository == null) {
            $this->organizationRoleRepository = new RoleRepository();
        }

        return $this->organizationRoleRepository;
    }


}
