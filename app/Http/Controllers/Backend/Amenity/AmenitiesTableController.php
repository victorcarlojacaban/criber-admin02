<?php

namespace App\Http\Controllers\Backend\Amenity;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Amenity\AmenityRepository;
use App\Http\Requests\Backend\Amenity\ManageAmenityRequest;

/**
 * Class AmenitiesTableController.
 */
class AmenitiesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var AmenityRepository
     */
    protected $amenity;

    /**
     * contructor to initialize repository object
     * @param AmenityRepository $amenity;
     */
    public function __construct(AmenityRepository $amenity)
    {
        $this->amenity = $amenity;
    }

    /**
     * This method return the data of the model
     * @param ManageAmenityRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageAmenityRequest $request)
    {
        return Datatables::of($this->amenity->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($amenity) {
                return Carbon::parse($amenity->created_at)->toDateString();
            })
            ->addColumn('actions', function ($amenity) {
                return $amenity->action_buttons;
            })
            ->make(true);
    }
}
