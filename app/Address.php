<?php

namespace Charis;

use \Eloquent;

class Address extends Eloquent
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'addresses';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'addresses';
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
    const RELATION_SLUG = 'addressable';



    public function users()
    {
        return $this->morphMany(
            \Charis\User::class,
            self::RELATION_SLUG,
            self::ID_OWNER,
            self::OWNER_TYPE
        );
    }

    public function entitys()
    {
        return $this->morphMany(
            \Charis\Entity::class,
            self::RELATION_SLUG,
            self::ID_OWNER,
            self::OWNER_TYPE
        );
    }

}
