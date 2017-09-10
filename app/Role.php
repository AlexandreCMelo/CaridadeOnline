<?php

namespace Charis;

use \Eloquent;

class Role extends Eloquent
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'role';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'role';
    const ID = 'id';
    const NAME = 'name';
    const LABEL = 'label';

    /**
     * Default Roles
     */
    const ID_REGULAR_USER = 10;
    const ID_ENTITY_CONTACT = 20;
    const ID_ENTITY_MANAGER = 25;
    const ID_ADMIN = 210210;


    public function permissions()
    {
        return $this->hasMany(Document::class, Document::ID_TYPE);
    }
}
