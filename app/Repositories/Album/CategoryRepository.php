<?php namespace Charis\Repositories\Category;

use Charis\Models\Category;
use Auth;

class CategoryRepository implements ICategoryRepository
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
     * @param bool $asArray
     * @return mixed
     */
    public function all($asArray = false)
    {
        $data = Category::all();
        if ($asArray) {
            return $data->toArray();
        }
        return $data;
    }

    /**
     * Fetch a user by id
     *
     * @return mixed
     */
    public function buildList()
    {
        $data = [];
        foreach($this->all(true) as $category) {
            $data[$category[category::ID]] = $category[category::NAME];
        };

        return $data;
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