<?php

namespace App\Models\Amenity\Traits;

/**
 * Class AmenityAttribute.
 */
trait AmenityAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">
                '.$this->getEditButtonAttribute("edit-amenity", "admin.amenities.edit").'
                '.$this->getDeleteButtonAttribute("delete-amenity", "admin.amenities.destroy").'
                </div>';
    }
}
