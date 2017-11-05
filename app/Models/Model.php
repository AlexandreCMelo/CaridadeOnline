<?php

namespace Charis\Models;

use \Eloquent;

class Model extends Eloquent
{
    protected $dateFormat = 'Y-m-d H:i:s';
    const SEARCH_INDEX_SUFFIX = '_index';
}
