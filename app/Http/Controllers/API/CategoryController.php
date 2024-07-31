<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\StorecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Asset;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * @group Category
 */
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = CategoryResource::collection(
            Category::orderBy(
                request('column') ? request('column') : 'updated_at',
                request('direction') ? request('direction') : 'desc'
            )->paginate(50)
        );


        return response()->json([
            'status' => 'success',
            'category' => $category,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecategoryRequest $request)
    {
        // return $request;
        $input = $request->validated();
        $category = new Category();
        $category->category = $input['category'];
        $category->id_subsatker = $input['subsatker'];
        $category->save();
        return response()->json(['status' => 'Category Successfully Added !'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        $category->subsatker();
        $categories = CategoryResource::make($category);
        return response()->json([
            'data' => $categories
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecategoryRequest  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecategoryRequest $request, category $category)
    {
        $input = $request->validated();
        $category->category = $input['category'];
        $category->id_subsatker = $input['subsatker'];
        $category->update();
        return response()->json([
            'status' => 'Category Successfully Updated !'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        try {
            $category->delete();
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to delete resource',
            ], 500);
        }
        return response()->json([
            'status' => 'Category Successfully Deleted !'
        ], 200);
    }

    public function search(Request $request)
    {
        $query = $request->input('Kategori');
        $categori = Category::query();
        $categoryes = $categori->where('kategori', 'like', '%' . $query . '%')->get();
        return response()->json([
            'data' => $categoryes,
        ], 200);
    }
}
