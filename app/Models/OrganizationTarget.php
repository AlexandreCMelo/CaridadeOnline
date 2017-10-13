<?php

namespace Charis\Models;
use \Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Class OrganizationTarget
 * @package Charis\Models
 *
 * @method getId()
 * @method getOrganizationId()
 * @method getTargetId()
 */
class OrganizationTarget extends Pivot
{
    /**
     * Table parameters
     */
    const TABLE_NAME = 'organization_target';

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

    const ID_ORGANIZATION = 'organization_id';
    const ID_TARGET = 'target_id';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        self::ID,
    ];


}
