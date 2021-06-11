<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class SettingController extends Controller
{
    public function SocialSetting(){
        $social = DB::table('socials')->first();
        return view('backend.setting.social',compact('social'));
    }

    public function SocialUpdate(Request $request, $id){
        $data = array();
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['youtube'] = $request->youtube;
        $data['linkedin'] = $request->linkedin;
        $data['instagram'] = $request->instagram;

        DB::table('socials')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'social media inserted successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('social.setting')->with($notification);
    }

    public function SeoSetting(){
        $seo = DB::table('seos')->first();
        return view('backend.setting.seo',compact('seo'));
    }

    public function SeoUpdate(Request $request, $id){
        $data = array();
        $data['meta_author'] = $request->meta_author;
        $data['meta_title'] = $request->meta_title;
        $data['meta_keyword'] = $request->meta_keyword;
        $data['meta_description'] = $request->meta_description;
        $data['google_analytics'] = $request->google_analytics;
        $data['google_verfication'] = $request->google_verfication;
        $data['alexa_analytics'] = $request->alexa_analytics;

        DB::table('seos')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'social media inserted successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('seo.setting')->with($notification);
    }
}
