<?php

namespace Charis\Models;

class Timezone extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'timezones';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'timezones';
    const ID = 'id';
    const NAME = 'name';
    const COUNTRY_CODE = 'country_code';
    const COORDINATES = 'coordinates';
    const NOTES = 'notes';
    const COORDINATED_UNIVERSAL_TIME_OFFSET = 'utc_offset';
    const COORDINATED_UNIVERSAL_TIME_DAYLIGHT_SAVING_TOME_OFFSET = 'utc_dist_offset';
    const COMMENTS = 'comments';
}