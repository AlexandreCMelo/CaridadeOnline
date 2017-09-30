<?php

namespace Charis\Models;

/**
 * Class Timezone
 * @package Charis\Models
 *
 * @method getId()
 * @method getName()
 * @method getCountryCode()
 * @method getCoordinates()
 * @method getNotes()
 * @method getUtcOffset()
 * @method getUtcDistOffset()
 * @method getComments()
 * @method setId()
 * @method setName($name)
 * @method setCountryCode($code)
 * @method setCoordinates($coordinates)
 * @method setNotes($notes)
 * @method setUtcOffset($utcOffset)
 * @method setUtcDistOffset($utcDistOffset)
 * @method setComments($comments)
 */
class Timezone extends Model
{
    /**
     * Table parameters
     */
    const TABLE_NAME = 'timezones';

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
    const COUNTRY_CODE = 'country_code';
    const COORDINATES = 'coordinates';
    const NOTES = 'notes';
    const COORDINATED_UNIVERSAL_TIME_OFFSET = 'utc_offset';
    const COORDINATED_UNIVERSAL_TIME_DAYLIGHT_SAVING_TOME_OFFSET = 'utc_dist_offset';
    const COMMENTS = 'comments';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        self::ID,
    ];

}