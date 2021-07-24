<?php

namespace App\Acme;

use App\Models\BlogPost as Model;

class BlogPostAcme extends \App\Acme\CoreAcme
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate($count = null)
    {
        $columns = ['id', 'title', 'slug', 'is_published', 'published_at', 'user_id', 'category_id'];
        $result = $this->startConditions()->select($columns)->with(['category:id,title', 'user:id,name'])->orderBy('id', 'DESC')->paginate($count);

        return $result;
    }
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }
}
