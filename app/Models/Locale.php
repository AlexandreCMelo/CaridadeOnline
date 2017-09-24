<?php

namespace Charis\Models;

class Locale extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'locales';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'locales';
    const ID = 'id';
    const CODE = 'code';
    const NAME = 'name';
    const ENABLED = 'enabled';
}
