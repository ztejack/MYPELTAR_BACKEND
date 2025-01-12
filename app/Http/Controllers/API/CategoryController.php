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
            'data' => $category,
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
        try {
            $input = $request->validated();
            $category = new Category();
            $category->category = $input['category'];
            $category->id_subsatker = $input['subsatker'];
            $category->save();
            return response()->json(['status' => 'Category Successfully Added !'], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to create resource',
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        try {
            $categories = CategoryResource::make($category);
            return response()->json([
                'data' => $categories
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to update resource',
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecategoryRequest  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecategoryRequest $request, Category $category)
    {
        try {
            // Use custom validation rules with the category ID
            $input = $request->validate($request->customrule($category->id));
            $category->category = $input['category'];
            // $category->id_subsatker = $input['subsatker'];
            $category->update();
            return response()->json([
                'status' => 'Category Successfully Updated !'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to update resource',
            ], 500);
        }
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
            return response()->json([
                'status' => 'Category Successfully Deleted !'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to delete resource',
            ], 500);
        }
    }

    public function search(Request $request)
    {
        try {

            // Validate the incoming search parameters
            $data = $request->validate([
                'category' => 'nullable|string',
                'id_subsatker' => 'nullable|integer',
            ]);

            // Build the query based on the provided parameters
            $query = Category::query();

            // Add a search condition for the 'category' field
            if (!empty($data['category'])) {
                $query->where('category', 'like', '%' . $data['category'] . '%');
            }

            // Add a search condition for the 'id_subsatker' field
            if (!empty($data['id_subsatker'])) {
                $query->where('id_subsatker', $data['id_subsatker']);
            }

            // Execute the query and get the results
            $categories = $query->get();

            // Check if any categories were found
            if ($categories->isEmpty()) {
                return response()->json(['message' => 'No categories found.'], 404);
            }

            // Return the search results as a JSON response
            return response()->json([
                'message' => 'Categories found.',
                'data' => $categories
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to search resource',
            ], 500);
        }
    }
}
