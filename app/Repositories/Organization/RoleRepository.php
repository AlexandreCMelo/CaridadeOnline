<?php namespace Charis\Repositories\Organization;

use Charis\Models\Country;
use Charis\Models\Locale;
use Charis\Models\Organization;
use Auth;
use Charis\Models\OrganizationRole;
use Charis\Models\OrganizationRoleUser;
use Charis\Models\Timezone;

class RoleRepository implements IRoleRepository
{

    const DEFAULT_LIMIT = 10;

    /**
     * @param $userId
     * @param $organization
     * @param bool $role
     * @return bool
     */
    public function addUserToOrganization(
        $userId,
        $organization,
        $role = false
    ) {

        if(!$role) {
            $role = OrganizationRole::ID_ORGANIZATION_FOLLOWER;
        }

        $organizationRole = new OrganizationRoleUser();

        $organizationRole->{OrganizationRoleUser::ID_USER} = $userId;
        $organizationRole->{OrganizationRoleUser::ID_ORGANIZATION} = $organization;
        $organizationRole->{OrganizationRoleUser::ID_ROLE} = $role;

        if($organizationRole->save()){
            return true;
        }

        return false;
    }

    /**
     *
     */
    public function findManagerUsers()
    {
        // TODO: Implement findManagerUsers() method.
    }


}