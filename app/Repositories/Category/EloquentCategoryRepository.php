<?php namespace Charis\Repositories\Organization;

use Charis\Models\Category;
use Auth;

class EloquentCategoryRepository implements ICategoryRepository
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
        return Category::find($id);
    }

    /**
     * Fetch a user by id
     *
     * @return mixed
     */
    public function all()
    {
        return Category::all();
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

        $category = new Category();

        $category->setName($name);

        if($category->save()){
            return $category;
        }

        return false;
    }

}