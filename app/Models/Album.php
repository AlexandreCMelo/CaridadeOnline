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
 * @method setName()
 * @method setOrganizationId()
 * @method setOrganization()
 * @method setUserId()
 * @method setUser()
 * @method setCreatedAt()
 * @method setUpdatedAt()
 */
class Album extends Model
{

    const ID = 'id';
    const NAME = 'name';
    const ID_ORGANIZATION = 'fk_organization';
    const CREATED_BY = 'created_by';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const TABLE_NAME = 'albums';

    /**
     * @var string
     */
    protected $table = 'albums';

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
        return $this->belongsToMany(File::class, File::ID, self::ID);
    }
}
