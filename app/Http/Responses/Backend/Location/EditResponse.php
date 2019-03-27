<?php

namespace App\Http\Responses\Backend\Location;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Location\Location
     */
    protected $locations;

    protected $amenities;

    /**
     * @param App\Models\Location\Location $locations
     */
    public function __construct($locations, $amenities)
    {
        $this->locations = $locations;
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
        $locationData = $this->locations->toArray();

        $selectedUnitAmenities     = json_decode($locationData['unit_amenities']);
        $selectedBuildingAmenities = json_decode($locationData['building_amenities']);

        return view('backend.locations.edit')->with([
            'location' => $this->locations,
            'amenities' => $this->amenities,
            'selectedUnitAmenities' => $selectedUnitAmenities ?? null,
            'selectedBuildingAmenities' => $selectedBuildingAmenities ?? null,

        ]);
    }
}