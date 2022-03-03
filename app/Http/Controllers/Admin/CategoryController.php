<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //__index method__//
    public function index()
    {
        //__query builder__
         //$category=DB::table('categories')->get();

        //__eleoquent__//
          $category=Category::all();
         return view('admin.category.index',compact('category'));




    }

    //__create method__//
    public function create()
    {
        return view('admin.category.create');
    }

    //__store method__//
    public function store(Request $request)
    {
        //dd($request->all());
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);

        $category=new Category;
        $category->category_name=$request->category_name;
        $category->category_slug=Str::of($request->category_name)->slug('-');
        $category->save();

        // Category::insert([
        //     'category_name' => $request->category_name,
        //     'category_slug' => Str::of($request->category_name)->slug('-'),
        // ]);

        $notification=array('messege' => 'Category Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }

    //__edit method__//
    public function edit($id)
    {
        //$data=DB::table('categories')->where('id',$id)->first();
       // $data=Category::where('id',$id)->first();
        $data=Category::find($id);
        return view('admin.category.edit',compact('data'));
    }

    //__data update__//
    public function update(Request $request,$id)
    {
        $category=Category::find($id); //get the record
        // $category->update([
        //     'category_name' => $request->category_name,
        //     'category_slug' => Str::of($request->category_name)->slug('-'),
        // ]);
        
        $category->category_name =$request->category_name;
        $category->category_slug =Str::of($request->category_name)->slug('-');
        $category->save();

       $notification=array('messege' => 'Category Updated!', 'alert-type' => 'success');
        return redirect()->route('category.index')->with($notification);
    }

    //__category delete method__//
    public function destroy($id)
    {

       // DB::table('categories')->where('id',$id)->delete();

        // $category=Category::find($id);
        // $category->delete();
        
        Category::destroy($id);
        $notification=array('messege' => 'Category Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }




}
