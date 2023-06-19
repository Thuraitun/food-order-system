<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    // product list
    public function productList() {
        $products = Product::when(request('key'), function($query) {
                    $key = request('key');
                    $query->where('name', 'like', "%$key%");
                })
                ->orderBy('created_at', 'desc')
                ->paginate(3);

        $products->appends(request()->all());

        return view('admin.product.list',compact('products'));
    }

    //create product Page
    public function productCreate() {
        $categories = Category::get();
        return view('admin.product.create', compact('categories'));
    }

    // create product
    public function create(Request $request) {
        $this->productValidationCheck($request, 'create');
        $data = $this->getProductData($request);

        $fileName = uniqid(). $request->file('productImage')->getClientOriginalName();
        $request->file('productImage')->storeAs('public',$fileName);
        $data['image'] = $fileName;
        Product::create($data);

        return redirect()->route('product#list')->with(['createSuccess'=>'Product Created...']);
    }

    // delete product
    public function delete($id) {
        Product::where('id',$id)->delete();
        return redirect()->route('product#list')->with(['deleteSuccess'=>'Product Deleted...']);
    }

    // detail product
    public function detail($id) {
        $product = Product::where('id',$id)->first();
        return view('admin.product.detail', compact('product'));
    }

    // edit product
    public function edit($id) {
        $categories = Category::get();
        $product = Product::where('id',$id)->first();
        return view('admin.product/edit', compact('product','categories'));
    }

    // Direct update product
    public function update( Request $request) {
        $this->productValidationCheck($request, 'update');
        $data = $this->getProductData($request);

        // image upload request
        if($request->hasFile('productImage')) {
            $dbImage = Product::where('id', $request->productId)->first();
            $dbImage = $dbImage->image;

            // image delete
            if($dbImage != null) {
                Storage::delete("public/$dbImage");
            }

            $fileName = uniqid(). $request->file('productImage')->getClientOriginalName();
            $request->file('productImage')->storeAs('public', $fileName);
            $data['image'] = $fileName;

        }
        Product::where('id',$request->productId)->update($data);

        return redirect()->route('product#list');
    }


    // create productValidationCheck private function
    private function productValidationCheck($request, $action) {
        $validationRule  = [
            'productName' => 'required|min:5|unique:products,name,'. $request->productId,
            'productDescription' => 'required|min:10',
            'productWaitingTime' => 'required',
            'productPrice' => 'required',
        ];

        $validationRule['productImage'] = $action == 'create' ? 'required|mimes:png,jpg,webp,jpeg|file' : 'mimes:png,jpg,webp,jpeg|file';

        Validator::make($request->all(), $validationRule)->validate();
    }

    // create getProductData private function
    private function getProductData($request) {
        return [
            'category_id' => $request->category,
            'name' => $request->productName,
            'description' => $request->productDescription,
            'waiting_time' => $request->productWaitingTime,
            'price' => $request->productPrice,
        ];
    }
}
