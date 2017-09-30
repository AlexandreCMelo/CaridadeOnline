<?php

namespace Charis\Models;

/**
 * Class OrganizationRole
 * @package Charis\Models
 *
 * @method getId()
 * @method getName()
 * @method getDescription()
 */
class OrganizationRole extends Model
{
    /**
     * Table parameters
     */
    const TABLE_NAME = 'organization_roles';

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

    const ID = 'id';
    const NAME = 'name';
    const DESCRIPTION = 'description';

    const ID_ORGANIZATION_FOLLOWER = 10;
    const ID_ORGANIZATION_PARTNER = 20;
    const ID_ORGANIZATION_MANAGER = 30;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        self::ID,
    ];
}

