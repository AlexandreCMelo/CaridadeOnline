<?php

namespace Charis;

use \Eloquent;

class EntityCategory extends Eloquent
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'entity_category';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'entity_category';
    const ID = 'id';
    const ID_ENTITY = 'fk_entity';
    const ID_CATEGORY = 'fk_category';


}
