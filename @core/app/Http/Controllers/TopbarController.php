<?php

namespace App\Http\Controllers;

use App\Helpers\FlashMsg;
use App\Language;
use App\SocialIcon;
use App\TopbarInfo;
use Illuminate\Http\Request;

class TopbarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:appearance-topbar-settings',['only' => ['index','new_support_info','update_support_info',
            'delete_support_info','bulk_action','new_social_item','update_social_item','delete_social_item']]);
    }
    public function index(){
        $all_social_icons = SocialIcon::all();
        $all_topbar_infos = TopbarInfo::all();

        return view('backend.pages.topbar-settings')->with([
            'all_topbar_infos' => $all_topbar_infos,
            'all_social_icons' => $all_social_icons,
        ]);
    }
    public function new_support_info(Request $request){
        $this->validate($request,[
           'title' => 'required|string',
           'url' => 'required|string',
        ]);
        $topbar = new TopbarInfo();
        $topbar->icon = $request->icon;
        $topbar->title = $request->title;
        $topbar->url = $request->url;
        $topbar->save();

        return redirect()->back()->with(FlashMsg::item_new());
    }

    public function update_support_info(Request $request){
        $this->validate($request,[
            'title' => 'required|string|max:191',
            'url' => 'required|string|max:191'
        ]);

        TopbarInfo::find($request->id)->update([
            'icon' => $request->icon,
            'title' => $request->title,
            'url' => $request->url,
        ]);
        return redirect()->back()->with([
            'msg' => __('Support Info Item Updated..'),
            'type' => 'success'
        ]);
    }
    public function delete_support_info(Request $request,$id){
        TopbarInfo::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_delete());
    }
    public function bulk_action(Request $request){
        $all = TopbarInfo::find($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }

    public function new_social_item(Request $request){
        $this->validate($request,[
            'icon' => 'required|string',
            'url' => 'required|string',
        ]);

        SocialIcon::create($request->all());

        return redirect()->back()->with([
            'msg' => 'New Social Item Added...',
            'type' => 'success'
        ]);
    }
    public function update_social_item(Request $request){
        $this->validate($request,[
            'icon' => 'required|string',
            'url' => 'required|string',
        ]);

        SocialIcon::find($request->id)->update([
            'icon' => $request->icon,
            'url' => $request->url,
        ]);

        return redirect()->back()->with([
            'msg' => 'Social Item Updated...',
            'type' => 'success'
        ]);
    }
    public function delete_social_item(Request $request,$id){
        SocialIcon::find($id)->delete();
        return redirect()->back()->with([
            'msg' => 'Social Item Deleted...',
            'type' => 'danger'
        ]);
    }
}
