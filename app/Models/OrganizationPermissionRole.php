<?php

namespace Charis\Models;

use \Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Class OrganizationPermissionRole
 * @package Charis\Models
 *
 * @method getId()
 * @method getOrganizationRoleId()
 * @method getPermissionId()
 */
class OrganizationPermissionRole extends Pivot
{

    /**
     * Table parameters
     */
    const TABLE_NAME = 'organization_role_permission';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    const ID_ROLE = 'organization_role_id';
    const ID_PERMISSION = 'permission_id';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        self::ID,
    ];
}
