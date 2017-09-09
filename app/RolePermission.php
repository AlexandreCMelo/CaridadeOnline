<?php

namespace Charis;

use \Eloquent;

class RolePermission extends Eloquent
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'role_permission';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'role_permission';
    const ID = 'id';
    const ID_ROLE = 'fk_role';
    const ID_PERMISSION = 'fk_permission';

}
