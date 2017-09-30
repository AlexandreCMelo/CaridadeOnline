<?php

namespace Charis\Models;

/**
 * Class DocumentType
 * @package Charis\Models
 *
 * @method getId()
 * @method getName()
 * @method getDescription()
 */
class DocumentType extends Model
{

    const TABLE_NAME = 'document_types';

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

    /**
     * Table parameters
     */
    const ID = 'id';
    const NAME = 'name';
    const DESCRIPTION = 'description';

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
    public function documents()
    {
        return $this->belongsToMany(Document::class, Document::ID_TYPE);
    }
}
