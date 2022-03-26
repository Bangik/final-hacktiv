<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::where('category_id', null)->get();
        return view('admin.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'category_id' => 'required|integer',
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->category_id = $request->category_id;
        $category->save();

        toastr()->success('Data berhasil ditambahkan');
        return redirect()->route('admin.categories.index');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        if ($request->parent == "0" || $request->parent == 0) {
            $category->category_id = null;
        } else {
            $category->category_id = $request->parent;
        }
        $category->save();

        toastr()->success('Data berhasil diubah');
        return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        toastr()->success('Data berhasil dihapus');
        return redirect()->route('admin.categories.index');
    }
}
