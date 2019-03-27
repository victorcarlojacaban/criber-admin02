<?php

namespace App\Http\Controllers\Backend\Amenity;

use App\Models\Amenity\Amenity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Amenity\CreateResponse;
use App\Http\Responses\Backend\Amenity\EditResponse;
use App\Repositories\Backend\Amenity\AmenityRepository;
use App\Http\Requests\Backend\Amenity\ManageAmenityRequest;
use App\Http\Requests\Backend\Amenity\CreateAmenityRequest;
use App\Http\Requests\Backend\Amenity\StoreAmenityRequest;
use App\Http\Requests\Backend\Amenity\EditAmenityRequest;
use App\Http\Requests\Backend\Amenity\UpdateAmenityRequest;
use App\Http\Requests\Backend\Amenity\DeleteAmenityRequest;

/**
 * AmenitiesController
 */
class AmenitiesController extends Controller
{
    /**
     * variable to store the repository object
     * @var AmenityRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param AmenityRepository $repository;
     */
    public function __construct(AmenityRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Amenity\ManageAmenityRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageAmenityRequest $request)
    {
        return new ViewResponse('backend.amenities.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateAmenityRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Amenity\CreateResponse
     */
    public function create(CreateAmenityRequest $request)
    {
        return new CreateResponse('backend.amenities.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAmenityRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreAmenityRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.amenities.index'), ['flash_success' => trans('alerts.backend.amenities.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Amenity\Amenity  $amenity
     * @param  EditAmenityRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Amenity\EditResponse
     */
    public function edit(Amenity $amenity, EditAmenityRequest $request)
    {
        return new EditResponse($amenity);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateAmenityRequestNamespace  $request
     * @param  App\Models\Amenity\Amenity  $amenity
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateAmenityRequest $request, Amenity $amenity)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $amenity, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.amenities.index'), ['flash_success' => trans('alerts.backend.amenities.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteAmenityRequestNamespace  $request
     * @param  App\Models\Amenity\Amenity  $amenity
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Amenity $amenity, DeleteAmenityRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($amenity);
        //returning with successfull message
        return new RedirectResponse(route('admin.amenities.index'), ['flash_success' => trans('alerts.backend.amenities.deleted')]);
    }
    
}
