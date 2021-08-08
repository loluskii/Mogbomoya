<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\AdminUpdateUserRequest;
use App\Actions\User\AdminUpdateUser;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index')->with('users', $users);
    }

    public function deletedUsers()
    {
        $users = User::onlyTrashed()->paginate(10);
        return view('admin.users.index')->with('users', $users);
    }

    public function deactivatedUsers()
    {
        $users = User::where('isActive', 0)->paginate(10);
        return view('admin.users.index')->with('users', $users);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit')->with('user', $user);
    }

    public function update(AdminUpdateUserRequest $request)
    {
        try {
            (new AdminUpdateUser())->run($request->validated());
            return back()->with('success', 'User Updated');
        } catch (\Exception $e) {
            return back()->with(
                'error',
                $e->getMessage()
            );
        }
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.users.index')->with('success', 'User Deleted');
    }

    public function restore($id)
    {
        User::findOrFail($id)->restore();
        return redirect()->route('admin.users.index')->with('success', 'User Restored');
    }
}
