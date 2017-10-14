<?php namespace Charis\Repositories\Album;

use Charis\Models\Category;
use Auth;
use Charis\Models\Organization;

class CategoryRepository implements IAlbumRepository
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


    /**
     * @param $organizationId
     * @param $categories
     * @return bool|Category
     */
    public function addToOrganization(
        $organizationId,
        $categories
    ) {

        if(empty($categories) || empty($organizationId)) {
            return false;
        }

        if(!is_array($categories)){
            $categories = (array)$categories;
        }

        $organization = Organization::find($organizationId);

        foreach ($categories as $category){
            $organization->categories()->attach($category);
        }

        return true;
    }

}