<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
class ExtraController extends Controller
{
   public function Hindi(){
        Session::get('lang');
        Session()->forget('lang');
        Session()->put('lang', 'hindi');
        return redirect()->back();
   }

   public function English(){
    Session::get('lang');
    Session()->forget('lang');
    Session()->put('lang', 'english');
    return redirect()->back(); 
}
   public function SinglePost($id){
     $post = DB::table('post')
             ->join('categories','post.category_id','categories.id')
             ->join('subcategories','post.subcategory_id','subcategories.id')
             ->join('users','post.user_id','users.id')
             ->select('post.*','categories.category_en','categories.category_hin','subcategories.subcategory_en','subcategories.subcategory_hin','users.name')
             ->first();
             return view('main.single_post',compact('post'));
 
  }
  public function CatPost($id, $category_en){
    $catposts = DB::table('post')->where('category_id',$id)->orderBy('id','desc')->paginate(5);
    return view('main.allpost',compact('catposts'));

  }
  public function SubCatPost($id, $subcategory_en){
    $subcatposts = DB::table('post')->where('subcategory_id',$id)->orderBy('id','desc')->paginate(5);
    return view('main.subpost',compact('subcatposts'));

  }

  public function GetSubDist($district_id){
    $sub = DB::table('subdistricts')->where('district_id',$district_id)->get();
    return response()->json($sub);
}
public function SearchDistrict(Request $request){
  $distid = $request->district_id;
  $subdistid = $request->subdistrict_id;

$catposts = DB::table('post')->where('district_id',$distid)->where('subdistrict_id',$subdistid)->orderBy('id','desc')->paginate(5);
    return view('main.allpost',compact('catposts'));

  }
}
