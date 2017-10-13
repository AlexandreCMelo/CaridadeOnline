<?php

namespace Charis\Models;

use \Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Class OrganizationRoleUser
 * @package Charis\Models
 *
 * @method getId()
 * @method getUserId()
 * @method getRoleId()
 * @method getOrganizationId() 
 */
class OrganizationRoleUser extends Pivot
{
    /**
     * Table parameters
     */
    const TABLE_NAME = 'organization_role_user';

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
    public $timestamps = true;

    const ID_USER = 'user_id';
    const ID_ROLE = 'role_id';
    const ID_ORGANIZATION = 'organization_id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        self::ID,
    ];

    /**
     * @return User
     */
    public function user()
    {
        return $this->hasOne(User::class, User::ID, self::ID_USER);
    }

    /**
     * @return OrganizationRole
     */
    public function organizationRole()
    {
        return $this->hasOne(OrganizationRole::class, OrganizationRole::ID, self::ID_ROLE);
    }


    /**
     * @return Organization
     */
    public function organization()
    {
        return $this->hasOne(Organization::class, Organization::ID, self::ID_ORGANIZATION);
    }

}
