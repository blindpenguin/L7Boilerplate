<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleDelete;
use App\Http\Requests\RoleStore;
use App\Http\Requests\RoleUpdate;
use Spatie\Permission\Models\Permission;
use App\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Role::class, 'role');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $roles = Role::paginate(15);
        return view('roles.index', [
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $permissions = Permission::pluck('name', 'id');
        return view('roles.create', [
            'permissions' => $permissions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleStore $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(RoleStore $request)
    {
        $data = $request->validated();
        if($data) {
            $role = Role::create([
                'name' => $data['name']
            ]);
            $role->syncPermissions($data['permissions']);
            return redirect(route('roles.index'));
        }
        return back()->withErrors($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Role $role)
    {
        return view('roles.show', [
            'role' => $role
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Role $role)
    {
        return view('roles.edit', [
            'role' => $role,
            'permissions' => Permission::pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RoleUpdate $request
     * @param \App\Role $role
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(RoleUpdate $request, Role $role)
    {
        $data = $request->validated();
        if($data) {
            if($data['name']) {
                $role->name = $data['name'];
            }
            $role->syncPermissions($data['permissions']);
            return redirect(route('roles.show', $role->id));
        }
        return back()->withErrors($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param RoleDelete $request
     * @param \App\Role $role
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(RoleDelete $request, Role $role)
    {
        $data = $request->validated();
        if($data['confirm'] == true) {
            $role->delete();
            return redirect(route('users.index'));
        }
        return back()->withErrors($request);
    }
}
