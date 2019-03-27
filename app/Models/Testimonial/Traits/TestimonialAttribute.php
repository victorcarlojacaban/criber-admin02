<?php

namespace App\Models\Testimonial\Traits;

/**
 * Class TestimonialAttribute.
 */
trait TestimonialAttribute
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
                '.$this->getEditButtonAttribute("edit-testimonial", "admin.testimonials.edit").'
                '.$this->getDeleteButtonAttribute("delete-testimonial", "admin.testimonials.destroy").'
                </div>';
    }
}
