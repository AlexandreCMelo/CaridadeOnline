<?php

namespace Charis\Models;

/**
 * Class Document
 * @package Charis\Models
 *
 * @method getId()
 * @method getValue()
 * @method getTypeId()
 * @method getOwner()
 * @method getOwnerId()
 * @method getCreatedAt()
 * @method getUpdatedAt()
 * @method setId($id)
 * @method setValue()
 * @method setTypeId($typeId)
 * @method setOwner($ownerClass)
 * @method setOwnerId($ownerClass)
 * @method setCreatedAt($countryId)
 * @method setUpdatedAt($countryId)
 */
class Document extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'documents';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'documents';
    const ID = 'id';
    const ID_TYPE = 'fk_type';
    const ID_OWNER = 'fk_owner';
    const OWNER_TYPE = 'owner_type';
    const VALUE = 'value';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const RELATION_SLUG = 'addressable';


    /**
     * @return mixed
     */
    public function users()
    {
        return $this->morphMany(
            User::class,
            self::RELATION_SLUG,
            self::ID_OWNER,
            self::OWNER_TYPE
        );
    }

    /**
     * @return mixed
     */
    public function organizations()
    {
        return $this->morphMany(
            Organization::class,
            self::RELATION_SLUG,
            self::ID_OWNER,
            self::OWNER_TYPE
        );
    }

    /**
     * @return mixed
     */
    public function type()
    {
        return $this->hasOne(
            DocumentType::class,
            DocumentType::ID,
            self::ID_TYPE
        );
    }
}
