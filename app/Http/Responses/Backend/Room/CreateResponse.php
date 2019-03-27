<?php

namespace App\Http\Responses\Backend\Room;

use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    protected $features;
    protected $locations;

    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __construct($features, $locations)
    {
        $this->features = $features;
        $this->locations = $locations;
    }


    public function toResponse($request)
    {
        return view('backend.rooms.create')->with([
            'features' => $this->features,
            'locations' => $this->locations,
        ]);
    }
}