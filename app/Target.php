<?php

namespace Charis;

use \Eloquent;

class Target extends Eloquent
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'target';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'target';
    const ID = 'id';
    const NAME = 'name';

}
