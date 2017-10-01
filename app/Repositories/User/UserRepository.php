<?php namespace Charis\Repositories\Target;

use Charis\Models\Role;
use Charis\Models\User;
use Charis\Models\Country;
use Charis\Models\Locale;
use Charis\Models\Timezone;
/**
 * Class TargetRepository
 * @package Charis\Repositories\Target
 */
class UserRepository implements IUserRepository
{

    const DEFAULT_LIMIT = 10;

    public function all()
    {
        return User::All();
    }

    public function add(
        $name,
        $email,
        $enabled,
        $token,
        $password,
        $systemRole,
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
        $user->{User::NAME} = $email;
        $user->{User::NAME} = $enabled;
        $user->{User::NAME} = $token;
        $user->{User::NAME} = bcrypt($password);
        $user->{User::NAME} = $systemRole;

        if (!$phone == false) {
            $user->{User::PHONE} = $phone;
        }

        if ($countryId == false) {
            $user->{User::NAME} = Country::DEFAULT_COUNTRY_BRAZIL;
        }

        if ($timezoneId == false) {
            $user->{User::NAME} = Timezone::DEFAULT_TIMEZONE_BRAZIL;
        }

        if ($localeId == false) {
            $user->{User::NAME} = Locale::DEFAULT_LOCALE_BRAZIL;
        }

        if ($systemRole == false) {
            $user->{User::NAME} = Role::ID_REGISTERED_USER;
        }


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


}