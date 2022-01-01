<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->role = new Role();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'desc')->paginate(20);
        return view('backend.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        return view('backend.role.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
//        dd($request->all());
        try {
            $validator = Validator::make($request->all(), [
                'role_name' => 'required',
                'role_slug' => 'required',
            ], [
                'role_name.required' => 'Role Name is required.',
                'role_slug.required' => 'Role_slug is required.',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }
            $role = new Role();

            $data = [
                'uuid' => $this->uuid(),
                'role_name' => $request->role_name,
                'role_slug' => $request->role_slug,
            ];
//            $this->role->store_data($data);
            $roleId = $role->create($data);
            $listofPermissions = explode(',', $request->roles_permissions);
            foreach ($listofPermissions as $permission) {
                $permissions = new Permission();
                $permissions->name = $permission;
                $permissions->role_id = $roleId->id;
                $permissions->slug = strtolower(str_replace(" ", "-", $permission));
                $permissions->save();
//                dd($role->permissions()->attach($permissions->id));
                //$role->permissions()->attach($permissions->id);

                //$role->save();
            };


            toastr()->success('Added Successfully.');
            return redirect()->route('roles.index');
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('backend.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Role $role)
    {
//        dd($role);
        try {
            $column = "uuid";
            $column_value = $role->uuid;
            $find_existing_data = $this->role->find_single_data($column, $column_value);
            $validator = Validator::make($request->all(), [
                'role_name' => 'required',
                'role_slug' => 'required',
            ], [
                'role_name.required' => 'Name is required.',
                'role_slug.required' => 'Phone is required.',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }

            $update_column = "id";
            $update_column_value = $find_existing_data->id;
            $update_data = [
                'role_name' => $request->role_name,
                'role_slug' => $request->role_slug,
            ];

            $this->role->update_data($update_column, $update_column_value, $update_data);
            toastr()->success('User Update Successfully.');
            return redirect()->route('roles.index');
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
