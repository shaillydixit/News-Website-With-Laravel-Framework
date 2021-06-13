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

    public function LiveTvSetting(){
        $livetv = DB::table('livetvs')->first();
        return view('backend.setting.livetv', compact ('livetv'));
    }

    public function LiveTvUpdate(Request $request, $id){
        $data = array();
        $data['embed_code'] = $request->embed_code;
        
        DB::table('livetvs')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Live Tv settings updated successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('livetv.setting')->with($notification);
    }

    public function ActiveSetting(Request $request, $id){
        DB::table('livetvs')->where('id', $id)->update(['status' =>1]);
        $notification = array(
            'message' => 'Live Tv Activated successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function DeactiveSetting(Request $request, $id){
        DB::table('livetvs')->where('id', $id)->update(['status' =>0]);
        $notification = array(
            'message' => 'Live Tv Deactivated successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function NoticeSetting(){
        $notice = DB::table('notices')->first();
        return view('backend.setting.notice',compact('notice'));
    }

    public function NoticeUpdate(Request $request, $id){
        $data = array();
        $data['notice'] = $request->notice;
        
        DB::table('notices')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Notice settings updated successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('notice.setting')->with($notification);
    }

    public function ActiveNotice(Request $request, $id){
        DB::table('notices')->where('id', $id)->update(['status' =>1]);
        $notification = array(
            'message' => 'Notice Activated successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function DeactiveNotice(Request $request, $id){
        DB::table('notices')->where('id', $id)->update(['status' =>0]);
        $notification = array(
            'message' => 'Notice Deactivated successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function WebsiteSetting(){
        $website = DB::table('websites')->orderBy('id', 'desc')->paginate(5);
        return view ('backend.website.index', compact ('website'));
    }

    public function AddWebsiteSetting(){
        return view('backend.website.create');
    }

    public function StoreWebsite(Request $request){
        $data = array();
        $data['website_name'] = $request->website_name;
        $data['website_link'] = $request->website_link;
        DB::table('websites')->insert($data);

        $notification = array(
            'message' => 'website stroed successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('all.website')->with($notification);
    }

    public function EditWebsite($id){
        $website = DB::table('websites')->where('id', $id)->first();
        return view('backend.website.edit', compact('website'));
    }
    public function UpdateWebsite(Request $request, $id){
        $data = array();
        $data['website_name'] = $request->website_name;
        $data['website_link'] = $request->website_link;
        DB::table('websites')->where('id', $id)->update($data);
            $notification = array(
            'message' => 'Website Link Updated Successfully!',
            'alert-type' => 'success',
        );
        return Redirect()->route('all.website')->with($notification);
    }
    public function DeleteWebsite($id){
        DB::table('websites')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Website Link Deleted Successfully!',
            'alert-type' => 'error',
        );
        return Redirect()->route('all.website')->with($notification);
    }

}
