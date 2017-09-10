<?php

namespace Charis;

use \Eloquent;

class AddressType extends Eloquent
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'address_type';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'address_type';
    const ID = 'id';
    const NAME = 'name';
    const DESCRIPTION = 'description';
}
