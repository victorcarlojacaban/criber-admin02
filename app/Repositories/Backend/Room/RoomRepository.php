<?php

namespace App\Repositories\Backend\Room;

use DB;
use Carbon\Carbon;
use App\Models\Room\Room;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class RoomRepository.
 */
class RoomRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Room::class;

    protected $upload_path;

    /**
     * Storage Class Object.
     *
     * @var \Illuminate\Support\Facades\Storage
     */
    protected $storage;

    public function __construct()
    {
        $this->upload_path = 'img'.DIRECTORY_SEPARATOR.'rooms'.DIRECTORY_SEPARATOR;
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
            ->leftjoin(config('module.locations.table'), config('module.locations.table').'.id', '=', config('module.rooms.table').'.location_id')
            ->select([
                config('module.rooms.table').'.id',
                config('module.rooms.table').'.name as room_name',
                config('module.rooms.table').'.price',
                config('module.rooms.table').'.image_name',
                config('module.rooms.table').'.created_at',
                config('module.rooms.table').'.updated_at',
                config('module.locations.table').'.name as location_name',
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
        $input['features'] = json_encode($input['features']);
        $input = $this->uploadImage($input);

        if (Room::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.rooms.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Room $room
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Room $room, array $input)
    {
        $input['features'] = json_encode($input['features']);
        // Uploading Image
        if (array_key_exists('image_name', $input)) {
            $this->deleteOldFile($room);
            $input = $this->uploadImage($input);
        }

    	if ($room->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.rooms.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Room $room
     * @throws GeneralException
     * @return bool
     */
    public function delete(Room $room)
    {
        if ($room->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.rooms.delete_error'));
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
        $avatar = $input['image_name'];


        if (isset($input['image_name']) && !empty($input['image_name'])) {
            $fileName = time().$avatar->getClientOriginalName();

            $this->storage->put($this->upload_path.$fileName, file_get_contents($avatar->getRealPath()));

            $input = array_merge($input, ['image_name' => $fileName]);

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
