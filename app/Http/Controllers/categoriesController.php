<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class categoriesController extends Controller
{
    public function create(Request $request){
        $category = new Category();

        $category->create([
            'name' => $request->name,
            'created_by' => auth()->user()->id,
        ]);

        return redirect('/admin');
    }

    public function del_category(Request $request){
        $category = new Category();

        $category = $category->find($request->id);
        $category->delete();

        return redirect('/admin');
    }
}
