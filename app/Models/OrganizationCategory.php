<?php

namespace Charis\Models;

use \Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Class OrganizationCategory
 * @package Charis\Models
 *
 * @method getId()
 * @method getOrganizationId()
 * @method getCategoryId()
 */
class OrganizationCategory extends Pivot
{

    /**
     * Table parameters
     */
    const TABLE_NAME = 'organization_categories';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    const ID = 'id';
    const ID_ORGANIZATION = 'fk_organization';
    const ID_CATEGORY = 'fk_category';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        self::ID,
    ];
}
