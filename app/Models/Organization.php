<?php

namespace Charis\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Organization
 * @package Charis\Models
 *
 * @method setName($name)
 * @method setDescription($description)
 * @method setShortDescription($shortDescription)
 * @method setEmail($email)
 * @method setPhone($phone)
 * @method setWebsite($website)
 * @method setStatus($status)
 * @method setAttributes($attributes)
 * @method setSrc($src)
 * @method setCountry($idCountry)
 * @method setTimezone($idTimezone)
 * @method setLocale($idLocale)
 * @method getName()
 * @method getDescription()
 * @method getShortDescription()
 * @method getEmail()
 * @method getPhone()
 * @method getWebsite()
 * @method getStatus()
 * @method getSrc()
 * @method getCountry()
 * @method getTimezone()
 * @method getLocale()
 */
class Organization extends Model
{
    use SoftDeletes;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'organizations';
    const ID = 'id';
    const ID_COUNTRY = 'fk_country';
    const ID_TIMEZONE = 'fk_timezone';
    const ID_LOCALE = 'fk_locale';
    const SRC = 'origin_id';
    const NAME = 'name';
    const DESCRIPTION = 'description';
    const SHORT_DESCRIPTION = 'short_description';
    const EMAIL = 'email';
    const PHONE = 'phone';
    const WEBSITE = 'website';
    const ENABLED = 'enabled';
    const ATTRIBUTES = 'attributes';
    const DELETED_AT = 'deleted_at';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'organizations';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [self::DELETED_AT];

    /**
     * Get organization address collection
     * @return mixed
     */
    public function address(){
        return $this->morphMany('Address', 'addressable');
    }

    /**
     * Get organization target collection
     */
    public function targets()
    {
        return $this->hasMany(Target::class);
    }


    /**
     * Get organization category collection
     */
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    /**
     * Get organization category collection
     */
    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    /**
     * Get organization category collection
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, Comment::ID_ORGANIZATION, self::ID);
    }



}
