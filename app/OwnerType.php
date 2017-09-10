<?php

namespace Charis;

use Illuminate\Database\Eloquent\Model;

class OwnerType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'address_owner_type';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'address';
    const ID = 'id';
    const name = 'name';

    /**
     * Owner Types
     */
    const OWNER_TYPE_USER = 10;
    const OWNER_TYPE_ENTITY = 20;
}
