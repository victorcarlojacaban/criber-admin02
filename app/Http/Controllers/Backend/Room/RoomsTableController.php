<?php

namespace App\Http\Controllers\Backend\Room;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Room\RoomRepository;
use App\Http\Requests\Backend\Room\ManageRoomRequest;

/**
 * Class RoomsTableController.
 */
class RoomsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var RoomRepository
     */
    protected $room;

    /**
     * contructor to initialize repository object
     * @param RoomRepository $room;
     */
    public function __construct(RoomRepository $room)
    {
        $this->room = $room;
    }

    /**
     * This method return the data of the model
     * @param ManageRoomRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageRoomRequest $request)
    {
        return Datatables::of($this->room->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('room_name', function ($room) {
                return $room->room_name;
            })
            ->addColumn('location_name', function ($room) {
                return $room->location_name;
            })
            ->addColumn('price', function ($room) {
                return $room->price;
            })
             ->addColumn('image_name', function ($room) {
                return $room->image_name;
            })
            ->addColumn('created_at', function ($room) {
                return Carbon::parse($room->created_at)->toDateString();
            })
            ->addColumn('actions', function ($room) {
                return $room->action_buttons;
            })
            ->make(true);
    }
}
