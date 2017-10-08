<?php

namespace Charis\Models;

/**
 * Class FileType
 * @package Charis\Models
 *
 * @method getId()
 * @method getName()
 * @method setName($name)
 */
class FileType extends Model
{

    const TABLE_NAME = 'file_types';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = self::TABLE_NAME;

    const ID = 'id';
    const NAME = 'name';

    const DOCUMENT = 10;
    const VIDEO = 20;
    const IMAGE = 30;
    const AVATAR = 40;
    const LOGO = 50;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::NAME,
    ];

}
