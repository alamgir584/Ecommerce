<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function seo()
    {
          $data = DB::table('seos')->first();
           return view('admin.setting.seo', compact('data'));
    }
    //update seo method
    public function seoUpdate(Request $request,$id)
    {
        $data=array();
        $data['meta_title']=$request->meta_title;
        $data['meta_author']=$request->meta_author;
        $data['meta_tag']=$request->meta_tag;
        $data['meta_keyword']=$request->meta_keyword;
        $data['meta_description']=$request->meta_description;
        $data['google_verification']=$request->google_verification;
        $data['alexa_verification']=$request->alexa_verification;
        $data['google_analytics']=$request->google_analytics;
        $data['google_adsense']=$request->google_adsense;
        DB::table('seos')->where('id',$id)->update($data);
        $notification=array('messege' => 'SEO Setting Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }
            //smtp setting page
            public function smtp()
            {
                 $smtp=DB::table('smtp')->first();
                return view('admin.setting.smtp',compact('smtp'));
            }
    
            //smtp update
            public function smtpUpdate(Request $request, $id){
                $data=array();
                $data['mailer']=$request->mailer;
                $data['host']=$request->host;
                $data['port']=$request->port;
                $data['user_name']=$request->user_name;
                $data['password']=$request->password;
                DB::table('smtp')->where('id',$id)->update($data);
                $notification=array('messege' => 'SMTP Setting Updated!', 'alert-type' => 'success');
                return redirect()->back()->with($notification);
            }
}
