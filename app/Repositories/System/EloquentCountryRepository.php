<?php namespace Charis\Repositories\Country;

use Charis\Models\Country;
use Auth;

class EloquentCountryRepository implements ICountryRepository
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
        return Country::find($id);
    }

    /**
     * Fetch a user by id
     *
     * @return mixed
     */
    public function all()
    {
        return Country::all();
    }


}