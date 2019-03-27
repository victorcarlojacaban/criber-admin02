<?php

namespace App\Http\Responses\Backend\Testimonial;

use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{

    protected $testimonials;

    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __construct($testimonials)
    {
        $this->testimonials = $testimonials;
    }

    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('backend.testimonials.create')->with([
            'testimonials' => $this->testimonials,
        ]);
    }
}