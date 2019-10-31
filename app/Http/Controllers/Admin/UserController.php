<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Chotel\UserRequest;
use App\Model\Chotel\Role;
use App\Model\Chotel\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    //
    public function index()
    {
        $listUser = $this->user->index();
        return view('admin.user.index', compact('listUser'));
    }

    public function getEdit($id)
    {
        //dd(Auth::user()->role_id);
        // user dang dang nhap
        $current_user = Auth::user()->username;
        $current_role_id = Auth::user()->role_id;
        //user can sua
        $target_user = $this->user->getEdit($id)->username;
        $target_role = $this->user->getEdit($id)->role;
        //dd($target_user);

        if ($current_role_id == 1 || $current_user == $target_user || ($current_role_id == 2 && $target_role == 'User')) {
            $user = $this->user->getEdit($id);
            $role = new Role();
            $listRole = $role->getRole();
            return view('admin.user.edit', compact('user', 'listRole'));
        }
        return redirect()->route('admin.user.index')->with('error', 'Ban khong co quyen');
    }

    public function postEdit(UserRequest $request)
    {
        $id = $request->id;
        $arr = [
            'fullname' => $request->fullname,
            'role_id' => $request->role
        ];
        $password = $request->password;
        if (!empty($password)) {
            $arr['password'] = Hash::make($password);
        }
        $result = $this->user->postEdit($id, $arr);
        if ($result) {
            $request->session()->flash('msg', 'update successfully');
        }
        return redirect()->route('admin.user.index');
    }

    public function getAdd()
    {
        $role = new Role();
        $listRole = $role->getRole();
        return view('admin.user.add', compact('listRole'));
    }

    public function postAdd(UserRequest $request)
    {
        $arr = [
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'fullname' => $request->fullname,
            'role_id' => $request->role_id
        ];
        $result = $this->user->postAdd($arr);
        if ($result) {
            $request->session()->flash('msg', 'Add successfully');
        }
        return redirect()->route('admin.user.index');
    }

    public function deleteUser($id)
    {
        //dd(Auth::user()->role);
        $role_id = $this->user->getEdit($id)->role_id;
        $role = new Role();
        //dd($role->getRoleById($role_id));
        if ($role->getRoleById($role_id)->role == 'Admin') {
            return redirect()->route('admin.user.index')->with('error', 'Can\'t delete Admin');
        }
        $result = $this->user->deleteUser($id);
        if ($result) {
            return redirect()->route('admin.user.index')->with('msg', 'Deleted successfully');
        }
        return redirect()->route('admin.user.index');
    }


}
