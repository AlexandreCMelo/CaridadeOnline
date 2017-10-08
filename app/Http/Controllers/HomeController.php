<?php

namespace Charis\Http\Controllers;


use Charis\Models\FileType;
use Charis\Models\Organization;
use Charis\Models\User;
use Charis\Repositories\File\FileRepository;
use Charis\Service\FileService;
use Charis\Traits\CaptureIpTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class HomeController extends \Charis\Http\Controllers\Controller
{

    /**
     * @var FileRepository
     */
    protected $fileRepository = null;

    /**
     * HomeController constructor.
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Dashboard.home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload()
    {
        return view('Dashboard.upload');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function uploadValidator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'multipleselect' => 'required',
        ]);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadCreate(Request $request)
    {
        $validator = $this->uploadValidator($request->all());

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('image')) {

            $fileService = new FileService();

            $addFileProtoType = $fileService->addFileFromRequestProtoType($request, Auth::id());
            $organizationId = 56;
            $userId = 13;
            //$addFileToOrganization = $fileService->addFileFromRequest($request, FileType::IMAGE, Auth::id(), $organizationId, Organization::class);
            //$addImageToOrganization = $fileService->addImageFromRequest($request, $organizationId, Auth::id());
            //$addVideoToOrganization = $fileService->addVideoFromRequest($request, $organizationId, Auth::id());
            //$addLogoToOrganization = $fileService->addLogoFromRequest($request, $organizationId, Auth::id());
            //$addFileToUser = $fileService->addFileFromRequest($request, FileType::VIDEO, Auth::id(), 13, User::class);
            //$addImageToUser = $fileService->addImageFromRequest($request,  $userId, Auth::id());
            //$addAvatarToUser = $fileService->addAvatarFromRequest($request,  $userId, Auth::id());
            //$addFileToSystem = $fileService->addFileToSystem($request, FileType::IMAGE, Auth::id());


            var_dump($addFileProtoType);
            die();

        }

        return view('Dashboard.upload');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {
        return view('Dashboard.home');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function imageUploadPost()

    {


        $imageName = time() . '.' . request()->image->getClientOriginalExtension();

        request()->image->move(public_path('images'), $imageName);


        return back()
            ->with('success', 'You have successfully upload image.')
            ->with('image', $imageName);

    }

    /**
     * @return FileRepository
     */
    protected function getFileRepository()
    {
        if (null == $this->fileRepository) {
            $this->fileRepository = new FileRepository();
        }
        return $this->fileRepository;
    }

}
