<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use DB;
use Illuminate\Support\Str;
class SubcategoryController extends Controller
{

    //__subcategory get__//
    public function index()
    {
        // $data=DB::table('subcategories')->leftjoin('categories','subcategories.category_id','categories.id')->select('categories.category_name','subcategories.*')->get();
        $data=Subcategory::all();
        return view('admin.subcategory.index',compact('data'));
    }

    //__create method__//
    public function create()
    {
        $categories=Category::all();  //DB::table('categories')->get();
        return view('admin.subcategory.create',compact('categories'));
    }

    //__subcategory store__//
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required|unique:subcategories|max:255',
        ]);

        $subcategory=new Subcategory;
        $subcategory->category_id=$request->category_id;
        $subcategory->subcategory_name=$request->subcategory_name;
        $subcategory->subcategory_slug=Str::of($request->subcategory_name)->slug('-');
        $subcategory->save();

        $notification=array('messege' => 'Sub Category Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //__delete subcateory__//
    public function destroy($id)
    {
        Subcategory::destroy($id);
        $notification=array('messege' => 'Subcategory Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //__edit__//
    public function edit($id)
    {
        $categories=Category::all();
        $data=Subcategory::find($id);
        return view('admin.subcategory.edit',compact('categories','data'));
    }

    //__subcategory update__//
    public function update(Request $request,$id)
    {
        $subcategory=Subcategory::find($id); //get the record
      
        $subcategory->category_id =$request->category_id;
        $subcategory->subcategory_name =$request->subcategory_name;
        $subcategory->subcategory_slug =Str::of($request->subcategory_name)->slug('-');
        $subcategory->save();

        $notification=array('messege' => 'Sub Category Updated!', 'alert-type' => 'success');
        return redirect()->route('subcategory.index')->with($notification);
    }


}
