<?php

namespace App\Repositories\Backend\Location;

use DB;
use Carbon\Carbon;
use App\Models\Location\Location;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class LocationRepository.
 */
class LocationRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Location::class;

    protected $upload_path;

    /**
     * Storage Class Object.
     *
     * @var \Illuminate\Support\Facades\Storage
     */
    protected $storage;

    public function __construct()
    {
        $this->upload_path = 'img'.DIRECTORY_SEPARATOR.'locations'.DIRECTORY_SEPARATOR;
        //$this->upload_path =  "/Users/victorcarlojacabaniii/MyFiles/criber/public/images/rooms";
        $this->storage = Storage::disk('public');
    }

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
                config('module.locations.table').'.id',
                config('module.locations.table').'.name',
                config('module.locations.table').'.title',
                 config('module.locations.table').'.main_image',
                config('module.locations.table').'.created_at',
                config('module.locations.table').'.updated_at',
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
        $input['unit_amenities'] = json_encode($input['unit_amenities']);
        $input['building_amenities'] = json_encode($input['building_amenities']);
        $input = $this->uploadImage($input);

        if (Location::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.locations.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Location $location
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Location $location, array $input)
    {
        $input['unit_amenities'] = json_encode($input['unit_amenities']);
        $input['building_amenities'] = json_encode($input['building_amenities']);

        // Uploading Image
        if (array_key_exists('main_image', $input)) {
            $this->deleteOldFile($location);
            $input = $this->uploadImage($input);
        }

    	if ($location->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.locations.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Location $location
     * @throws GeneralException
     * @return bool
     */
    public function delete(Location $location)
    {
        if ($location->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.locations.delete_error'));
    }

    /**
     * Upload Image.
     *
     * @param array $input
     *
     * @return array $input
     */
    public function uploadImage($input)
    {
        $avatar = $input['main_image'];


        if (isset($input['main_image']) && !empty($input['main_image'])) {
            $fileName = time().$avatar->getClientOriginalName();

            $this->storage->put($this->upload_path.$fileName, file_get_contents($avatar->getRealPath()));

            $input = array_merge($input, ['main_image' => $fileName]);

            return $input;
        }
    }

     /**
     * Destroy Old Image.
     *
     * @param int $id
     */
    public function deleteOldFile($model)
    {
        $fileName = $model->featured_image;

        return $this->storage->delete($this->upload_path.$fileName);
    }
}
