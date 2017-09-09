<?php

namespace Charis;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * User fields
     */
    const TABLE_NAME = 'user';
    const ID = 'id';
    const SRC = 'src';
    const NAME = 'name';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const ID_COUNTRY = 'fk_country';
    const STATE = 'state';
    const CITY = 'city';
    const DISTRICT = 'district';
    const ADDRESS = 'address';
    const ZIP_CODE = 'zipcode';
    const PHONE = 'phone';
    const TIMEZONE_CODE = 'fk_timezone';
    const LOCALE_CODE = 'locale';
    const ATTRIBUTES = 'attributes';
    const DELETE_AT = 'deleted_at';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const REMEMBER_TOKEN = 'remember_token';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::NAME,
        self::EMAIL,
        self::PASSWORD,
        self::ID_COUNTRY
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
