<?php

namespace App\Models\Room\Traits;

/**
 * Class RoomAttribute.
 */
trait RoomAttribute
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
                '.$this->getEditButtonAttribute("edit-room", "admin.rooms.edit").'
                '.$this->getDeleteButtonAttribute("delete-room", "admin.rooms.destroy").'
                </div>';
    }
}
