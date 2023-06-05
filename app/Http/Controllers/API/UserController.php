<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreuserRequest;
use App\Http\Requests\UpdateuserRequest;
use App\Http\Resources\UserResource;
use App\Models\ApiKey;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class UserController extends Controller
{
    // public function search(Request $request)
    // {
    //     $Userss = Users::query();

    //     // Apply filters
    //     if ($request->has('nama_Users') && $request->input('nama_Users') != null) {
    //         $Userss->where('name', 'like', '%' . $request->input('nama_Users') . '%');
    //     }
    //     if ($request->has('merk') && $request->input('merk') != null) {
    //         $Userss->where('merk', 'like', '%' . $request->input('merk') . '%');
    //     }
    //     if ($request->has('model') && $request->input('model') != null) {
    //         $Userss->where('model', 'like', '%' . $request->input('model') . '%');
    //     }

    //     if ($request->has('code_Users') && $request->input('code_Users') != null) {
    //         $Userss->where('code_Users', $request->input('code_Users'));
    //     }
    //     if ($request->has('stockcode') && $request->input('stockcode') != null) {
    //         $Userss->where('stockcode', $request->input('stockcode'));
    //     }
    //     if ($request->has('serialnumber') && $request->input('serialnumber') != null) {
    //         $Userss->where('serialnumber', $request->input('serialnumber'));
    //     }
    //     if ($request->has('kategori') && $request->input('kategori') != null) {
    //         $kategoriTerm = $request->input('kategori');
    //         $Userss->whereHas('category', function ($query) use ($kategoriTerm) {
    //             $query->where('kategori', $kategoriTerm);
    //         });
    //     }
    //     if ($request->has('status') && $request->input('status') != null) {
    //         $statusTerm = $request->input('status');
    //         $Userss->whereHas('status', function ($query) use ($statusTerm) {
    //             $query->where('status',  $statusTerm);
    //         });
    //     }

    //     // Get results
    //     $Userss = $Userss->get();

    //     if ($Userss->isEmpty()) {
    //         return response()->json(['message' => 'No results found.'], 404);
    //     } else {
    //         $Userss = UsersResource::collection(
    //             $Userss
    //         );
    //         return response()->json($Userss, 200);
    //     }
    // }

    /**
     * 
     * @group Users
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = UserResource::collection(
            User::orderBy(
                request('column') ? request('column') : 'updated_at',
                request('direction') ? request('direction') : 'desc'
            )->paginate(50)
        );

        return response()->json([
            'status' => 'success',
            'users' => $users,
        ], 200);
    }

    /**
     * @group Users
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreuserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreuserRequest $request)
    {
        $input = $request->validated();
        $user = new User();
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->username = $input['username'];
        $user->id_subsatker = $input['id_subsatker'];
        $user->password = '12345678';
        // return $role;
        $user->assignRole($input['id_role']);
        $user->save();
        $apikey = new ApiKey();
        $apikey->apikey = Str::random(32);

        $expirationDate = Carbon::now()->addDays(30);

        APIKey::create([
            'user_id' => $user->id,
            'api_key' => $apikey,
            'expiration_date' => $expirationDate,
        ]);

        return response()->json(['status' => 'Users Berhasil Ditambahkan !'], 201);
    }

    /**
     * @group Users
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $userr = UserResource::make($user);
        return response()->json(['data' => $userr], 200);
    }

    // /**
    //  * @group Users
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \App\Http\Requests\UpdateuserRequest  $request
    //  * @param  \App\Models\User  $user
    //  * @return \Illuminate\Http\Response
    //  */
    public function update(UpdateuserRequest $request, User $user)
    {
        $input = $request->validated();
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->username = $input['username'];
        $user->id_subsatker = $input['id_subsatker'];
        $role = Role::findByName($user->getRoleNames()->first());
        $user->removeRole($role->id);
        $user->assignRole($input['id_role']);
        $user->update();
        return response()->json(['status' => 'Users Berhasil Diupdate !'], 201);
    }

    /**
     * @group Users
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to delete resource',
            ], 500);
        }
        return response()->json([
            'status' => 'User Berhasil Dihapus !',
        ], 200);
    }
}
