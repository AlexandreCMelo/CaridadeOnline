<?php

namespace Charis;

use Illuminate\Database\Eloquent\Model;

class FileType extends Model
{
    const ID = 'id';
    const NAME = 'name';
    const TABLE_NAME = 'file_types';

    const DOCUMENT = 10;
    const VIDEO = 20;
    const IMAGE = 30;
    const AVATAR = 40;
}
