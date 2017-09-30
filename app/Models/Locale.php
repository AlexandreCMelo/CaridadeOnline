<?php

namespace Charis\Models;

/**
 * Class Locale
 * @package Charis\Models
 *
 * @method getId()
 * @method getName()
 * @method getCode()
 * @method getEnabled()
 * @method setId()
 * @method setCode()
 * @method setEnabled()
 * @method setName($name)
 */
class Locale extends Model
{

    /**
     * Table parameters
     */
    const TABLE_NAME = 'locales';
    
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
    public $timestamps = false;


    const ID = 'id';
    const CODE = 'code';
    const NAME = 'name';
    const ENABLED = 'enabled';
}
