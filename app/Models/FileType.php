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
    const ID = 'id';
    const NAME = 'name';

    const TABLE_NAME = 'file_types';

    /**
     * @var string
     */
    protected $table = 'files';

    const DOCUMENT = 10;
    const VIDEO = 20;
    const IMAGE = 30;
    const AVATAR = 40;
}
