<?php

namespace App\Services\Category;

use App\Models\Category;
use App\Services\BaseServices;

class ShowCategory extends BaseServices
{
    public function rules (): array
    {
        return [
            'name',
        ];
    }
    public function execute(array $data): Category
    {
        $this->validate($data, $this->rules());
        return Category::where('id', $data['id'])->withTrashed()->first();
    }
}
