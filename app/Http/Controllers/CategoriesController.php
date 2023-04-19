<?php

namespace App\Http\Controllers;

use App\Http\Resources\Category\CategoryResuorce;
use App\Models\Category;
use App\Services\Category\DeleteCategory;
use App\Services\Category\ShowCategory;
use App\Services\Category\StoreCategory;
use App\Services\Category\UpdateCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CategoriesController extends Controller
{
     public function index()
    {
        $category = Category::all([
            'id', 'name', 'created_at', 'updated_at'
        ]);
        return  CategoryResuorce::collection($category);
    }
    public function store(Request $request): CategoryResuorce
    {
        try {
            $category = app(StoreCategory::class)->execute($request->all());
            return new CategoryResuorce($category);
        }catch (ValidationException $exception){
            return $exception->validator->errors()->all();
        }
    }
    public function show(string $id)
    {
        try {
            $category = app(ShowCategory::class)->execute([
                'id' => $id,
            ]);
            return new CategoryResuorce($category);
        }catch (ValidationException $exception){
            return $exception->validator->errors()->all();
        }
    }
    public function update(Request $request, $id)
    {
         try {
            $category = app(UpdateCategory::class)->execute([
                'id'=> $id,
                'name' => $request->name,
            ]);
            return response([
                'successful'=>true,
            ]);
        }catch (ValidationException $exception){
            return $exception->validator->errors()->all();
        }
    }
    public function destroy(string $id)
    {
        try {
            $category = app(DeleteCategory::class)->execute([
                'id' => $id,
            ]);
            return response([
                'successful'=>true,
            ]);
        }catch (ValidationException $exception){
            return $exception->validator->errors()->all();
        }
    }
}
