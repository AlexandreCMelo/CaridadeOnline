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
 */
class Document extends Model
{

    const TABLE_NAME = 'documents';

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

    /**
     * Table parameters
     */
    const ID = 'id';
    const ID_TYPE = 'fk_type';
    const ID_OWNER = 'fk_owner';
    const OWNER_TYPE = 'owner_type';
    const VALUE = 'value';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const RELATION_SLUG = 'addressable';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        self::ID
    ];

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
