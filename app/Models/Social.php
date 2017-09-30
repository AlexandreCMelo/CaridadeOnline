<?php

namespace Charis\Models;

/**
 * Class Social
 * @package Charis\Models
 */
class Social extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'social_logins';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
