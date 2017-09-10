<?php

namespace Charis;

use \Eloquent;

class DocumentType extends Eloquent
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

    public function users()
    {
        return $this->belongsToMany(Document::class, Document::ID_TYPE);
    }
}
