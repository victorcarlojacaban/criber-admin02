<?php

namespace App\Http\Responses\Backend\Feature;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Feature\Feature
     */
    protected $features;

    /**
     * @param App\Models\Feature\Feature $features
     */
    public function __construct($features)
    {
        $this->features = $features;
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
        return view('backend.features.edit')->with([
            'features' => $this->features
        ]);
    }
}