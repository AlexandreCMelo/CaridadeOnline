<?php
namespace Charis\Repositories\Target;

/**
 * Interface TargetRepository
 * @package Charis\Repositories\Target
 */
interface IUserRepository
{
    public function all();
    public function add($name, $email, $enabled, $token, $password, $systemRole, $countryId= false, $timezoneId = false, $localeId = false, $origin = false, $phone = false, $organizationId = false, $organizationRole = false);
    public function remove($id);
    public function findUser($id, $email, $countryId, $systemRole, $name, $deleted);
    public function findById($id);
    public function findByEmail($email);
    public function findByCity($cityName);
    public function findByCountry($countryId);
    public function findBySystemRole($systemRole);
    public function findByName($name);
    public function findDeletedUsers();
    public function addOrganizationRole($userId, $organizationId, $roleId);
}