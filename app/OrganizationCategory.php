<?php

namespace Charis;

use \Illuminate\Database\Eloquent\Relations\Pivot;

class OrganizationCategory extends Pivot
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'organization_categories';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'organization_categories';
    const ID = 'id';
    const ID_ORGANIZATION = 'fk_organization';
    const ID_CATEGORY = 'fk_category';


}
