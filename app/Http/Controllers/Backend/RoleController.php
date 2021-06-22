<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class RoleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function InsertWriter(){
        return view('backend.role.insert');
    }

    public function StoreWriter(Request $request){
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['category'] = $request->category;
        $data['district'] = $request->district;
        $data['setting'] = $request->setting;
        $data['website'] = $request->website;
        $data['gallery'] = $request->gallery;
        $data['ads'] = $request->ads;
        $data['role'] = $request->role;
        $data['type'] = 0;

        // return response()->json($data);

        DB::table('users')->insert($data);

        $notification = array(
        'message' => 'Writer Inserted Successfully!',
        'alert-type' => 'success'
        );

        return Redirect()->route('add.writer')->with($notification);
        
    }

    public function AllWriter(){
        $writer = DB::table('users')->where('type', 0)->get();
        return view ('backend.role.index', compact('writer'));
    }

    public function EditWriter($id){
        $writer = DB::table('users')->where('id', $id)->first();
        return view('backend.role.edit', compact('writer'));
    }

    public function UpdateWriter(Request $request, $id){
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['category'] = $request->category;
        $data['district'] = $request->district;
        $data['setting'] = $request->setting;
        $data['website'] = $request->website;
        $data['gallery'] = $request->gallery;
        $data['ads'] = $request->ads;
        $data['role'] = $request->role;


        // return response()->json($data);

        DB::table('users')->where('id', $id)->update($data);

        $notification = array(
        'message' => 'Writer Update Successfully!',
        'alert-type' => 'info'
        );

        return Redirect()->route('all.writer')->with($notification);
        
    }

    public function DeleteWriter($id){
        DB::table('users')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Writer Deleted Successfully!',
            'alert-type' => 'info'
            );
    
            return Redirect()->route('all.writer')->with($notification);
            
        }

}
