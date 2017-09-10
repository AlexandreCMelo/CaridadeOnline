<?php

namespace Charis;

use \Eloquent;

class UserEntityRole extends Eloquent
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_entity_role';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'user_entity_role';
    const ID = 'id';
    const ID_USER = 'fk_user';
    const ID_ROLE = 'fk_role';
    const ID_ENTITY = 'fk_entity';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

}
