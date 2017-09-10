<?php

namespace Charis;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permission';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'permission';
    const ID = 'id';
    const NAME = 'name';
    const DESCRIPTION = 'description';

    /**
     * Permission table parameters
     */
    const CAN_REPLY_ENTITY_MESSAGES = 10;
    const CAN_MANAGE_ENTITY = 20;
    const CAN_MANAGE_SYSTEM = 210210;
}
