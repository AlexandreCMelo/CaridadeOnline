<?php

namespace Charis\Models;

class Role extends Eloquent
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'roles';
    const ID = 'id';
    const NAME = 'name';
    const DESCRIPTION = 'description';

    /**
     * Default Roles
     */
    const ID_SYSTEM_ADMIN_USER = 100;
    const ID_REGISTERED_USER = 20;
    const ID_UNSUPERVISED_USER= 10;



}
