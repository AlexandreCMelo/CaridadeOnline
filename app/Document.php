<?php

namespace Charis;

use \Eloquent;

class Document extends Eloquent
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'document';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'document';
    const ID = 'id';
    const ID_OWNER_TYPE = 'fk_owner_type';
    const ID_OWNER = 'fk_owner';
    const VALUE = 'value';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

}
