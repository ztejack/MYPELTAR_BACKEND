<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Http\Requests\StoreassetRequest;
use App\Http\Requests\UpdateassetRequest;
use App\Http\Resources\AssetResource;
use App\Models\Category;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Location;
use App\Models\PCategory;
use App\Models\StatusAssets;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

/**
 * @group Assets
 */
class AssetController extends Controller
{
    
    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['index', 'show']]);
    // }
    /**
     * Search the specified Assets
     * 
     * search a collection of data asset
     * @queryParam page int The paginate of collection asset. Example: 1
     * @queryParam limit int The count of collection asset per page. default `20` per page Example: 20
     * @queryParam name string The name of the  asset. Example: Printer Epsen L310
     * @queryParam merk string required The merk of the user. Example: Epsen
     * @queryParam model string required The model of the user. Example: Printer & Scanner
     * @queryParam code_asset string required The code_asset of the user. Example: AST0010
     * @queryParam stockcode string required The stockcode of the user. Example: 202015602
     * @queryParam serialnumber string required The serialnumber of the user. Example: hjk4h65...
     * @queryParam kategori string required The kategori of the user. Example: printer
     * @queryParam status string required The status of the user. Example: baik
     * 
     * @response 200 scenario="Ok" 
     * [
     *     {
     *       "id": 2,
     *       "stockcode": "26",
     *       "code_asset": "AST23060002",
     *       "serialnumber": "FAKESerial00002",
     *       "nama_asset": "Dr. Felipe Green",
     *       "merk": "Quos.",
     *       "model": "Perspiciatis nisi.",
     *       "spesifikasi": "Magnam est quis.",
     *       "deskripsi": "Dolores ipsam dignissimos.",
     *       "lokasi": "RCD2",
     *       "kategori": [
     *         "Pariatur."
     *       ],
     *       "status": "Pending",
     *       "updated_at": "2023-06-15T10:33:27.000000Z",
     *       "created_at": "2023-06-15T10:31:00.000000Z"
     *     },
     * ]
     */

    public function search(Request $request)
    {
        $limit = $request->query('limit', 20);
        $assets = Asset::query();

        // Apply filters
        if ($request->has('nama_asset') && $request->input('nama_asset') != null) {
            $assets->where('name', 'like', '%' . $request->input('nama_asset') . '%');
        }
        if ($request->has('merk') && $request->input('merk') != null) {
            $assets->where('merk', 'like', '%' . $request->input('merk') . '%');
        }
        if ($request->has('model') && $request->input('model') != null) {
            $assets->where('model', 'like', '%' . $request->input('model') . '%');
        }
        if ($request->has('code_asset') && $request->input('code_asset') != null) {
            $assets->where('code_asset', $request->input('code_asset'));
        }
        if ($request->has('stockcode') && $request->input('stockcode') != null) {
            $assets->where('stockcode', $request->input('stockcode'));
        }
        if ($request->has('serialnumber') && $request->input('serialnumber') != null) {
            $assets->where('serialnumber', $request->input('serialnumber'));
        }
        if ($request->has('kategori') && $request->input('kategori') != null) {
            $kategoriTerm = $request->input('kategori');
            $assets->whereHas('category', function ($query) use ($kategoriTerm) {
                $query->where('kategori', 'like', '%' . $kategoriTerm . '%');
            });
        }
        if ($request->has('status') && $request->input('status') != null) {
            $statusTerm = $request->input('status');
            $assets->whereHas('status', function ($query) use ($statusTerm) {
                $query->where('status','like', '%' . $statusTerm . '%');
            });
        }

        // Get results
        $assets = $assets->get();

        if ($assets->isEmpty()) {
            return response()->json(['message' => 'No results found.'], 404);
        } else {
            $orderByColumn = request('column', 'updated_at');
            $orderByDirection = request('direction', 'desc');
            $orderedAssets = $assets->sortBy($orderByColumn);

            if ($orderByDirection === 'desc') {
                $orderedAssets = $orderedAssets->reverse();
            }
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $pagedData = $orderedAssets->slice(($currentPage - 1) * $limit, $limit)->all();
            $paginatedAssets = new LengthAwarePaginator($pagedData, $orderedAssets->count(), $limit, $currentPage);

            $assets = AssetResource::collection(
                $paginatedAssets
            );
            return response()->json($assets, 200);
        }

        // $assets->whereHas('category', function ($query))
    }

    /**
     * Get All Assets
     * Display a listing of the Assets.
     * 
     * @queryParam page int The paginate of collection asset. Example: 1
     * @queryParam limit int The count of collection asset per page. default `20` per page Example: 20
     * 
     * @response 200 scenario="Ok" 
     * {
     *   "status": "success",
     *   "asset": [
     *     {
     *       "id": 2,
     *       "stockcode": "26",
     *       "code_asset": "AST23060002",
     *       "serialnumber": "FAKESerial00002",
     *       "nama_asset": "Dr. Felipe Green",
     *       "merk": "Quos.",
     *       "model": "Perspiciatis nisi.",
     *       "spesifikasi": "Magnam est quis.",
     *       "deskripsi": "Dolores ipsam dignissimos.",
     *       "lokasi": "RCD2",
     *       "kategori": [
     *         "Pariatur."
     *       ],
     *       "status": "Pending",
     *       "updated_at": "2023-06-15T10:33:27.000000Z",
     *       "created_at": "2023-06-15T10:31:00.000000Z"
     *     },
     * }
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->query('limit', 20);
        $assets = AssetResource::collection(
            Asset::orderBy(
                request('column') ? request('column') : 'updated_at',
                request('direction') ? request('direction') : 'desc'
            )->paginate($limit)
        );

        return response()->json([
            'status' => 'success',
            'asset' => $assets,
        ], 200);
    }

    /**
     * Create an Assets
     * Store a newly created Assets.
     * 
     * @response 200 scenario="Ok" 
     * {
     *   'status' => 'success',
     *   'message' => 'Asset Berhasil Ditambahkan !'
     * }
     * 
     * @response 422 scenario="Unprocessable Content"
     * {
     *   "message": "The given data was invalid.",
     *   "errors": {
     *     "stockcode": [
     *       "The stockcode has already been taken."
     *     ],
     *     "serialnumber": [
     *       "The serialnumber has already been taken."
     *     ]
     *   }
     * }
     *
     * @param  \App\Http\Requests\StoreassetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreassetRequest $request)
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
        $asset->id_status = $input['id_status'];
        if (!is_null($input['image'])) {
            $image = Storage::put('public/images/Asset', $request->file('image'));
            $asset->image = $image;
        }
        $asset->save();
        $category = Category::find($input['id_kategori']);
        $asset->category()->attach($category);

        return response()->json([
            'status' => 'success',
            'message' => 'Asset Berhasil Ditambahkan !'
        ], 201);
    }

    /**
     * Get Assets by ID
     * Display the specified Assets.
     * 
     * @response 200 scenario="Ok" 
     * {
     *   "data": {
     *     "id": 4,
     *     "stockcode": "178",
     *     "code_asset": "AST23060004",
     *     "serialnumber": "FAKESerial00004",
     *     "nama_asset": "Ben Carter",
     *     "merk": "Ut molestiae eveniet alias.",
     *     "model": "Explicabo earum quibusdam.",
     *     "spesifikasi": "At.",
     *     "deskripsi": "Sint et beatae.",
     *     "lokasi": "RCD1",
     *     "kategori": [
     *       "Sit."
     *     ],
     *     "status": "Baik",
     *     "updated_at": "2023-06-15T10:31:00.000000Z",
     *     "created_at": "2023-06-15T10:31:00.000000Z"
     *   }
     * }
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {
        $assetr = AssetResource::make($asset);
        return response()->json(['data' => $assetr], 200);
    }

    /**
     * Update Assets
     * Update the specified Assets.
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
        if ($request->hasFile('image')) {
            if (Storage::exists($asset->image)) {
                Storage::delete($asset->image);
            }
            $imagepath = Storage::put('public/images/Asset', $request->file('image'));
            $asset->image = $imagepath;
        }

        $category = Category::find($asset->category);
        $asset->category()->detach($category);
        $asset->category()->attach($input["id_kategori"]);

        $asset->update();
        return response()->json(['status' => 'Asset Berhasil Diupdate !'], 201);
    }

    /**
     * 
     * Delete the specified Assets from storage.
     *
     * @param  \App\Models\asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(asset $asset)
    {
        try {
            $asset->delete();
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to delete resource',
            ], 500);
        }
        return response()->json([
            'status' => 'Asset Berhasil Dihapus !',
        ], 200);
    }

    /**
     * 
     * Delete the specified Assets from storage.
     *
     * @param  \App\Models\asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function hostory(asset $asset)
    {
        try {
            if (Storage::exists($asset->image)) {
                Storage::delete($asset->image);
            }
            $asset->delete();
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to delete resource',
            ], 500);
        }
        return response()->json([
            'status' => 'Asset Berhasil Dihapus !',
        ], 200);
    }
}
