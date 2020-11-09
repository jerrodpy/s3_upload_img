<?php

namespace App\Repositories\Eloquent;

use App\Models\Image;

/**
 * Class UserRepository
 * @package App\Repositories\Eloquent
 */
class ImageRepository extends AbstractRepo
{
    /**
     * @var Image
     */
    protected $model;

    /**
     * UserRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(Image::class);
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data): Image
    {
        return $this->model::create($data);
    }

    /**
     * @param array $data
     * @param Image $image
     *
     * @return Image
     */
    public function update(array $data, Image $image): Image
    {
        $image->update($data);

        return $image;
    }

    /**
     * @param Image $image
     *
     * @return bool
     * @throws \Exception
     */
    public function delete(Image $image): bool
    {
        return $image->delete();
    }

}
