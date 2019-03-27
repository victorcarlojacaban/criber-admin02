<?php

namespace App\Http\Controllers\Backend\Testimonial;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Testimonial\TestimonialRepository;
use App\Http\Requests\Backend\Testimonial\ManageTestimonialRequest;

/**
 * Class TestimonialsTableController.
 */
class TestimonialsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var TestimonialRepository
     */
    protected $testimonial;

    /**
     * contructor to initialize repository object
     * @param TestimonialRepository $testimonial;
     */
    public function __construct(TestimonialRepository $testimonial)
    {
        $this->testimonial = $testimonial;
    }

    /**
     * This method return the data of the model
     * @param ManageTestimonialRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageTestimonialRequest $request)
    {
        return Datatables::of($this->testimonial->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('tenant_name', function ($testimonial) {
                return $testimonial->tenant_name;
            })
            ->addColumn('message', function ($testimonial) {
                return $testimonial->message;
            })
            ->addColumn('image_url', function ($testimonial) {
                return $testimonial->image_url;
            })
             ->addColumn('video_url', function ($testimonial) {
                return $testimonial->video_url;
            })
            ->addColumn('created_at', function ($testimonial) {
                return Carbon::parse($testimonial->created_at)->toDateString();
            })
            ->addColumn('actions', function ($testimonial) {
                return $testimonial->action_buttons;
            })
            ->make(true);
    }
}
