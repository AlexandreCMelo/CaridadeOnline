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
    const ID = 'id';
    const ID_COUNTRY = 'fk_country';
    const ADDRESS = 'address';
    const STATE = 'state';
    const DISTRICT = 'district';
    const CITY = 'city';
    const ZIP_CODE = 'zip_code';


}
