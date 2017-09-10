<?php

namespace Charis;

use \Illuminate\Database\Eloquent\Relations\Pivot;

class EntityCategory extends Pivot
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'entity_categories';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'entity_categories';
    const ID = 'id';
    const ID_ENTITY = 'fk_entity';
    const ID_CATEGORY = 'fk_category';


}
