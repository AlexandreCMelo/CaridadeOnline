<?php

namespace Charis\Models;

/**
 * Class Address
 * @package Charis\Models
 *
 * @method getId()
 * @method getType()
 * @method getOwner()
 * @method getCountry()
 * @method getAddress()
 * @method getState()
 * @method getDistrict()
 * @method getCity()
 * @method getZipCode()
 * @method getLatitude()
 * @method getLongitude()
 */
class Address extends Model
{

    const TABLE_NAME = 'addresses';

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
    public $timestamps = true;

    /**
     * Table parameters
     */
    const ID = 'id';
    const ID_TYPE = 'fk_type';
    const ID_OWNER = 'fk_owner';
    const OWNER_TYPE = 'owner_type';
    const ID_COUNTRY = 'fk_country';
    const ADDRESS = 'address';
    const STATE = 'state';
    const DISTRICT = 'district';
    const CITY = 'city';
    const ZIP_CODE = 'zip_code';
    const LATITUDE = 'latitude';
    const LONGITUDE = 'longitude';

    /**
     * Morph slug
     */
    const RELATION_SLUG = 'addressable';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        self::ID
    ];

    /**
     * @return User
     */
    public function user()
    {
        return $this->morphMany(
            \Charis\User::class,
            self::RELATION_SLUG,
            self::ID_OWNER,
            self::OWNER_TYPE
        );
    }

    /**
     * @return Organization
     */
    public function organization()
    {
        return $this->morphMany(
            \Charis\Organization::class,
            self::RELATION_SLUG,
            self::ID_OWNER,
            self::OWNER_TYPE
        );
    }

}
