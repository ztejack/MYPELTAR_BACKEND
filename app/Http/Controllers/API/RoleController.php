<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Http\Requests\StoreroleRequest;
use App\Http\Requests\UpdateroleRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

/**
 *
 * @group Role
 */
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return response()->json(['data' => $roles]);
    }

    /**
     * Display the permissions of the specified role.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function showPermissions()
    {

        $user = Auth::user();
        // $roles = $user->getRoleNames(); // ["Admin"]
        // if ($roles->contains('Admin')) {
        //     echo "User has Admin role using getRoleNames.";
        // }
        // if ($user->hasRole('Admin')) {
        //     echo "User has Admin role using hasRole.";
        // } else {
        //     echo "User does not have Admin role using hasRole.";
        // }
        // Check if the current user can view users
        if (Gate::allows('getall-users')) {
            echo "can work";
            // return response()->json($users);
        } else {
            echo "can not work";
        }
        // $permissions = $user->getAllPermissions()->pluck('name'); // Mengambil nama-nama izin

        // return response()->json([
        //     'user' => $user->name,
        //     'permissions' => $permissions
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @param  \App\Http\Requests\StoreroleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreroleRequest $request)
    {
        // $input = $request->validated();
        // $role = new Role()
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateroleRequest  $request
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateroleRequest $request, role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(role $role)
    {
        //
    }
}
