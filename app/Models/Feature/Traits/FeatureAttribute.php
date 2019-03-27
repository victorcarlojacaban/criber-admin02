<?php

namespace App\Models\Feature\Traits;

/**
 * Class FeatureAttribute.
 */
trait FeatureAttribute
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
                '.$this->getEditButtonAttribute("edit-feature", "admin.features.edit").'
                '.$this->getDeleteButtonAttribute("delete-feature", "admin.features.destroy").'
                </div>';
    }
}
