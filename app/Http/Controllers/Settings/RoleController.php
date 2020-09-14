<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $roles = Role::orderBy('updated_at', 'DESC')->paginate(5); //Listo los roles ordenados por la ultima creación y luego los pagino por 5
        return response()->json($roles, 200); //devuelvo los roles en la variable roles.
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::paginate(5);
        return response()->json($permissions, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'slug' => strtolower($request['description'])
        ]); //update roles
        $role->permissions()->sync($request->get('permissions')); //update permissions
        return redirect()->route('roles.index', $role->id)->with('info', 'Role actualizado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        return response()->json($role, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::paginate(5);
        return response()->json([$role, $permissions], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->update($request->all()); //update roles
        $role->permissions()->sync($request->get('permissions')); //update permissions
        return redirect()->route('roles.index', $role->id)->with('info', 'Role actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('info', 'Eliminado Correctamente');
    }
}
