<?php

namespace Charis\Models;

use \Illuminate\Database\Eloquent\Relations\Pivot;

class OrganizationPermissionRole extends Pivot
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'organization_role_permissions';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'organization_role_permissions';
    const ID_ORGANIZATION_ROLE_PERMISSION = 'id_organization_role_permissions';
    const ID_ROLE = 'fk_role_organization_role';
    const ID_PERMISSION = 'fk_permission';

}
