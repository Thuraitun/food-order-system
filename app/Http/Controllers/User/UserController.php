<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // user home page
    public function home() {
        $products = Product::orderBy('created_at', 'desc')->get();
        $categories = Category::get();
        return view('user.main.home', compact('products', 'categories'));
    }

    // user account detail
    public function detail() {
        return view('user.account.accountInfo');
    }

    // Change Password
    public function changePasswordPage() {
        return view('user.account.change');
    }

    // Update Password
    public function changePassword(Request $request) {

        $this->passwordValidationCheck($request);

        $user = User::select('password')->where('id',Auth::user()->id)->first();
        $dbPassword = $user->password;

        if(Hash::check($request->oldPassword, $dbPassword)) {
            $changePassword = [
                'password' => Hash::make($request->newPassword)
            ];
            User::where('id', Auth::user()->id)->update($changePassword);

            // Auth::logout();
            return redirect()->route('user#home');

        }

        return back()->with(['noMatch'=>'This old password is no match. Try again!!']);

    }

    // product filter
    public function filter($categoryId) {
        $products = Product::where('category_id', $categoryId)->orderBy('created_at', 'desc')->get();
        $categories = Category::get();
        return view('user.main.home', compact('products', 'categories'));
    }

    // prouduct detail
    public function details($productId){
        $product = Product::where('id', $productId)->first();

        return view('user.main.detail',compact('product', ));
    }


    // password validation private function
    private function passwordValidationCheck($request) {
        Validator::make($request->all(),[
            'oldPassword' => 'required|min:6',
            'newPassword' => 'required|min:6',
            'confirmPassword' => 'required|min:6|same:newPassword'
        ])->validate();
    }
}
