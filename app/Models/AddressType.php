<?php

namespace Charis\Models;

/**
 * Class AddressType
 * @package Charis\Models
 *
 * @method getId()
 * @method getName()
 * @method getDescription()
 */
class AddressType extends Model
{

    const TABLE_NAME = 'address_types';

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
    const NAME = 'name';
    const DESCRIPTION = 'description';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        self::ID
    ];

}
