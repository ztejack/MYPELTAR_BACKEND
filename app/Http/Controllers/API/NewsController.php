<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Http\Requests\StorenewsRequest;
use App\Http\Requests\UpdatenewsRequest;
use App\Http\Resources\NewsResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * @group News
 */
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = NewsResource::collection(
            News::orderBy(
                request('column') ? request('column') : 'updated_at',
                request('direction') ? request('directio') : 'desc'
            )->paginate(50)
        );

        return response()->json([
            'status' => 'success',
            'news' => $news,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorenewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorenewsRequest $request)
    {
        $input = $request->validated();
        $news = new News();
        $news->title = $input['title'];
        $news->deskripsi = $input['deskripsi'];
        if (!is_null($input['image'])) {
            $image = Storage::put('public/images/News', $request->file('image'));
            $news->image = $image;
        }
        $news->id_user = Auth::user()->id;
        $news->save();
        return response()->json(['status' => 'Data News Berhasil Ditambahkan !'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        $news = NewsResource::make($news);
        return response()->json(['data' => $news], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatenewsRequest  $request
     * @param  \App\Models\news  $news
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatenewsRequest $request, News $news)
    {
        $input = $request->validated();
        $news->title = $input['title'];
        $news->deskripsi = $input['deskripsi'];
        if ($request->hasFile('image')) {
            if (Storage::exists($news->image)) {
                Storage::delete($news->image);
            }
            $imagepath = Storage::put('public/images/News', $request->file('image'));
            $news->image = $imagepath;
        }
        $news->update();
        return response()->json(['status' => 'Data News berhasil Diupdate'], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\banner  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        try {
            if (Storage::exists($news->image)) {
                Storage::delete($news->image);
            }
            $news->delete();
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to delete resource',
            ], 500);
        }
        return response()->json([
            'status' => 'Data News Berhasil Dihapus !',
        ], 200);
    }
}
