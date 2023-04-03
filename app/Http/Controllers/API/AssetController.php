<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Http\Requests\StoreassetRequest;
use App\Http\Requests\UpdateassetRequest;
use App\Http\Resources\AssetResource;
use App\Models\Category;
use App\Models\Location;
use App\Models\PCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AssetController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['index', 'show']]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assets = AssetResource::collection(Asset::orderBy(request('column') ? request('column') : 'updated_at', request('direction') ? request('direction') : 'desc')->paginate());
        return response()->json([
            'status' => 'success',
            'asset' => $assets,
        ], 200);
    }
    // return response()->json(Produk::orderBy(request('column') ? request('column') : 'updated_at', request('direction') ? request('direction') : 'desc')->paginate());


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
     * @param  \App\Http\Requests\StoreassetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreassetRequest $request)
    // public function store(StoreassetRequest $request)
    {
        $input = $request->validated();
        $asset = new Asset();
        $asset->stockcode = $input['stockcode'];
        $asset->serialnumber = $input['serialnumber'];
        $asset->name = $input['nama_asset'];
        $asset->merk = $input['merk'];
        $asset->model = $input['model'];
        $asset->spesifikasi = $input['spesifikasi'];
        $asset->deskripsi = $input['deskripsi'];
        $asset->id_lokasi = $input['id_lokasi'];
        $asset->id_status->attach($input['id_status']);
        $asset->save();
        $category = Category::find($input['id_kategori']);
        $asset->category()->attach($category);
        return response()->json(['status' => 'Asset Berhasil Ditambahkan !'], 201);
        // return response()->json($asset, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {
        // Asset::find($id);
        // return $asset;
        // $assetx = Asset::findOrFail($asset);
        $assetr = AssetResource::make($asset);
        return response()->json(['data' => $assetr], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(asset $asset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateassetRequest  $request
     * @param  \App\Models\asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateassetRequest $request, asset $asset)
    {
        $input = $request->validated();
        $asset->stockcode = $input['stockcode'];
        $asset->serialnumber = $input['serialnumber'];
        $asset->name = $input['nama_asset'];
        $asset->merk = $input['merk'];
        $asset->model = $input['model'];
        $asset->spesifikasi = $input['spesifikasi'];
        $asset->deskripsi = $input['deskripsi'];
        $asset->id_lokasi = $input['id_lokasi'];
        $asset->id_status = $input['id_status'];

        $category = Category::find($asset->kategori);
        $asset->kategori()->detach($category);
        $asset->kategori()->attach($input["id_kategori"]);

        $asset->update();
        return response()->json(['status' => 'Asset Berhasil Diupdate !'], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(asset $asset)
    {
        //
    }
}
