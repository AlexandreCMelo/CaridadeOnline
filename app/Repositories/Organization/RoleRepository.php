<?php namespace Charis\Repositories\Organization;

use Charis\Models\Country;
use Charis\Models\Locale;
use Charis\Models\Organization;
use Auth;
use Charis\Models\OrganizationRole;
use Charis\Models\OrganizationRoleUser;
use Charis\Models\Timezone;
use Charis\Models\User;

class RoleRepository implements IRoleRepository
{

    const DEFAULT_LIMIT = 10;

    /**
     * @param $userId
     * @param $organizationId
     * @param bool $roleId
     * @return bool
     */
    public function addUserToOrganization(
        $userId,
        $organizationId,
        $roleId = false
    ) {

        if (!$roleId) {
            $roleId = OrganizationRole::ID_ORGANIZATION_FOLLOWER;
        }

        if($data = $this->findByOrganizationRoleUser($organizationId, $roleId, $userId)){
            $this->removeUserFromOrganization($organizationId, $userId);
        }

        $organizationRole = new OrganizationRoleUser();

        $organizationRole->{OrganizationRoleUser::ID_USER} = $userId;
        $organizationRole->{OrganizationRoleUser::ID_ORGANIZATION} = $organizationId;
        $organizationRole->{OrganizationRoleUser::ID_ROLE} = $roleId;

        if ($organizationRole->save()) {
            return true;
        }

        return false;
    }


    /**
     * @param $userId
     * @param $organizationId
     * @return bool
     */
    public function removeUserFromOrganization(
        $organizationId,
        $userId
    ) {

        $userRelation = OrganizationRoleUser::where(OrganizationRoleUser::ID_USER, $userId)
            ->where(OrganizationRoleUser::ID_ORGANIZATION, $organizationId);

        if ($userRelation->delete()) {
            return true;
        }

        return false;
    }

    /**
     * @param $organizationId
     * @param $roleId
     * @return bool
     */
    public function findUsersByOrganizationRole($organizationId, $roleId)
    {
        $data = OrganizationRoleUser::where(OrganizationRoleUser::ID_ROLE, $roleId)
            ->where(OrganizationRoleUser::ID_ORGANIZATION, $organizationId)->pluck(OrganizationRoleUser::ID_USER);

        if($data->count()){
            return $data;
        }

        return false;
    }

    /**
     * @param $organizationId
     * @param $roleId
     * @param $userId
     * @return bool
     */
    public function findByOrganizationRoleUser($organizationId, $roleId, $userId)
    {
        $data = OrganizationRoleUser::where(OrganizationRoleUser::ID_ROLE, $roleId)
            ->where(OrganizationRoleUser::ID_ORGANIZATION, $organizationId)
            ->where(OrganizationRoleUser::ID_USER, $userId)->get();

        if($data->count()){
            return $data;
        }

        return false;
    }

}