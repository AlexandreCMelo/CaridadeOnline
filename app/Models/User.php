<?php

namespace Charis\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * @package Charis\Models
 *
 * @method getName()
 * @method getEmail()
 * @method getPhone()
 * @method getEnabled()
 * @method getPassword()
 * @method getSrc()
 * @method getActivated()
 * @method getCountry()
 * @method getTimezone()
 * @method getLocale()
 * @method getDeletedAt()
 * @method getCreatedAt()
 * @method getUpdatedAt()
 * @method getToken()
 * @method getRememberToken()
 */
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'users';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [self::DELETE_AT];

    const ID = 'id';
    const ID_COUNTRY = 'fk_country';
    const ID_TIMEZONE = 'fk_timezone';
    const ID_LOCALE = 'fk_locale';
    const ID_SYSTEM_ROLE = 'fk_system_role';
    const SRC = 'origin_id';
    const NAME = 'name';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const PHONE = 'phone';
    const ACTIVATED = 'enabled';
    const DELETE_AT = 'deleted_at';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const REMEMBER_TOKEN = 'remember_token';
    const TOKEN = 'token';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        self::ID
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'activated',
        'token',
        'signup_ip_address',
        'signup_confirmation_ip_address',
        'signup_sm_ip_address',
    ];

    /**
     * @return mixed
     */
    public function address()
    {
        return $this->morphMany(
            Address::class,
            'addressable',
            Address::OWNER_TYPE,
            Address::ID_OWNER
        );
    }

    /**
     * @return mixed
     */
    public function documents()
    {
        return $this->morphMany(
            Document::class,
            'addressable',
            Document::OWNER_TYPE,
            Document::ID_OWNER
        );
    }

    /**
     * @return Organization
     */
    public function organizations()
    {
        return $this->belongsToMany(Organization::class, OrganizationRoleUser::TABLE_NAME,OrganizationRoleUser::ID_USER, self::ID)->firstOr([]);
    }


}
