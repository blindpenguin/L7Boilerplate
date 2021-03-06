<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserDelete;
use App\Http\Requests\UserStore;
use App\Http\Requests\UserUpdate;
use App\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::sortable('name')->paginate(15);
        return view('users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::when(!auth()->user()->hasRole('superadmin'), function($query, $user) {
            return $query->where('name', '!=', 'superadmin');
        })->pluck('name', 'id');
        return view('users.create', [
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserStore $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(UserStore $request)
    {
        if($request->validated()) {
            $data = $request->validated();
            if(isset($data['password'])) {
                $data['password'] = Hash::make($data['password']);
            }
            $user = User::create($data);
            $roles = Role::findMany($request->input('roles'));
            $user->assignRole($roles);
            return redirect(route('users.index'));
        }
        return back()->withErrors($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        $roles = Role::when(!auth()->user()->hasRole('superadmin'), function($query, $user) {
            return $query->where('name', '!=', 'superadmin');
        })->pluck('name', 'id');
        return view('users.edit', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdate $request
     * @param \App\User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UserUpdate $request, User $user)
    {
        if($request->validated()) {
            $data = $request->validated();
            if(isset($data['password'])) {
                $data['password'] = Hash::make($data['password']);
            }
            $user->update(array_filter($data));
            $roles = Role::findMany($request->input('roles'));
            $user->syncRoles($roles);
            return redirect(route('users.show', $user->id));
        }
        return back()->withErrors($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param UserDelete $request
     * @param \App\User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(UserDelete $request, User $user)
    {
        $data = $request->validated();
        if($data['confirm'] == true) {
            $user->delete();
            return redirect(route('users.index'));
        }
        return back()->withErrors($request);
    }
}
