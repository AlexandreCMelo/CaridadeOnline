<?php

namespace Charis\Repositories\User;

/**
 * Interface TargetRepository
 * @package Charis\Repositories\Target
 */
interface IUserRepository
{
    public static function all();

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
    );

    public function remove($id);

    public function findUser($name = false, $email = false, $countryId = false, $systemRole = false, $deleted = false);

    public function findById($id);

    public function findByEmail($email);

    public function findByCity($cityName);

    public function findByCountry($countryId);

    public function findBySystemRole($systemRole);

    public function findByName($name);

    public function findDeletedUsers();

    public function addOrganizationRole($userId, $organizationId, $roleId);
}
