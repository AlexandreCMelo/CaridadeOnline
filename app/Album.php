<?php

namespace Charis;

use Illuminate\Database\Eloquent\Model;
use Charis\Entity;

class Album extends Model
{
    const ID = 'id';
    const NAME = 'name';
    const ID_ENTITY = 'fk_entity';
    const CREATED_BY = 'created_by';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const TABLE_NAME = 'albums';



    public function entity()
    {
        $this->hasOne(Entity::class, Entity::ID, self::ID_ENTITY);
    }

    public function files()
    {
        return $this->belongsToMany(File::class, File::ID, self::ID);
    }
}
