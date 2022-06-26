<?php
namespace App\Repository\Base;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    protected $model;

    /**
     * @return Model;
     */
    protected function getCondition()
    {
        return new $this->model();
    }

    protected function setModel($name)
    {
        $this->model = $name;
    }
}
