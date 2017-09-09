<?php

namespace Charis;

use \Eloquent;

class Locale extends Eloquent
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'locale';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'locale';
    const ID = 'id';
    const CODE = 'code';
    const NAME = 'name';
    const ENABLED = 'enabled';
}
