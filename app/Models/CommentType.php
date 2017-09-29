<?php

namespace Charis\Models;

use Illuminate\Database\Eloquent\Model;

class CommentType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comment_types';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Table parameters
     */
    const TABLE_NAME = 'comment_types';
    const ID = 'id';
    const NAME = 'name';

    /**
     * Avaliable categories
     */

    const ORGANIZATION = 10;
    const ALBUM = 20;
}
