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
use Ramsey\Uuid\Rfc4122\UuidV4;

/**
 * @group Users
 */
class UserController extends Controller
{
    public function search(Request $request)
    {
        $Userss = User::query();

        // Apply filters
        if ($request->has('name') && $request->input('name') != null) {
            $Userss->where('name', 'like', '%' . $request->input('name') . '%');
        }
        if ($request->has('username') && $request->input('username') != null) {
            $Userss->where('username', 'like', '%' . $request->input('username') . '%');
        }
        if ($request->has('email') && $request->input('email') != null) {
            $Userss->where('email', 'like', '%' . $request->input('email') . '%');
        }
        if ($request->has('satker') && $request->input('satker') != null) {
            $Userss->where('satker', $request->input('satker'));
        }
        if ($request->has('subsatker') && $request->input('subsatker') != null) {
            $Userss->where('subsatker', $request->input('subsatker'));
        }
        if ($request->has('satker') && $request->input('satker') != null) {
            $satkerTerm = $request->input('satker');
            $Userss->whereHas('satkers', function ($query) use ($satkerTerm) {
                $query->where('satker', $satkerTerm);
            });
        }
        if ($request->has('subsatker') && $request->input('subsatker') != null) {
            $subsatkerTerm = $request->input('subsatker');
            $Userss->whereHas('subsatker', function ($query) use ($subsatkerTerm) {
                $query->where('subsatker',  $subsatkerTerm);
            });
        }

        // Get results
        $Userss = $Userss->get();

        if ($Userss->isEmpty()) {
            return response()->json(['message' => 'No results found.'], 404);
        } else {
            $Userss = UserResource::collection(
                $Userss
            );
            return response()->json($Userss, 200);
        }
    }

    /**
     *
     * @group Users
     * @authenticate
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
        // dd($request->validated());
        $input = $request->validated();
        // dd($input);
        $user = new User();
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->username = $input['username'];
        $user->id_subsatker = $input['id_subsatker'];
        $user->password = '12345678';
        $user->uuid = UuidV4::uuid4()->getHex();
        // return $role;
        if (!is_null($input['id_role'])) {
            $user->assignRole($input['']);
        } else {
            $user->assignRole($input['id_role']);
        }
        $user->save();

        $expirationDate = Carbon::now()->addDays(30);

        // ApiKey::create([
        //     'user_id' => $user->id,
        //     'api_key' => Str::random(32),
        //     'expiration_date' => $expirationDate,
        // ]);

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

    /**
     * @group Users
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateuserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
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
