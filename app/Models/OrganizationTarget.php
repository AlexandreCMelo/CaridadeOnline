<?php

namespace Charis\Models;

/**
 * Class OrganizationTarget
 * @package Charis\Models
 *
 * @method getId()
 * @method getOrganizationId()
 * @method getTargetId()
 * @method setId($id)
 * @method setOrganizationId($organizationId)
 * @method setTargetId($targetId)
 */
class OrganizationTarget extends Model
{
    /**
     * Table parameters
     */
    const TABLE_NAME = 'organization_targets';

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
    const ID_ORGANIZATION = 'fk_organization';
    const ID_TARGET = 'fk_target';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        self::ID,
    ];


}
