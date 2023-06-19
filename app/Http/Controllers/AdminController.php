<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // direct change password
    public function passwordChange() {

        return view('admin.account.changePassword');

    }

    // direct update password
    public function passwordUpdate(Request $request) {

        $this->passwordValidationCheck($request);
        $user = User::select('password')->where('id',Auth::user()->id)->first();
        $dbPassword = $user->password;

        if(Hash::check($request->oldPassword, $dbPassword)) {
            $changePassword = [
                'password' => Hash::make($request->newPassword)
            ];
            User::where('id', Auth::user()->id)->update($changePassword);

            // Auth::logout();
            return redirect()->route('category#list');

        }

        return back()->with(['noMatch'=>'This old password is no match. Try again!!']);

    }


     // Direct Account Info
    public function accountDetail() {
        return view('admin.account.accountInfo');
    }

    // Direct Account Edit
    public function accountEdit() {
        return view('admin.account.accountEdit');
    }

    // Direct Account Update
    public function accountUpdate($id, Request $request) {

        $this->accountValidationCheck($request);
        $data = $this->getUserData($request);

        // Image Store
        if($request->hasFile('image')) {
            $dbImage = User::where('id', $id)->first();
            $dbImage = $dbImage->image;


            // Delete Image
            if( $dbImage != null) {
                Storage::delete("public/$dbImage");
            }

            // Update Image Store
            $fileName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $fileName);
            $data['image'] = $fileName;
        }

        User::where('id', $id)->update($data);

        return redirect()->route('account#detail')->with(['updateSuccess' => 'Admin Account Updated....']);

    }

    // Admin List
    public function adminList() {
        $adminAccounts = User::when(request('key'), function($query) {
                        $key = request('key');
                        $query->orWhere('name', 'like', "%$key%")
                              ->orWhere('email', 'like', "%$key%");
                    })
                    ->where('role', 'admin')->paginate(3);
        $adminAccounts->append(request()->all());
        return view('admin.account.accountList', compact('adminAccounts'));
    }

    // Admin account detail
    public function adminDetail($id) {
        $account = User::where('id', $id)->first();
        return view('admin.account.accountDetail',compact('account'));
    }

    // Admin Change Role
    public function changeRole($id) {
        $account = User::where('id', $id)->first();
        return view('admin.account.changeRole', compact('account'));
    }

    // Admin to User Change Role Update
    public function roleUpdate($id, Request $request) {
        $data = $this->requestUserData($request);
        User::where('id', $id)->update($data);
        return redirect()->route('admin#list')->with(['changeRole' => 'User Account Changed !']);
    }



    // Admin account delete
    public function adminDelete($id) {
        User::where('id', $id)->delete();
        return redirect()->route('admin#list')->with(['deleteSuccess' => 'Admin account deleted ..']);
    }


    // password validation private function
    private function passwordValidationCheck($request) {
        Validator::make($request->all(),[
            'oldPassword' => 'required|min:6',
            'newPassword' => 'required|min:6',
            'confirmPassword' => 'required|min:6|same:newPassword'
        ])->validate();
    }

    // get user account user data private function
    private function getUserData($request) {
        return [
            'name' => $request->name,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ];
    }

    // account validation private function
    private function accountValidationCheck($request) {
        Validator::make($request->all(), [
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'image' => 'mimes:png,jpg,jpeg|file',
            'phone' => 'required',
            'address' => 'required',
        ])->validate();
    }

    // Change Role Private Function
    private function requestUserData($request) {
        return [
            'role' => $request->role
        ];
    }
}
