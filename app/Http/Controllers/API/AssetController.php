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
     *       "stock_code": "26",
     *       "asset_code": "AST23060002",
     *       "serialnumber": "FAKESerial00002",
     *       "asset_name": "Dr. Felipe Green",
     *       "brand": "Quos.",
     *       "model": "Perspiciatis nisi.",
     *       "specifications": "Magnam est quis.",
     *       "description": "Dolores ipsam dignissimos.",
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
        try {
            $limit = $request->query('limit', 20);
            $assets = Asset::query();
            // Apply filters
            if ($request->has('asset_name') && $request->input('asset_name') != null) {
                $assets->where('name', 'like', '%' . $request->input('asset_name') . '%');
            }
            if ($request->has('brand') && $request->input('brand') != null) {
                $assets->where('brand', 'like', '%' . $request->input('brand') . '%');
            }
            if ($request->has('model') && $request->input('model') != null) {
                $assets->where('model', 'like', '%' . $request->input('model') . '%');
            }
            if ($request->has('asset_code') && $request->input('asset_code') != null) {
                $assets->where('code_ast', $request->input('asset_code'));
            }
            if ($request->has('stock_code') && $request->input('stock_code') != null) {
                $assets->where('stockcode', $request->input('stock_code'));
            }
            if ($request->has('serial_number') && $request->input('serial_number') != null) {
                $assets->where('serialnumber', $request->input('serial_number'));
            }
            if ($request->has('category') && $request->input('category') != null) {
                $kategoriTerm = $request->input('category');
                $assets->whereHas('category', function ($query) use ($kategoriTerm) {
                    $query->where('category', 'like', '%' . $kategoriTerm . '%');
                });
            }
            if ($request->has('status') && $request->input('status') != null) {
                $statusTerm = $request->input('status');
                $assets->whereHas('status', function ($query) use ($statusTerm) {
                    $query->where('status', 'like', '%' . $statusTerm . '%');
                });
            }
            // Get results
            $assets = $assets->get();
            return $assets;
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
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to Get Resource',
            ], 500);
        }
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
     *       "brand": "Quos.",
     *       "model": "Perspiciatis nisi.",
     *       "specifications": "Magnam est quis.",
     *       "description": "Dolores ipsam dignissimos.",
     *       "LOCATION": "RCD2",
     *       "category": [
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
        try {
            $limit = $request->query('limit', 20);
            $assets = AssetResource::collection(
                Asset::orderBy(
                    request('column') ? request('column') : 'updated_at',
                    request('direction') ? request('direction') : 'desc'
                )->paginate($limit)
            );

            return response()->json([
                'data' => $assets,
            ], 200, [], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to Get Resource',
            ], 500);
        }
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
        try {
            $request->validated();
            $asset = new Asset();
            $asset->stockcode = $request['stockcode'];
            $asset->serialnumber = $request['serialnumber'];
            $asset->name = $request['stockcode'];
            $asset->brand = $request['brand'];
            $asset->model = $request['model'];
            $asset->specifications = $request['specifications'];
            $asset->description = $request['description'];
            $asset->id_location = $request['id_location'];
            $asset->id_status = $request['id_status'];
            if (!is_null($request['image'])) {
                // $image = Storage::put('public/images/Asset', $request->file('image'));
                $image = $request->file('image')->store('images/Asset', 'public');
                $asset->image = $image;
            }
            $asset->save();
            $category = Category::find($request['id_category']);
            $asset->category()->attach($category);

            return response()->json([
                'message' => 'Asset Successfully Added !'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to Store Resource',
            ], 500);
        }
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
     *     "asset_name": "Ben Carter",
     *     "brand": "Ut molestiae eveniet alias.",
     *     "model": "Explicabo earum quibusdam.",
     *     "specifications": "At.",
     *     "description": "Sint et beatae.",
     *     "location": "RCD1",
     *     "category": [
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
        return response()->json(['data' => $assetr], 200, [], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
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
        try {
            $input = $request->validated();
            $asset->stockcode = $input['stockcode'];
            $asset->serialnumber = $input['serialnumber'];
            $asset->name = $input['asset_name'];
            $asset->brand = $input['brand'];
            $asset->model = $input['model'];
            $asset->specifications = $input['specifications'];
            $asset->description = $input['description'];
            $asset->id_location = $input['id_location'];
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
            $asset->category()->attach($input["id_category"]);

            $asset->update();
            return response()->json(['status' => 'Asset Successfully Updated !'], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to Update Resource',
            ], 500);
        }
    }

    public function getdeletedrecords()
    {
        try {
            $deletedRecords = asset::onlyTrashed()->get()->paginate(10);

            return response()->json([
                'data' => $deletedRecords,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to fetch deleted records.',
                'error' => $e->getMessage(),
            ], 500);
        }
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
            'status' => 'Asset Successfully Deleted !',
        ], 200);
    }
    /**
     *
     * Restore the specified Assets from storage.
     *
     * @param  \App\Models\asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function restore($asset)
    {
        try {
            // Find the soft-deleted record
            $record = asset::withTrashed()->findOrFail($asset);

            // Restore the record
            $record->restore();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to restore record.', 'message' => $e->getMessage()], 500);
        }
        return response()->json(['status' => 'Record successfully restored!'], 200);
    }

    /**
     *
     * History the specified Assets from storage.
     *
     * @param  \App\Models\asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function history(asset $asset) {}
}
