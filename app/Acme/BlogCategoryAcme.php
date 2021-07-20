<?php

namespace App\Acme;

use App\Models\BlogCategory as Model;

class BlogCategoryAcme extends CoreAcme
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    public function getForComboBox()
    {
        $columns = ['id' , 'CONCAT (id, ". ", title) as id_title'];
        $raw_string = implode(', ', $columns);

        $result = $this->startConditions()->selectRaw($raw_string)->toBase()->get();

        return $result;
    }

    public function getAllWithPaginate($count = 0)
    {
        $columns = ['id', 'title', 'parent_id'];

        $result = $this->startConditions()->select($columns)->paginate($count);

        return $result;
    }

}
