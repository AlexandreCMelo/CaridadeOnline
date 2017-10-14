<?php namespace Charis\Repositories\System;

use Charis\Models\Locale;

class LocaleRepository implements ILocaleRepository
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