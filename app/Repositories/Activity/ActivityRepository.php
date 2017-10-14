<?php

namespace Charis\Repositories\Activity;

use Charis\Models\Activity;
use Charis\Models\Organization;
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
     * @return mixed
     */
    public static function buildList()
    {
        $data = [];
        foreach(static::all() as $activity) {
            $data[$activity[activity::ID]] = $activity[activity::NAME];
        };

        return $data;
    }

    /**
     * Fetch a user by id
     *
     * @return mixed
     */
    public static function all()
    {
        return Activity::all();
    }

    /**
     * @param $organizationId
     * @param $activities
     * @return bool|$activities
     */
    public function addToOrganization(
        $organizationId,
        $activities
    ) {

        if(empty($activities) || empty($organizationId)) {
            return false;
        }

        if(!is_array($activities)){
            $activities = (array)$activities;
        }

        $organization = Organization::find($organizationId);

        foreach ($activities as $activity){
            $organization->activities()->attach($activity);
        }

        return true;
    }
}
