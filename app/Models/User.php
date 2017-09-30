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
 * @method setName($name)
 * @method setEmail($email)
 * @method setPhone($phone)
 * @method setEnabled($enabled)
 * @method setPassword($password)
 * @method setSrc($src)
 * @method setActivated($activated)
 * @method setCountry($idCountry)
 * @method setTimezone($idTimezone)
 * @method setLocale($idLocale)
 * @method setDeletedAt($idLocale)
 * @method setCreatedAt($idLocale)
 * @method setUpdatedAt($idLocale)
 * @method setToken($idLocale)
 * @method setRememberToken($idLocale)

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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::NAME,
        self::EMAIL,
        self::PASSWORD,
        self::ID_COUNTRY,
        'activated',
        'token',
        'signup_ip_address',
        'signup_confirmation_ip_address',
        'signup_sm_ip_address',
        'fk_system_role'
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
    ];

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
     * @return mixed
     */
    public function address(){
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
    public function documents(){
        return $this->morphMany(
            Document::class,
                'addressable',
            Document::OWNER_TYPE,
            Document::ID_OWNER
        );
    }
}
