<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Index(){
        $category = DB::table('categories')->orderBy('id','desc')->paginate(3);
        return view('backend.category.index');
    }
}
