<?php

namespace Charis\Models;

use \Eloquent;

class Country extends Eloquent
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'country';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'country';
    const ID = 'id';
    const COUNTRY_NAME = 'country_name';
    const NAME = 'name';
    const ISO_3166_CODE = 'iso3_code';
    const NUM_CODE = 'num_code';
    const ISO_CODE = 'iso_code';
    const PHONE_CODE = 'phone_code';
    const SEQ = 'seq';
}