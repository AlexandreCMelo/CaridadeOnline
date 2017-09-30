<?php

namespace Charis\Models;

/**
 * Class AddressType
 * @package Charis\Models
 *
 * @method getId()
 * @method getName()
 * @method getDescription()
 * @method setId($id)
 * @method setName($name)
 * @method setDescription($description)
 */
class AddressType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'address_types';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'address_types';
    const ID = 'id';
    const NAME = 'name';
    const DESCRIPTION = 'description';
}
