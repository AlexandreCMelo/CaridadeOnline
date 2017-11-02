<?php

namespace Charis\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use MAbadir\ElasticLaravel\ElasticEloquent;

/**
 * Class Organization
 * @package Charis\Models
 *
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
    use SoftDeletes, ElasticEloquent;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'organizations';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = self::TABLE_NAME;

    const ID = 'id';
    const ID_COUNTRY = 'country_id';
    const ID_TIMEZONE = 'timezone_id';
    const ID_LOCALE = 'locale_id';
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
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        self::ID,
    ];


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
     * Returns the DB name
     * @return mixed
     */
    public function getTable(){
        return self::TABLE_NAME;
    }

    /**
     * Returns the model primary key
     * @return mixed
     */
    public function getKey(){
        return $this->id;
    }

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
        return $this->belongsToMany(Target::class);
    }


    /**
     * Get organization activity collection
     */
    public function activities()
    {
        return $this->belongsToMany(Activity::class);
    }

    /**
     * Get organization category collection
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
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
    public function users()
    {
        return $this->belongsToMany(User::class, OrganizationRoleUser::TABLE_NAME);
    }

    /**
     * Get organization category collection
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, Comment::ID_ORGANIZATION, self::ID);
    }

    /**
     * @return mixed
     */
    public function followers()
    {
        return $this->belongsToMany(User::class, OrganizationRoleUser::TABLE_NAME)->where(OrganizationRoleUser::ID_ROLE, OrganizationRole::ID_ORGANIZATION_FOLLOWER)->get();
    }

    /**
     * @return mixed
     */
    public function managers()
    {
        return $this->belongsToMany(User::class, OrganizationRoleUser::TABLE_NAME)->where(OrganizationRoleUser::ID_ROLE, OrganizationRole::ID_ORGANIZATION_MANAGER)->get();
    }

    /**
     * @return mixed
     */
    public function partners()
    {
        return $this->belongsToMany(User::class, OrganizationRoleUser::TABLE_NAME)->where(OrganizationRoleUser::ID_ROLE, OrganizationRole::ID_ORGANIZATION_PARTNER)->get();
    }


}
