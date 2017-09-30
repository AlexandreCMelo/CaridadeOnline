<?php namespace Charis\Repositories\System;

class TimezoneRepository implements ITimezoneRepository
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
        return Timezone::find($id);
    }

    /**
     * Fetch a user by id
     *
     * @return mixed
     */
    public function all()
    {
        return Timezone::all();
    }


}