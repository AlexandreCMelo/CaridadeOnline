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