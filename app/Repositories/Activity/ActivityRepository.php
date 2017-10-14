<?php namespace Charis\Repositories\Organization;

use Charis\Models\Activity;
use Auth;

class ActivityRepository implements IActivityRepository
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
        return Activity::find($id);
    }

    /**
     * Fetch a user by id
     *
     * @return mixed
     */
    public function all()
    {
        return Activity::all();
    }


    /**
     * @param $name
     * @param $description
     * @return bool|Activity
     */
    public function add(
        $name,
        $description
    ) {

        $activity = new Activity();

        $activity->setName($name);

        if ($activity->save()) {
            return $activity;
        }

        return false;
    }
}