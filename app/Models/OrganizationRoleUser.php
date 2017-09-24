<?php

namespace Charis\Models;

use \Illuminate\Database\Eloquent\Relations\Pivot;


class OrganizationRoleUser extends Pivot
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'organization_role_users';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'organization_role_users';
    const ID = 'id';
    const ID_USER = 'fk_user';
    const ID_ROLE = 'fk_role';
    const ID_ORGANIZATION = 'fk_organization';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

}
