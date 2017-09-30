<?php

namespace Charis\Models;

/**
 * Class Activation
 * @package Charis\Models
 *
 * @method getId()
 * @method getUserId()
 * @method getToken()
 * @method getIpAddress()
 * @method setId($id)
 * @method setUserId($userId)
 * @method setToken($token)
 * @method setIpAddress($ipAddress)
 */
class Activation extends Model
{

    const TABLE_NAME = 'activations';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * Table parameters
     */
    const ID = 'id';
    const ID_USER = 'user_id';
    const TOKEN = 'token';
    const IP_ADDRESS = 'ip_address';

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
        self::ID_USER,
        self::TOKEN,
        self::IP_ADDRESS
    ];

    /**
     * @return User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
