<?php

namespace Charis;

use \Eloquent;

class OwnerType extends Eloquent
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'owner_type';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'owner_type';
    const ID = 'id';
    const NAME = 'name';

    /**
     * Owner Types
     */
    const OWNER_TYPE_USER = 10;
    const OWNER_TYPE_ENTITY = 20;
}
