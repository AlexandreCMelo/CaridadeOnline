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
    protected $table = 'roles';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'roles';
    const ID = 'id';
    const DISPLAY_NAME = 'display_name';
    const NAME = 'name';
    const DESCRIPTION = 'description';

    /**
     * Default Roles
     */
    const ID_ENTITY_FOLLOWER = 10;
    const ID_ENTITY_PARTNER = 20;
    const ID_ENTITY_MANAGER = 30;
    const ID_SYSADM = 1;
    const ID_NORMAL = 2;

    protected $guarded = [];


    public function users()
    {
        return $this->belongsToMany(User::class)->using(EntityRoleUser::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }


}
