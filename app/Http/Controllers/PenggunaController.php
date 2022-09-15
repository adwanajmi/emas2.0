<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePenggunaRequest;
use App\Http\Requests\UpdatePenggunaRequest;
use App\Imports\UsersImport;
use App\Models\Pengguna;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use DataTables;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::all();
        $user = User::all();
        return view('user.index', [
            'role' => $role,
            'user' => $user,
        ]);
    }

    public function index1(Request $request)
    {
        // $role = Role::all();
        // $user = User::all();
        // return view('user.index1', [
        //     'role' => $role,
        //     'user' => $user,
        // ]);

        if ($request->ajax()) {
            $data = User::select('id', 'name', 'email')->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('user.index1');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();
        return view('user.create', [
            'users' => $user,
            'role' => $roles,
            'permissions' => $permissions,
        ]);

        // $user->syncPermission('KementerianPPD');
    }

    public function create1()
    {
        $user = User::all();
        $role = Role::all();
        $permissions = Permission::all();

        return view('user.create1', [
            'users' => $user,
            // 'role' => $role,
            // 'permissions' => $permissions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePenggunaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user = User::create($request->all());
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
            'password_confirmation' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'password_confirmation' => Hash::make(($request->password_confirmation)),
            // 'role' => $request->role,

        ]);

        // dd($request->all());

        $user->assignRole($request->role);
        $user->givePermissionTo($request->permission);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function show(Pengguna $pengguna)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        // $roles = Role::all();
        // $permissions = Permission::all();

        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();
        return view('user.edit', [
            'users' => $users,
            'roles' => $roles,
            'permissions' => $permissions,
        ]);
        // dd(gettype($users->role));
        // dd($users);
        // return view('user.edit', compact('users', 'roles', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenggunaRequest  $request
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengguna $pengguna, User $user)
    {
        // $user->revokePermissionTo('BPKP');
        // dd($user->hasPermissionTo('BPKP'));
        $user->update($request->all());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        // $user->permissions = $request->permissions;

        $user->syncRoles($request->role);
        // $user->givePermissionTo($request->permission);

        $user->syncPermissions($request->permission);

        // $user->givePermissionTo($request->permission);

        $user->save();

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')
            ->with('Berjaya', 'Keterangan berjaya dibuang');
    }

    public function set_semula_kata_laluan(Request $request, $user)
    {
        $reset_pass = User::find($user);

        $reset_pass->password = Hash::make($request->password);
        $reset_pass->save();

        echo '<script language="javascript">';
        echo 'alert("Kata laluan berjaya disetkan semula.");';
        echo "window.location.href='/carian-pengguna';";
        echo '</script>';
    }

    public function import()
    {
        Excel::import(new UsersImport, request()->file('userfile'));

        return back();
    }
}
