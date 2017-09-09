<?php

namespace Charis;

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
    const ISO_3166_CODE = 'description';
    const NUM_CODE = 'description';
    const PHONE_CODE = 'description';
    const SEQ = 'description';
}