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
    const ID_ENTITY = 'fk_entity';
    const ID_CATEGORY = 'fk_category';


}
