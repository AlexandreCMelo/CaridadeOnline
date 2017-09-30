<?php

namespace Charis\Models;

/**
 * Class File
 * @package Charis\Models
 *
 * @method getId()
 * @method getOwnerId()
 * @method getTypeId()
 * @method getOwner()
 * @method getName()
 * @method getPath()
 * @method getSize()
 * @method getMimeType()
 * @method getAttributes()
 * @method getDeletedAt()
 * @method getCreatedAt()
 * @method getUpdatedAt()
 * @method setId()
 * @method setOwnerId()
 * @method setTypeId()
 * @method setOwner()
 * @method setName()
 * @method setPath()
 * @method setSize()
 * @method setMimeType()
 * @method setAttributes()
 * @method setDeletedAt()
 * @method setCreatedAt()
 * @method setUpdatedAt()
 */
class File extends Model
{
    const ID = 'id';
    const ID_FILE_OWNER = 'fk_owner';
    const ID_FILE_TYPE = 'fk_tile_type';
    const FILE_OWNER = 'owner';
    const NAME = 'Name';
    const PATH = 'Path';
    const SIZE = 'size';
    const MIME_TYPE = 'mime_type';
    const ATTRIBUTES = 'attributes';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    /**
     * @var string
     */
    protected $table = 'files';

    /**
     * Morph slug
     */
    const RELATION_SLUG = 'ownable';

    const TABLE_NAME = 'files';


    /**
     * @return User
     */
    public function user()
    {
        return $this->morphMany(
            User::class,
            self::RELATION_SLUG,
            self::ID_FILE_OWNER,
            self::FILE_OWNER
        );
    }

    /**
     * @return Organization
     */
    public function organization()
    {
        return $this->morphMany(
            Organization::class,
            self::RELATION_SLUG,
            self::ID_FILE_OWNER,
            self::FILE_OWNER
        );
    }



}
