<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Inspeksi;
use Illuminate\Http\Request;

class InspeksiController extends Controller
{
    public function index()
    {
        $inspeksi = Inspeksi::latest()->paginate(50);
        return response()->json([
            'data' => $inspeksi
        ]);
    }
}
