<?php

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Class AbstractRepo
 * @package App\Repositories\Eloquent
 */
class AbstractRepo
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * AbstractRepo constructor.
     *
     * @param string $model
     */
    public function __construct(string $model)
    {
        $this->model = $model;
    }

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function find(int $id)
    {
        return $this->model::find($id);
    }

    /**
     * @param null $data
     *
     * @return mixed
     */
    public function get($data = null)
    {
        return $data !== null
            ? $this->model::where($data)
                ->get()
            : $this->model::get();
    }

    /**
     * @param array $options
     *
     * @return Collection
     */
    public function getAll(array $options): Collection
    {
        $query = $this->model::query();

        return $query->get();
    }


}
