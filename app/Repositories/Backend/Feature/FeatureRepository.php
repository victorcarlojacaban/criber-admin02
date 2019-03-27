<?php

namespace App\Repositories\Backend\Feature;

use DB;
use Carbon\Carbon;
use App\Models\Feature\Feature;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FeatureRepository.
 */
class FeatureRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Feature::class;

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
                config('module.features.table').'.id',
                config('module.features.table').'.created_at',
                config('module.features.table').'.updated_at',
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
        if (Feature::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.features.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Feature $feature
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Feature $feature, array $input)
    {
    	if ($feature->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.features.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Feature $feature
     * @throws GeneralException
     * @return bool
     */
    public function delete(Feature $feature)
    {
        if ($feature->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.features.delete_error'));
    }
}
