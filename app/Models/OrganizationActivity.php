<?php

namespace Charis\Models;

use \Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Class OrganizationActivity
 * @package Charis\Models
 *
 * @method getId()
 * @method getOrganizationId()
 * @method getActivityId() 
 * @method setId($id)
 * @method setOrganizationId($organizationId)
 * @method setActivityId($activityId)
 */
class OrganizationActivity extends Pivot
{
    /**
     * Table parameters
     */
    const TABLE_NAME = 'organization_activities';

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
    const ID_ACTIVITY = 'fk_activity';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        self::ID,
    ];

}
