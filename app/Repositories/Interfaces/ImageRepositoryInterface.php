<?php

namespace App\Repositories\Interfaces;

use App\Models\Image;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;

/**
 * Interface UserRepositoryInterface
 * @package App\Repositories\Interfaces
 */
interface ImageRepositoryInterface
{

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data) : Image;

    /**
     * @param array $data
     * @param Image $image
     * @return Image
     */
    public function update(array $data, Image $image) : Image;

    /**
     * @param Image $image
     * @return bool
     */
    public function delete(Image $image) : bool;

}
