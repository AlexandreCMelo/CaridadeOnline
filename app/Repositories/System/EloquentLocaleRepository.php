<?php namespace Charis\Repositories\Organization;

use Charis\Models\Locale;
use Auth;

class EloquentLocaleRepository implements ILocaleRepository
{

    const DEFAULT_LIMIT = 10;

    /**
     * Fetch a user by id
     *
     * @param int $id
     *
     * @return mixed
     */
    public function findById($id)
    {
        return Locale::find($id);
    }

    /**
     * Fetch a user by id
     *
     * @return mixed
     */
    public function all()
    {
        return Locale::all();
    }

}