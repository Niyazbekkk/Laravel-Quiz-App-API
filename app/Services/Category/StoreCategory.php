<?php

namespace App\Services\Category;

use App\Models\Category;
use App\Services\BaseServices;

class StoreCategory extends BaseServices
{
    public function rules (): array
    {
        return [
            'name'=> 'required|unique:categories,name',
        ];
    }
    public function execute(array $data): Category
    {
        $this->validate($data);
        return Category::create($data);
    }
}
