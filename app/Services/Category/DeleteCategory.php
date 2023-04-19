<?php

namespace App\Services\Category;
use App\Models\Category;
use App\Services\BaseServices;

class DeleteCategory extends BaseServices
{
    public function rules(): array
    {
        return [
            'id'=>'exists:categories,id',
        ];
    }
    public function execute(array $data):Category
    {
        $this->validate($data, $this->rules());
        $category = Category::find($data['id']);
        $category->delete();
        return $category;
    }
}
