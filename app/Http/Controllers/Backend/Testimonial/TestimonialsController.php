<?php

namespace App\Http\Controllers\Backend\Testimonial;

use App\Models\Testimonial\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Testimonial\CreateResponse;
use App\Http\Responses\Backend\Testimonial\EditResponse;
use App\Repositories\Backend\Testimonial\TestimonialRepository;
use App\Http\Requests\Backend\Testimonial\ManageTestimonialRequest;
use App\Http\Requests\Backend\Testimonial\CreateTestimonialRequest;
use App\Http\Requests\Backend\Testimonial\StoreTestimonialRequest;
use App\Http\Requests\Backend\Testimonial\EditTestimonialRequest;
use App\Http\Requests\Backend\Testimonial\UpdateTestimonialRequest;
use App\Http\Requests\Backend\Testimonial\DeleteTestimonialRequest;

/**
 * TestimonialsController
 */
class TestimonialsController extends Controller
{
    /**
     * variable to store the repository object
     * @var TestimonialRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param TestimonialRepository $repository;
     */
    public function __construct(TestimonialRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Testimonial\ManageTestimonialRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageTestimonialRequest $request)
    {
        return new ViewResponse('backend.testimonials.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateTestimonialRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Testimonial\CreateResponse
     */
    public function create(CreateTestimonialRequest $request)
    {
        $testimonials = Testimonial::getSelectData();

        return new CreateResponse($testimonials);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreTestimonialRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreTestimonialRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.testimonials.index'), ['flash_success' => trans('alerts.backend.testimonials.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Testimonial\Testimonial  $testimonial
     * @param  EditTestimonialRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Testimonial\EditResponse
     */
    public function edit(Testimonial $testimonial, EditTestimonialRequest $request)
    {
        $testimonial = $testimonial->all();
        return new EditResponse($testimonial, compact('testimonial'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateTestimonialRequestNamespace  $request
     * @param  App\Models\Testimonial\Testimonial  $testimonial
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $testimonial, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.testimonials.index'), ['flash_success' => trans('alerts.backend.testimonials.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteTestimonialRequestNamespace  $request
     * @param  App\Models\Testimonial\Testimonial  $testimonial
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Testimonial $testimonial, DeleteTestimonialRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($testimonial);
        //returning with successfull message
        return new RedirectResponse(route('admin.testimonials.index'), ['flash_success' => trans('alerts.backend.testimonials.deleted')]);
    }

}
