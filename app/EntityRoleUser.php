<?php

namespace Charis;

use \Illuminate\Database\Eloquent\Relations\Pivot;


class EntityRoleUser extends Pivot
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'entity_role_users';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'entity_role_users';
    const ID_USER = 'fk_user';
    const ID_ROLE = 'fk_role';
    const ID_ENTITY = 'fk_entity';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

}
