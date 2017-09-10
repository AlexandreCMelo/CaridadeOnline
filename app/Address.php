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
    protected $table = 'address';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'address';
    const ID = 'id';
    const ID_TYPE = 'fk_type';
    const ID_OWNER_TYPE = 'fk_owner_type';
    const ID_OWNER = 'fk_owner';
    const ID_COUNTRY = 'fk_country';
    const ADDRESS = 'address';
    const STATE = 'state';
    const DISTRICT = 'district';
    const CITY = 'city';
    const ZIP_CODE = 'zip_code';


}
