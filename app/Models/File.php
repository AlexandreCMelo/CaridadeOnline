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
 */
class File extends Model
{

    const TABLE_NAME = 'files';

    /**
     * @var string
     */
    protected $table = self::TABLE_NAME;

    const ID = 'id';
    const ID_FILE_OWNER = 'owner_id';
    const ID_FILE_TYPE = 'file_type_id';
    const FILE_OWNER = 'owner';
    const NAME = 'name';
    const PATH = 'path';
    const SIZE = 'size';
    const MIME_TYPE = 'mime_type';
    const ATTRIBUTES = 'attributes';
    const CREATED_BY = 'created_by';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        self::ID,
    ];

    /**
     * Morph slug
     */
    const RELATION_SLUG = 'ownable';

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

    public function album(){
        return $this->hasOne(Album::class);
    }


}
