<?php

namespace App\Repositories\Backend\Amenity;

use DB;
use Carbon\Carbon;
use App\Models\Amenity\Amenity;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AmenityRepository.
 */
class AmenityRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Amenity::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.amenities.table').'.id',
                config('module.amenities.table').'.name',
                config('module.amenities.table').'.icon_name',
                config('module.amenities.table').'.created_at',
                config('module.amenities.table').'.updated_at',
            ]);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
        if (Amenity::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.amenities.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Amenity $amenity
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Amenity $amenity, array $input)
    {
    	if ($amenity->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.amenities.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Amenity $amenity
     * @throws GeneralException
     * @return bool
     */
    public function delete(Amenity $amenity)
    {
        if ($amenity->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.amenities.delete_error'));
    }
}
