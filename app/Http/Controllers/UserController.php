<?php

namespace Charis\Http\Controllers;

use Auth;
use Charis\Http\Requests\UserRequest;
use Charis\Models\User;
use Charis\Repositories\User\UserRepository;
use Charis\Service\FileService;

class UserController extends \Charis\Http\Controllers\Controller
{

    /**
     * @var FileService
     */
    protected $userRepository = null;

    /**
     * @var FileService
     */
    protected $fileService = null;


    /**
     * @var FileService
     */
    protected $timestamps = true;



    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('User.list', [
          'users' => UserRepository::all()
        ]);
    }

    /**
     * Show a single user
     *
     * @param User  $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('User.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('User.edit', compact('user'));
    }

    public function update(UserRequest $userRequest, User $user)
    {
        $this->getUserRepository()->edit(
            $user->id,
            $userRequest->name,
            $userRequest->email
        );

        if ($userRequest->hasFile('profile_photo')) {
            $this->getFileService()->addAvatarToUserFromRequest(
                $userRequest->file('profile_photo'),
                $user->id,
                Auth::id()
            );
        }

        return redirect(route('users.show', $user));

    }

    /**
     * @return UserRepository
     */
    public function getUserRepository()
    {
        if ($this->userRepository == null) {
            $this->userRepository = new UserRepository();
        }

        return $this->userRepository;
    }

    /**
     * @return FileService
     */
    public function getFileService()
    {
        if ($this->fileService == null) {
            $this->fileService = new FileService();
        }

        return $this->fileService;
    }
}
