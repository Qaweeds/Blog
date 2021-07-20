<?php

namespace App\Acme;


abstract class CoreAcme
{
    protected $model;

    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    abstract protected function getModelClass();

    public function startConditions()
    {
        return clone $this->model;
    }
}
