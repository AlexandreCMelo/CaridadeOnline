<?php

namespace Charis\Models;

use Charis\Album;
use Charis\File;

class AlbumFile extends Model
{
    const ID = 'id';
    const ID_ALBUM = 'fk_album';
    const ID_FILE = 'fk_file';
    const CREATED_BY = 'created_by';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const TABLE_NAME = 'album_files';


    public function album()
    {
        $this->hasOne(Album::class, Album::ID, self::ID_ALBUM);
    }

    public function file()
    {
        $this->hasOne(File::class, File::ID, self::ID_FILE);
    }

}
