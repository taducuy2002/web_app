<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index () {
      $users = User::all();
      return view('admin.users.index', compact('users'));
    }
    public function delete($id) {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->back();
    }

    // Nâng cấp tài khoản
    public function upgrade(Request $request, User $user)
{
    $request->validate([
        'account_level' => 'required|in:normal,vip,premium',
    ]);

    $user->account_level = $request->account_level;
    $user->save();

    return redirect()->back()->with('success', 'Nâng cấp tài khoản thành công!');
}
// Tăng cấp quyền
   public function upgradeAdmin(Request $request, User $user) {
      $request->validate([
      'is_admin'=>'required|in:0,1'
      ]);

      $user->is_admin = $request->is_admin;
      $user -> save();
       return redirect()->back()->with('success', 'Cập nhật thành công');
   }

}
