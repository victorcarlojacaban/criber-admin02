<?php

namespace App\Http\Responses\Backend\Location;

use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    protected $amenities;

    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __construct($amenities)
    {
        $this->amenities = $amenities;
    }

    public function toResponse($request)
    {
        return view('backend.locations.create')->with([
            'amenities' => $this->amenities,
        ]);
    }
}