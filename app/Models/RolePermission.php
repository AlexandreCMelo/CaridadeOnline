<?php

namespace Charis\Models;

use \Illuminate\Database\Eloquent\Relations\Pivot;

class RolePermission extends Pivot
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'role_permissions';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'role_permissions';
    const ID_ROLE = 'fk_role';
    const ID_PERMISSION = 'fk_permission';

}
