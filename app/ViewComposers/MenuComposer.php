<?php namespace Charis\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Auth;

class MenuComposer {

    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $items;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        if(Auth::check()){
            $this->items = [
                'register' => 'Map',
                'login' => 'Organizations',
                'message' => 'Message',
                's' => 'Submit',
            ];
        }else{
            $this->items = [
                'register' => 'Register',
                'login' => 'Login',
            ];
        }

    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('menuOptions', $this->items);
    }

}