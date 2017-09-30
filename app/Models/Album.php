<?php

namespace Charis\Models;

/**
 * Class Album
 * @package Charis\Models
 *
 * @method getId()
 * @method getName()
 * @method getOrganizationId()
 * @method getUserId()
 * @method getCreatedAt()
 * @method getUpdatedAt() 
 * @method setId($id)
 * @method setName($name)
 * @method setOrganizationId($organizationId)
 * @method setUserId($userId)
 * @method setCreatedAt($createdAt)
 * @method setUpdatedAt($updatedAt)
 */
class Album extends Model
{

    const TABLE_NAME = 'albums';

    protected $table = self::TABLE_NAME;

    const ID = 'id';
    const NAME = 'name';
    const ID_ORGANIZATION = 'fk_organization';
    const CREATED_BY = 'created_by';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        self::ID
    ];

    /**
     * @return Organization
     */
    public function organization()
    {
        $this->hasOne(Organization::class, Organization::ID, self::CREATED_BY);
    }

    /**
     * @return Organization
     */
    public function user()
    {
        $this->hasOne(User::class, User::ID, self::ID_ORGANIZATION);
    }

    /**
     * @return File
     */
    public function files()
    {
        return $this->hasMany(File::class, File::ID, self::ID);
    }
}
