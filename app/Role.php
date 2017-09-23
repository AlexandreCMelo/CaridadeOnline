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
    const NAME = 'name';
    const DESCRIPTION = 'description';

    /**
     * Default Roles
     */
    const ID_NORMAL = 2;
    const ID_SYSTEM_ADMIN = 1;
    const ID_ORGANIZATION_FOLLOWER = 10;
    const ID_ORGANIZATION_PARTNER = 20;
    const ID_ORGANIZATION_MANAGER = 30;

    protected $guarded = [];


    public function users()
    {
        return $this->belongsToMany(User::class)->using(OrganizationRoleUser::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }


}
