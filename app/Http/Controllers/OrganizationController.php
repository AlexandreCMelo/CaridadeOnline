<?php

namespace Charis\Http\Controllers;

use Charis\Repositories\Category\CategoryRepository;
use Charis\Repositories\Activity\ActivityRepository;
use Charis\Repositories\Target\TargetRepository;
use Charis\Repositories\Organization\OrganizationRepository;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
  protected $organizationRepository;

  public function __construct(OrganizationRepository $organizationRepository) {
    $this->organizationRepository = $organizationRepository;

    $this->middleware('auth')->except(['index','show']);
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('Organization.list', [
        'organizations' => OrganizationRepository::all()
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = CategoryRepository::buildList();
        $activities = ActivityRepository::buildList();
        $targets = TargetRepository::buildList();

        return view('Organization.create',
            compact('categories', 'activities', 'targets')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->organizationRepository->add(
          request('name'),
          request('description'),
          request('shortDescription'),
          request('email'),
          request('phone'),
          request('website'),
          1,
          [],
          request('categories'),
          request('targets'),
          request('activities')
        );

        Redirect::to('organizations');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
