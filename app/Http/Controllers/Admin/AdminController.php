<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Admin;
use App\Role;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin|admin-manager');
    }

	public function index()
    {
	    $admins = Admin::all();

		return view('admin.admin.index', compact('admins'));
	}

	public function create()
    {
        $roles = Role::all();
        
        return view('admin.admin.add', compact('roles'));
    }

    public function store(Request $request)
    {
        $validator = $this->_validate($request);

        if ($validator->fails()) {
            return redirect(route('admin.create'))
                ->withErrors($validator)
                ->withInput()
            ;
        }

        $admin = Admin::create([
            'name'      => $request->input('name'),
            'surname'   => $request->input('surname'),
            'email'     => $request->input('email'),
            'password'  => bcrypt($request->input('password'))
        ]);

        $admin->roles()->attach($request->input('role_id'));

        return redirect(route('admin.index'))
            ->with('status', ['type' => 'success', 'message' => 'Admin is successfully create!'])
        ;
    }

    public function edit(Admin $admin)
    {
        $roles = Role::all();

        return view('admin.admin.edit', compact('admin', 'roles'));
    }

    public function update(Admin $admin, Request $request)
    {
        $validator = $this->_validate($request, $admin);

        if ($validator->fails()) {
            return redirect(route('admin.edit', $admin))
                ->withErrors($validator)
                ->withInput()
            ;
        }

        $admin->name    = $request->input('name');
        $admin->surname = $request->input('surname');
        $admin->email   = $request->input('email');

        if ($request->input('password'))
            $admin->password = bcrypt($request->input('password'));

        $admin->save();

        $admin->roles()->sync($request->input('role_id'));

        return redirect(route('admin.index'))
            ->with('status', ['type' => 'success', 'message' => 'Admin is successfully update!'])
        ;
    }

    public function destroy(Admin $admin, Request $request)
    {
        if ( ! $request->isMethod('delete')) {
            return redirect(route('admin.index'))
                ->with('status', ['type' => 'danger', 'message' => 'Invalid request method.'])
            ;
        }

        $admin->delete();

        return redirect(route('admin.index'))
            ->with('status', ['type' => 'success', 'message' => 'Admin is successfully delete!'])
        ;
    }

	public function profile()
    {
		return view('admin.profile.index');
	}

	public function _validate(Request $request, Admin $admin = null)
    {
        $rules = [
            'role_id'   => 'bail|required|integer|exists:roles,id',
            'name'      => 'bail|required|string|min:3|max:100',
            'surname'   => 'bail|required|string|min:3|max:100',
            'email'     => 'bail|required|string|min:3|max:100|email|unique:admin'
        ];

        // add options, on update, except self for unique
        if ($admin !== null) 
            $rules['email'] .= ",email,{$admin->adminId},adminId"; // unique:uniqueTable,uniqueField,exceptId,exceptField

        $validator = Validator::make($request->all(), $rules);

        return $validator;
    }
}
