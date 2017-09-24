<?php

namespace Charis\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    const ID = 'id';
    const NAME = 'name';
    const ID_ORGANIZATION = 'fk_organization';
    const CREATED_BY = 'created_by';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const TABLE_NAME = 'albums';



    public function organization()
    {
        $this->hasOne(Organization::class, Organization::ID, self::ID_ORGANIZATION);
    }

    public function files()
    {
        return $this->belongsToMany(File::class, File::ID, self::ID);
    }
}
