<?php

namespace Charis\Models;

use \Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Class ActivityOrganization
 * @package Charis\Models
 *
 * @method getId()
 * @method getOrganizationId()
 * @method getActivityId() 
 */
class ActivityOrganization extends Pivot
{
    /**
     * Table parameters
     */
    const TABLE_NAME = 'activity_organization';

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
    const ID_ACTIVITY = 'activity_id';

}
