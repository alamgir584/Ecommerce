<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use Illuminate\Support\Str;
use Image;
use File;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //$data=DB::table('categories')->get();//query builder
        $data=Category::all(); //elequent ORM
        return view ('admin.category.category.index',compact('data'));

    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:55',
            'icon' => 'required',
        ]);
        $slug=Str::slug($request->category_name, '-');


        $photo=$request->icon;
        $photoname=uniqid().'.'.$photo->getClientOriginalName();
        Image::make($photo)->resize(32,32)->save('files/category/'.$photoname);
        $data['icon']='public/files/category/'.$photoname;

        Category::insert([
            'category_name'=>$request->category_name,
            'category_slug'=>Str::slug($request->category_name, '-'),
            'home_page'=>$request->home_page,
            'icon'=>$photoname,
        ]);
        $notification=array('messege' =>'Category Inserted' ,'alert-type'=>'success' );
        return redirect()->back()->with($notification);
    }
    public function delete($id)
    // {

    //     Category::destroy($id);
    //     $notification=array('messege' =>'Category Deleted!' ,'alert-type'=>'success' );
    //     return redirect()->back()->with($notification);
    // }

    {
    	$data=DB::table('categories')->where('id',$id)->first();
    	$image='files/category/'.$data->icon;

    	if (File::exists($image)) {
    		 unlink($image);
    	}
    	DB::table('categories')->where('id',$id)->delete();
    	$notification=array('messege' => 'Category Deleted!', 'alert-type' => 'success');
    	return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $data=Category::findorfail($id);
        return response()->json($data);
    }
    public function update(Request $request)
    {
        
        $data=array();
    	$data['category_name']=$request->category_name;
    	$data['category_slug']=Str::slug($request->category_name, '-');
    	if ($request->icon)
        {
    		  if (File::exists("files/category/".$request->old_icon))
              {
    		    unlink("files/category/".$request->old_icon);
    	      }
    		  $photo=$request->icon;
              $photoname = uniqid()."-".$request->file('icon')->getClientOriginalName();
    	      Image::make($photo)->resize(32,32)->save('files/category/'.$photoname);
    	      $data['icon']=$photoname;
    	      DB::table('categories')->where('id',$request->id)->update($data);
    	      $notification=array('messege' => 'Category Update!', 'alert-type' => 'success');
    	      return redirect()->back()->with($notification);
    	}else{
		  $data['icon']=$request->old_icon;
	      DB::table('categories')->where('id',$request->id)->update($data);
	      $notification=array('messege' => 'Category Update!', 'alert-type' => 'success');
	      return redirect()->back()->with($notification);
    	}
    }

        //get sub category mane product add korle category select korle oi categoryr sub category asbe
        // public function GetSubCategory($id)  //category_id
        // {
        //     $data=DB::table('subcategories')->where('category_id',$id)->get();
        //     return response()->json($data);
        // }
        // public function GetChildCategory($id)
        // {
        //     $data=DB::table('childcategories')->where('subcategory_id',$id)->get();
        //     return response()->json($data);
        // }
}
