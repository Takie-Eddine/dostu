<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RolePermissionsController extends Controller
{
    public function rolepermission(){

        $roles = Role::whereNull('permissions')->get();
        return view('client.role.index',compact('roles'));

    }


    public function create(){

        return view('client.role.create');
    }


    public function store(RoleRequest $request){

        //return $request;
        try {

            $role = $this->process(new Role, $request);
            if ($role)
                return redirect()->route('client.manage.role-permissions.index')->with(['success' => 'added with success']);
            else
                return redirect()->route('client.manage.role-permissions.index')->with(['error' => 'there is a problem']);
        } catch (\Exception $ex) {
            return $ex;
            // return message for unhandled exception
            return redirect()->route('supplier.manage.role-permissions.index')->with(['error' => 'there is a problem']);
        }
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('client.role.edit',compact('role'));
    }

    public function update($id,RoleRequest $request)
    {
        try {
            $role = Role::findOrFail($id);
            $role = $this->process($role, $request);
            if ($role)
                return redirect()->route('client.manage.role-permissions.index')->with(['success' => 'updated with success']);
            else
                return redirect()->route('client.manage.role-permissions.index')->with(['error' => 'there is a problem']);
        } catch (\Exception $ex) {
            // return message for unhandled exception
            return redirect()->route('client.manage.role-permissions.index')->with(['error' => 'there is a problem']);
        }
    }

    protected function process(Role $role, Request $r)
    {
        $role->name = $r->name;
        $role->permissions_client = json_encode($r->permissions_client);
        $role->save();
        return $role;
    }
}
