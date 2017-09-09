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
    public $timestamps = true;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'entity_target';
    const ID = 'id';
    const ID_ENTITY = 'id_entity';
    const ID_ACTIVITY = 'id_target';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


}
