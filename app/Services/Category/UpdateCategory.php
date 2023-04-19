<?php

namespace App\Services\Category;

use App\Models\Category;
use App\Services\BaseServices;
use Illuminate\Validation\ValidationException;

class UpdateCategory extends BaseServices
{
    public function rules (): array
    {
        return [
            'id' => 'required|exists:categories,id',
            'name'=>'required'
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data): Category
    {
        $this->validate($data);
        $categories = Category::find($data['id']);
        $categories->update([
            'name' => $data['name']
        ]);
        return $categories;
    }
}
