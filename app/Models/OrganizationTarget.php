<?php

namespace Charis\Models;

class OrganizationTarget extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'organization_targets';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'organization_targets';
    const ID = 'id';
    const ID_ORGANIZATION = 'fk_organization';
    const ID_TARGET = 'fk_target';


}
