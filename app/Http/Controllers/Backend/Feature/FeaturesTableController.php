<?php

namespace App\Http\Controllers\Backend\Feature;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Feature\FeatureRepository;
use App\Http\Requests\Backend\Feature\ManageFeatureRequest;

/**
 * Class FeaturesTableController.
 */
class FeaturesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var FeatureRepository
     */
    protected $feature;

    /**
     * contructor to initialize repository object
     * @param FeatureRepository $feature;
     */
    public function __construct(FeatureRepository $feature)
    {
        $this->feature = $feature;
    }

    /**
     * This method return the data of the model
     * @param ManageFeatureRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageFeatureRequest $request)
    {
        return Datatables::of($this->feature->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($feature) {
                return Carbon::parse($feature->created_at)->toDateString();
            })
            ->addColumn('actions', function ($feature) {
                return $feature->action_buttons;
            })
            ->make(true);
    }
}
