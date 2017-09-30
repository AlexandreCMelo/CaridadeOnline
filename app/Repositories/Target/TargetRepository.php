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
     * @param $name
     * @param $description
     * @return bool|Organization
     */
    public function addOrganization(
        $name,
        $description
    ) {

        $target = new Target();

        $target->setName($name);

        if($target->save()){
            return $target;
        }

        return false;
    }

}