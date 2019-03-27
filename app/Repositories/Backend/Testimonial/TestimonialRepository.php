<?php

namespace App\Repositories\Backend\Testimonial;

use DB;
use Carbon\Carbon;
use App\Models\Testimonial\Testimonial;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class TestimonialRepository.
 */
class TestimonialRepository extends BaseRepository
{

    protected $image_path;
    protected $video_path;
    protected $storage;

    public function __construct()
    {
        $this->image_path = 'img' . DIRECTORY_SEPARATOR . 'testimonials' . DIRECTORY_SEPARATOR;
        $this->video_path = 'video' . DIRECTORY_SEPARATOR . 'testimonials' . DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }

    /**
     * Associated Repository Model.
     */
    const MODEL = Testimonial::class;

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
                config('module.testimonials.table').'.id',
                config('module.testimonials.table').'.tenant_name',
                config('module.testimonials.table').'.message',
                config('module.testimonials.table').'.image_url',
                config('module.testimonials.table').'.video_url',
                config('module.testimonials.table').'.created_at',
                config('module.testimonials.table').'.updated_at',
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
        $input['image_url'] = $this->uploadImage($input['image_url']);
        $input['video_url'] = $this->uploadVideo($input['video_url']);

        if (Testimonial::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.testimonials.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Testimonial $testimonial
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Testimonial $testimonial, array $input)
    {
        // Uploading Image
        if (array_key_exists('image_url', $input)) {
            $this->deleteOldFile($testimonial, $this->image_path);
            $input['image_url'] = $this->uploadImage($input['image_url']);
        }

        // Uploading video
        if (array_key_exists('video_url', $input)) {
            $this->deleteOldFile($testimonial, $this->video_path);
            $input['video_url'] = $this->uploadVideo($input['video_url']);
        }

    	if ($testimonial->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.testimonials.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Testimonial $testimonial
     * @throws GeneralException
     * @return bool
     */
    public function delete(Testimonial $testimonial)
    {
        if ($testimonial->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.testimonials.delete_error'));
    }

    /**
     * Upload Image.
     *
     * @param array $input
     *
     * @return array $input
     */
    public function uploadImage($image_url)
    {
        $image = $image_url;

        if (isset($image_url) && !empty($image_url)) {
            $fileName = time() . $image->getClientOriginalName();

            $this->storage->put($this->image_path . $fileName, file_get_contents($image->getRealPath()));
            return $fileName;
        }
    }

    /**
     * Upload Video.
     *
     * @param array $input
     *
     * @return array $input
     */
    public function uploadVideo($video_url)
    {
        $video = $video_url;

        if (isset($video_url) && !empty($video_url)) {
            $fileName = time() . $video->getClientOriginalName();

            $this->storage->put($this->video_path . $fileName, file_get_contents($video->getRealPath()));
            return $fileName;
        }
    }

    /**
     * Destroy Old Image/video.
     *
     * @param int $id
     * @param string $path
     */
    public function deleteOldFile($model, $path)
    {
        $fileName = $model->featured_image;

        return $this->storage->delete($path . $fileName);
    }
}
