<?php

namespace Charis;

use \Illuminate\Database\Eloquent\Relations\Pivot;

class EntityActivity extends Pivot
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
    const ID_ENTITY = 'fk_entity';
    const ID_ACTIVITY = 'fk_activity';


}
