<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Nette\Utils\Validators;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //direct category list page
    public function list() {

        $categories = Category::when(request('key'), function($query) {
                $key = request('key');
                $query->where('name', 'like', "%$key%");
            })
            ->orderBy('id', 'desc')
            ->paginate(5);

        $categories->appends(request()->all());

            return view('admin.category.list', compact('categories'));

        }

    // direct category create
    public function createPage() {
        return view('admin.category.create');
    }

    // create category
    public function create(Request $request) {
        $this->categoryValidationCheck($request);
        $data = $this->requestCategoryData($request);
        Category::create($data);
        return redirect()->route('category#list')->with(['createSuccess'=>'Category Created...']);
    }

    // delete category
    public function delete($id) {
        Category::where('id',$id)->delete();
        return back()->with(['deleteSuccess'=>'Category Deleted...']);
    }

    // edit category
    public function edit($id) {
        $category = Category::where('id', $id)->first();
        return view('admin.category.edit', compact('category'));
    }

    // update category
    public function update(Request $request) {
        $this->categoryValidationCheck($request);
        $data = $this->requestCategoryData($request);
        $id = $request->categoryId;
        Category::where('id', $id)->update($data);

        return redirect()->route('category#list');
    }

    // Private Function
    // Category Validation
    private function categoryValidationCheck($request) {
        Validator::make($request->all(),[
            'categoryName' => "required|unique:categories,name, $request->categoryId"
        ])->validate();
    }

    // Category Request Data
    private function requestCategoryData($request) {
        return [
            'name' => $request->categoryName
        ];
    }
}
