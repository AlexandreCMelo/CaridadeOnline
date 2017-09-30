<?php

namespace Charis\Models;

/**
 * Class Role
 * @package Charis\Models
 *
 * @method getId()
 * @method getName()
 * @method getDescription()
 */
class Role extends Model
{

    const TABLE_NAME = 'roles';

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
    public $timestamps = false;

    /**
     * Table parameters
     */
    const ID = 'id';
    const NAME = 'name';
    const DESCRIPTION = 'description';

    /**
     * Default Roles
     */
    const ID_SYSTEM_ADMIN_USER = 100;
    const ID_REGISTERED_USER = 20;
    const ID_UNSUPERVISED_USER= 10;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        self::ID,
    ];

}
