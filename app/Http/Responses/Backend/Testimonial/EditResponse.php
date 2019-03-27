<?php

namespace App\Http\Responses\Backend\Testimonial;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Testimonial\Testimonial
     */
    protected $testimonials;

    /**
     * @param App\Models\Testimonial\Testimonial $testimonials
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
        return view('backend.testimonials.edit')->with([
            'testimonial'      => $request->testimonial,
        ]);
    }
}