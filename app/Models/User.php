<?php

namespace Charis\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'users';
    const ID = 'id';
    const ID_COUNTRY = 'fk_country';
    const ID_TIMEZONE = 'fk_timezone';
    const ID_LOCALE = 'fk_locale';
    const SRC = 'src';
    const NAME = 'name';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const STATE = 'state';
    const CITY = 'city';
    const DISTRICT = 'district';
    const ADDRESS = 'address';
    const ZIP_CODE = 'zipcode';
    const PHONE = 'phone';
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
    protected $table = 'users';

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
        self::ID_COUNTRY
    ];

    /**-
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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
