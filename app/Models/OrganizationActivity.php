<?php

namespace Charis\Models;

use \Illuminate\Database\Eloquent\Relations\Pivot;

class OrganizationActivity extends Pivot
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'organization_activities';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'organization_activities';
    const ID = 'id';
    const ID_ORGANIZATION = 'fk_organization';
    const ID_ACTIVITY = 'fk_activity';


}
