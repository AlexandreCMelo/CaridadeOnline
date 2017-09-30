<?php

namespace Charis\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CommentType
 * @package Charis\Models
 *
 * @method getId()
 * @method getName()
 * @method setName($name)
 */
class CommentType extends Model
{

    /**
     * Table parameters
     */
    const TABLE_NAME = 'comment_types';

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

    const ID = 'id';
    const NAME = 'name';

    /**
     * Avaliable categories
     */

    const ORGANIZATION = 10;
    const ALBUM = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::NAME,
    ];

}
