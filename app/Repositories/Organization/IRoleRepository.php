<?php
namespace Charis\Repositories\Organization;

/**
 * Interface UserRepository
 * @package Charis\Repositories\Organization
 */
interface IRoleRepository
{
    public function addUserToOrganization($organizationId, $userId, $roleId);
}