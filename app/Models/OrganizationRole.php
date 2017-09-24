<?php

namespace Charis\Models;

class OrganizationRole extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'organization_roles';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'organization_roles';
    const ID = 'id';
    const NAME = 'name';
    const DESCRIPTION = 'description';

    const ID_ORGANIZATION_FOLLOWER = 10;
    const ID_ORGANIZATION_PARTNER = 20;
    const ID_ORGANIZATION_MANAGER = 30;

}

