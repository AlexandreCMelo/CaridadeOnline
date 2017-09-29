<?php

namespace Charis\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'comments';
    const ID = 'id';
    const ID_ORGANIZATION = 'id_organization';
    const ID_TYPE = 'id_type';
    const ID_USER = 'id_user';
    const CONTENT = 'content';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    /**
     * Get organization category collection
     */
    public function type()
    {
        return $this->hasOne(CommentType::class, CommentType::ID, self::ID_TYPE);

    }
}
