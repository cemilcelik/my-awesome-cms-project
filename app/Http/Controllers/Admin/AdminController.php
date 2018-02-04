<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
	public function index()
    {
	    $admins = Admin::all();

		return view('admin.admin.index', compact('admins'));
	}

    public function edit(Admin $admin)
    {
        return view('admin.admin.edit', compact('admin'));
    }

    public function update(Admin $admin, Request $request)
    {
        $validator = $this->_validate($admin, $request);

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

	public function _validate(Admin $admin, Request $request)
    {
        $rules = [
            'name'      => 'bail|required|string|min:3|max:100',
            'surname'   => 'bail|required|string|min:3|max:100',
            'email'     => "bail|required|string|min:3|max:100|email|unique:admin,email,{$admin->adminId},adminId"
        ];

        $validator = Validator::make($request->all(), $rules);

        return $validator;
    }
}
