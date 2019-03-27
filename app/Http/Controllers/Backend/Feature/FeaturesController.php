<?php

namespace App\Http\Controllers\Backend\Feature;

use App\Models\Feature\Feature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Feature\CreateResponse;
use App\Http\Responses\Backend\Feature\EditResponse;
use App\Repositories\Backend\Feature\FeatureRepository;
use App\Http\Requests\Backend\Feature\ManageFeatureRequest;
use App\Http\Requests\Backend\Feature\CreateFeatureRequest;
use App\Http\Requests\Backend\Feature\StoreFeatureRequest;
use App\Http\Requests\Backend\Feature\EditFeatureRequest;
use App\Http\Requests\Backend\Feature\UpdateFeatureRequest;
use App\Http\Requests\Backend\Feature\DeleteFeatureRequest;

/**
 * FeaturesController
 */
class FeaturesController extends Controller
{
    /**
     * variable to store the repository object
     * @var FeatureRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param FeatureRepository $repository;
     */
    public function __construct(FeatureRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Feature\ManageFeatureRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageFeatureRequest $request)
    {
        return new ViewResponse('backend.features.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateFeatureRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Feature\CreateResponse
     */
    public function create(CreateFeatureRequest $request)
    {
        return new CreateResponse('backend.features.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreFeatureRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreFeatureRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.features.index'), ['flash_success' => trans('alerts.backend.features.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Feature\Feature  $feature
     * @param  EditFeatureRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Feature\EditResponse
     */
    public function edit(Feature $feature, EditFeatureRequest $request)
    {
        return new EditResponse($feature);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateFeatureRequestNamespace  $request
     * @param  App\Models\Feature\Feature  $feature
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateFeatureRequest $request, Feature $feature)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $feature, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.features.index'), ['flash_success' => trans('alerts.backend.features.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteFeatureRequestNamespace  $request
     * @param  App\Models\Feature\Feature  $feature
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Feature $feature, DeleteFeatureRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($feature);
        //returning with successfull message
        return new RedirectResponse(route('admin.features.index'), ['flash_success' => trans('alerts.backend.features.deleted')]);
    }
    
}
