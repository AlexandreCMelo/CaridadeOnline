<?php

namespace Charis\Models;

use \Eloquent;

class Social extends Eloquent
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
