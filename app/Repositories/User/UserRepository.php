<?php namespace Charis\Repositories\User;

use Charis\Models\Role;
use Charis\Models\User;
use Charis\Models\Country;
use Charis\Models\Locale;
use Charis\Models\Timezone;
use Charis\Repositories\Organization\RoleRepository;
/**
 * Class TargetRepository
 * @package Charis\Repositories\Target
 */
class UserRepository implements IUserRepository
{

    const DEFAULT_LIMIT = 10;

    /**
     * @var RoleRepository
     */
    protected $organizationRoleRepository = null;

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return User::All();
    }

    /**
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

        if($user->save()){
            if(!empty($organizationId) && !empty($organizationRole)) {
                $this->getOrganizationRoleRepository()->addUserToOrganization(
                    $user->id, $organizationId, $organizationRole
                );
            }
            return $user;
        }

        return false;

    }

    public function remove($id)
    {
        // TODO: Implement remove() method.
    }

    public function findUser($id, $email, $countryId, $systemRole, $name, $deleted)
    {
        // TODO: Implement findUser() method.
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
    }

    public function findByEmail($email)
    {
        // TODO: Implement findByEmail() method.
    }

    public function findByCity($cityName)
    {
        // TODO: Implement findByCity() method.
    }

    public function findByCountry($countryId)
    {
        // TODO: Implement findByCountry() method.
    }

    public function findBySystemRole($systemRole)
    {
        // TODO: Implement findBySystemRole() method.
    }

    public function findByName($name)
    {
        // TODO: Implement findByName() method.
    }

    public function findDeletedUsers()
    {
        // TODO: Implement findDeletedUsers() method.
    }

    public function addOrganizationRole($userId, $organizationId, $roleId)
    {
        // TODO: Implement addOrganizationRole() method.
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