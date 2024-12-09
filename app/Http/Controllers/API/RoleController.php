<?php

namespace App\Http\Controllers\API;

use App\Helpers\PermissionDebugger;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Http\Requests\StoreroleRequest;
use App\Http\Requests\UpdateroleRequest;
use App\Http\Resources\PermissionResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

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
    public function showp()
    {
        $user = Auth::user();
        try {
            $permissions = new PermissionResource($user);
            return response()->json([
                'data' => $permissions,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'Failed to search resource',
            ]);
        }
    }

    /**
     * Show the form for assignrole.
     *
     * @return \Illuminate\Http\Response
     */
    public function assignrole(Request $request)
    {
        try {
            // Validate the request data
            $validator = Validator::make(
                $request->all(),
                [
                    'user_id' => 'required|integer|exists:users,id',
                    'role_id' => 'required|integer|exists:roles,id',
                ]
            );
            // If validation fails, return a custom response
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'The given data was invalid',
                    'errors' => $validator->errors()->messages()
                ], 422);  // 422 Unprocessable Entity status code for validation errors
            }

            // Find the user by ID
            $user = User::find($request['user_id']);

            // Find the role by ID
            $role = Role::findById($request['role_id']);

            // Check if the user already has this role
            if ($user->hasRole($role->name)) {
                return response()->json([
                    'message' => 'User already has this role',
                    'user' => new UserResource($user),
                    'role' => $role->name
                ], 200); // Return success response if the user already has the role
            }

            // Remove all current roles before assigning a new one
            $user->syncRoles([]); // This removes all roles from the user

            // Assign the new role to the user
            $user->assignRole($role);

            // Return success response
            return response()->json([
                'message' => 'Role assigned successfully',
                'user' => new UserResource($user),
                'role' => $role->name,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'Failed to search resource',
            ]);
        }
    }

    public function revokerole(Request $request)
    {
        try {
            // Validate the request to ensure the user_id is provided and valid
            $validator = Validator::make($request->all(), [
                'user_id' => 'required|integer|exists:users,id',
            ]);

            // If validation fails, return a custom response
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422); // Unprocessable Entity status code for validation errors
            }

            // Find the user by ID
            $user = User::find($request->user_id);

            // Check if the user has any role assigned
            if ($user->roles->isEmpty()) {
                return response()->json([
                    'message' => 'The user has no assigned role to revoke.'
                ], 404); // Not Found status code for no role found
            }

            // Revoke all roles from the user (since they can only have one)
            $user->syncRoles([]); // This will remove all assigned roles

            // Return success response after revoking the role
            return response()->json([
                'message' => 'Role revoked successfully from the user.',
                'user' => new UserResource($user),
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'Failed to search resource',
            ]);
        }
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
    public function show(Request $request)
    {
        try {
            // Validate the request data to ensure 'id' or 'name' is present
            $data = $request->validate([
                'role_id' => 'nullable|integer',
                'name' => 'nullable|string',
            ]);

            // Create the query
            $query = Role::query();

            if (is_null($data['role_id']) && is_null($data['role_name'])) {
                return response()->json(['message' => 'Role not found'], 404);
            }
            // Check if the 'role_id' was provrole_ided and add it to the query
            if (isset($data['role_id'])) {
                $query->where('role_id', $data['role_id']);
            }

            // Check if the 'role_name' was provided and add it to the query
            if (isset($data['role_name'])) {
                $query->where('role_name', 'like', '%' . $data['role_name'] . '%');
            }

            // Execute the query and get the result
            $role = $query->get();  // You can use get() to retrieve multiple records
            // Check if a role was found
            if (!$role) {
                return response()->json(['message' => 'Role not found'], 404);
            }
            // Return the role as a response
            return response()->json([
                'data' => $role
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'Failed to search resource',
            ]);
        }
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
}
