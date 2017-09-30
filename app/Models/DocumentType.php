<?php

namespace Charis\Models;

/**
 * Class DocumentType
 * @package Charis\Models
 *
 * @method getId()
 * @method getName()
 * @method getDescription()
 * @method setName($name)
 * @method setDescription($description)
 */
class DocumentType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'document_types';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'document_types';
    const ID = 'id';
    const NAME = 'name';
    const DESCRIPTION = 'description';

    /**
     * @return mixed
     */
    public function documents()
    {
        return $this->belongsToMany(Document::class, Document::ID_TYPE);
    }
}
