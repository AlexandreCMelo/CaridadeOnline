<?php

namespace Charis;

use \Eloquent;

class EntityActivity extends Eloquent
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'entity_activity';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'entity_activity';
    const ID = 'id';
    const NAME = 'id_entity';
    const ID_ACTIVITY = 'id_activity';
}
