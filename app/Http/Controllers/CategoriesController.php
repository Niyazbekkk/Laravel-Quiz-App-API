<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\Category\StoreCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use function GuzzleHttp\Promise\all;

class CategoriesController extends Controller
{
     public function index()
    {
        //
    }
    public function store(Request $request): Category
    {
        try {
            return app(StoreCategory::class)->execute($request->all());
        }catch (ValidationException $exception){
            return $exception->validator->errors()->all();
        }
    }
    public function show(string $id)
    {
        //
    }
    public function update(Request $request, string $id)
    {
        //
    }
    public function destroy(string $id)
    {
        //
    }
}
