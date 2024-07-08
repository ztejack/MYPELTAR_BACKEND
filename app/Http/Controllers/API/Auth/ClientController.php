<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClient;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Ramsey\Uuid\Rfc4122\UuidV4;

/**
 * @group Client
 *
 */
class ClientController extends Controller
{
    /**
     * Get All Client
     * Display a listing of the Client
     * @Unauthenticated
     */
    public function index()

    {
        $client = Client::all();
        return response()->json(
            $client,
        );
    }
    public function search(Client $client)
    {
        try {

            return response()->json(
                $client,
            );
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'Failed to search resource',
            ]);
        }
    }
    public function store(StoreClient $request)
    {
        try {
            $client = new Client();
            $client->name = $request->name;
            $client->save();
            return response()->json(
                $client,
            );
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'Failed to create resource',
            ]);
        }
    }
}
