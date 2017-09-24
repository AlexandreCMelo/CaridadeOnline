<?php

namespace Charis\Models;

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
