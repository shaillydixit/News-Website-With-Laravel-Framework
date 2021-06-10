<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Image;
class PostController extends Controller
{
    public function Create(){

    	$category = DB::table('categories')->get();
    	$district = DB::table('districts')->get();
    	return view('backend.post.create',compact('category','district'));

    }
    public function StorePost(Request $request){

        $validatedData = $request->validate([
         'category_id' => 'required',
         'district_id' => 'required',
        ]);
 
 
        $data = array();
        $data['title_en'] = $request->title_en;
        $data['title_hin'] = $request->title_hin;
        $data['user_id'] = Auth::id();
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['district_id'] = $request->district_id;
        $data['subdistrict_id'] = $request->subdistrict_id;
        $data['tags_en'] = $request->tags_en;
        $data['tags_hin'] = $request->tags_hin;
        $data['details_en'] = $request->details_en;
        $data['details_hin'] = $request->details_hin;
        $data['headline'] = $request->headline;
        $data['first_section'] = $request->first_section;
        $data['first_section_thumbnail'] = $request->first_section_thumbnail;
        $data['bigthumbnail'] = $request->bigthumbnail;
        $data['post_date'] = date('d-m-Y');
        $data['post_month'] = date("F");
        $image = $request->image;
        if ($image) {
            $image_one = uniqid().'.'.$image->getClientOriginalExtension(); 
            Image::make($image)->resize(500,300)->save('image/postimg/'.$image_one);
            $data['image'] = 'image/postimg/'.$image_one;
            // image/postimg/343434.png
            DB::table('post')->insert($data);
 
                $notification = array(
              'message' => 'Post Inserted Successfully',
              'alert-type' => 'success'
          );
 
          return Redirect()->route('create.post')->with($notification);
            
        }    
 
   }  // END Method 
 


   public function GetSubCategory($category_id){
    $sub = DB::table('subcategories')->where('category_id',$category_id)->get();
    return response()->json($sub);
  
      }
  
  
    public function GetSubDistrict($district_id){
    $sub = DB::table('subdistricts')->where('district_id',$district_id)->get();
    return response()->json($sub);
  
      }
}
