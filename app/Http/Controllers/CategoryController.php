<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StorecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Asset;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'data' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $category->kategori = $input['kategori'];
        $category->id_subsatker = $input['id_subsatker'];
        $category->save();
        return response()->json(['status' => 'Kategori Berhasil Ditambahkan !'], 201);
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
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




        $category->kategori = $input['kategori'];
        $category->id_subsatker = $input['subsatker'];
        $category->update();
        return response()->json([
            'status' => 'Kategori Berhasil Diupdate !'
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
        // $asset = Asset::get()->where($asset->category->id);
        // $post = $post->findOrFail($id);

        if (!$category->delete()) {
            return response()->withErrors($category->errors());
        }

        // $category->assets->detach($assets);
        // return response()->json(['status' => 'Kategori Berhasil Dihapus !'], 201);

        return response()->json([
            'status' => 'Kategori Berhasil Dihapus !'
        ], 200);
    }
    public function search(Request $request)
    {
        $query = $request->input('Kategori');
        $categories = Category::where('kategori', 'like', $query)->get();
        return response()->json([
            'data' => $categories,
        ], 200);
    }
}
