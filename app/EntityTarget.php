<?php

namespace Charis;

use \Eloquent;

class EntityTarget extends Eloquent
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'entity_target';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'entity_target';
    const ID_ENTITY = 'fk_entity';
    const ID_TARGET = 'fk_target';


}
