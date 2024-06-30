<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Support\Facades\Crypt;

class ClientController extends Controller
{
    public function index()
    {
        $client = Client::all();
        return response()->json(
            $client,
        );
    }
}
