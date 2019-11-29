<?php

namespace App\Http\Controllers;

use App\Models\BannerStatus;
use App\Models\Banner;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class BannerController extends Controller
{
    //banner functions
    public function index()
    {
        $banners = Banner::all();
        return view('Backend/banner/index',compact('banners'));
    }

    public function createbanner()
    {
        $statuss = BannerStatus::all();
        return view('Backend/banner/create',compact('statuss'));
    }

    public function savebanner(Request $request){
        $banner_img = $request->file('image');
        $name = time().$banner_img->getClientOriginalName();
        $resized = Image::make($banner_img);
        $resized->resize('1200','400')->save('uploads/banners/'.$name);

        $create = Banner::create([
            'image'=>$name,
            'status_id'=>$request->status_id
        ]);
        $created = $create->save();
        if($created){
            return redirect()->route('banner')->with('success','Banner added Successfully');
        }
    }


    public function updatebanner($id){
        $statuss = BannerStatus::all();
        $banner = Banner::find($id);
        return view('Backend/banner/edit',compact('banner','statuss'));
    }

    public function saveupdatedbanner(Request $request,$idd){
        $banner = Banner::findOrFail($idd);
        if($request->hasFile('image')){
            if($banner->image != null){
                unlink(public_path() . '/uploads/banners/' .$banner->image);
            }
            $images = $request->file('image');
            $name = time(). $images->getClientOriginalName();
            $resize = Image::make($images);
            $resize->resize('1200','400')->save('uploads/banners/'.$name);
            $banner->image = $name;
        }
        $banner->status_id = $request->status_id ? $request->status_id : $banner->status_id ;
        $updated = $banner->update();
        if($updated){
            return redirect()->route('banner')->with('success','Banner Updated successfully');
        }
    }

    public function dltbanner($id){
        $to_dlt = Banner::findOrFail($id);
        if($to_dlt != null){
            if($to_dlt->image != null){
                unlink(public_path().'/uploads/banners/'.$to_dlt->image);
            }
           $deleted = $to_dlt->delete();
            if($deleted){
                return redirect()->route('banner')->with('success','Banner removed successfully.');
            }
        }

    }

//banner status functions

    public function bannerstatusindex(Request $request)
    {
        $status = BannerStatus::orderBy('id', 'desc')->get();
        return view('Backend/banner/status/index', compact('status'));
    }

    public function bannerstatuscreate(Request $request)
    {
        return view('Backend/banner/status/create');
    }

    public function bannerstatuseditpage($id)
    {
        $status = BannerStatus::findOrFail($id);
        return view('Backend/banner/status/edit', compact('status'));
    }

    public function bannerstatussave(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);
        $create = BannerStatus::create([
            'title' => $request->title
        ]);
        $created = $create->save();
        if ($created) {
            return redirect()->route('bannerstatusindex')->with('success', 'New banner status added successfully');
        }
    }

    public function bannerstatusedit(Request $request, $idd)
    {
        $request->validate([
            'title' => 'required'
        ]);
        $to_edit = BannerStatus::findOrFail($idd);
        $to_edit->title = $request->title;
        $updated = $to_edit->update();
        if ($updated) {
            return redirect()->route('bannerstatusindex')->with('success', 'Status updated successfully');
        }
    }

    public function bannerstatusdelete($id)
    {
        $delete = BannerStatus::findOrFail($id);
        $deleted = $delete->delete();
        if ($deleted) {
            return redirect()->back()->with('success', 'status deleted successfully');
        }
    }
}
