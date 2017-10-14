<?php namespace Charis\Repositories\Target;

/**
 * Class TargetRepository
 * @package Charis\Repositories\Target
 */
class TargetRepository implements IUserRepository
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
        return Target::find($id);
    }

    /**
     * Fetch a user by id
     *
     * @return mixed
     */
    public function all()
    {
        return Target::all();
    }

    /**
     * @param $organizationId
     * @param $targets
     * @return bool|Category
     */
    public function addToOrganization(
        $organizationId,
        $targets
    ) {

        if(empty($targets) || empty($organizationId)) {
            return false;
        }

        if(!is_array($targets)){
            $targets = (array)$targets;
        }

        $organization = Organization::find($organizationId);

        foreach ($targets as $target){
            $organization->targets()->attach($target);
        }

        return true;
    }


}