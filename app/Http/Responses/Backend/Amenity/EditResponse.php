<?php

namespace App\Http\Responses\Backend\Amenity;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Amenity\Amenity
     */
    protected $amenities;

    /**
     * @param App\Models\Amenity\Amenity $amenities
     */
    public function __construct($amenities)
    {
        $this->amenities = $amenities;
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
        return view('backend.amenities.edit')->with([
            'amenities' => $this->amenities
        ]);
    }
}