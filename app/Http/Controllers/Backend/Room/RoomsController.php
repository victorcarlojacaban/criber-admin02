<?php

namespace App\Http\Controllers\Backend\Room;

use App\Models\Feature\Feature;
use App\Models\Location\Location;
use App\Models\Room\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Room\CreateResponse;
use App\Http\Responses\Backend\Room\EditResponse;
use App\Repositories\Backend\Room\RoomRepository;
use App\Http\Requests\Backend\Room\ManageRoomRequest;
use App\Http\Requests\Backend\Room\CreateRoomRequest;
use App\Http\Requests\Backend\Room\StoreRoomRequest;
use App\Http\Requests\Backend\Room\EditRoomRequest;
use App\Http\Requests\Backend\Room\UpdateRoomRequest;
use App\Http\Requests\Backend\Room\DeleteRoomRequest;

/**
 * RoomsController
 */
class RoomsController extends Controller
{
    /**
     * variable to store the repository object
     * @var RoomRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param RoomRepository $repository;
     */
    public function __construct(RoomRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Room\ManageRoomRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageRoomRequest $request)
    {
        return new ViewResponse('backend.rooms.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateRoomRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Room\CreateResponse
     */
    public function create(CreateRoomRequest $request)
    {
        $features = Feature::getSelectData();

        $locations = Location::getSelectData();

        return new CreateResponse($features, $locations);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRoomRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreRoomRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.rooms.index'), ['flash_success' => trans('alerts.backend.rooms.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Room\Room  $room
     * @param  EditRoomRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Room\EditResponse
     */
    public function edit(Room $room, EditRoomRequest $request)
    {
        $features = Feature::getSelectData();

        $locations = Location::getSelectData();

        return new EditResponse($room, $features, $locations);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRoomRequestNamespace  $request
     * @param  App\Models\Room\Room  $room
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $room, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.rooms.index'), ['flash_success' => trans('alerts.backend.rooms.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteRoomRequestNamespace  $request
     * @param  App\Models\Room\Room  $room
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Room $room, DeleteRoomRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($room);
        //returning with successfull message
        return new RedirectResponse(route('admin.rooms.index'), ['flash_success' => trans('alerts.backend.rooms.deleted')]);
    }

}
