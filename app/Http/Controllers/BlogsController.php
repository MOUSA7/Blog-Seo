<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class BlogsController extends Controller
{

    public function __construct()
    {
        $this->middleware('author',['only'=>'trash']);
//        $this->middleware('admin',['only'=>'destroy','restore','trash']);
    }

    public function index(){
        $blogs = Blog::where('status',1)->latest()->get();
//        $blogs = Blog::latest()->get();
        return view('blogs.index',compact('blogs'));
    }

    public function create(){
        $categories = Category::latest()->get();
        return view('blogs.create',compact('categories'));
    }

    public function store(Request $request){

        $input = $request->all();

        $role = [
            'title'=>['required' ,'max:70'],
            'body'=>['required' ,'max:120']
        ];
        $this->validate($request,$role);
        if ($file = $request->file('image')){
            $name = uniqid().$file->getClientOriginalName();
            $name = strtolower(str_replace(' ','-',$name));
            $file->move('images/blog',$name);
            $input['image'] = $name;
        }


        $input['slug'] = Str::slug($request->title);
        $input['meta_data'] = Str::limit($request->title,20);
        $input['description'] = Str::limit($request->body,30);

        $blogByUser  = $request->user()->blogs()->create($input);

        if ($request->category_id){

            $blogByUser->category()->sync($request->category_id);
        }
        Session::flash('CreateBlog','Congratulation on Creating Blog');
        return redirect('blog');
    }

    public function show($slug){
//        $blog = Blog::findOrFail($id);
        $blog = Blog::where('slug',$slug)->first();

        return view('blogs.show',compact('blog'));
    }
    public function edit($id){
        $categories = Category::get();
        $blog = Blog::findOrFail($id);

        $bc = array();
        foreach ($blog->category as $c){
            $bc = $c->id;
        }
        $filtered = Arr::except($categories ,$bc);
        return view('blogs.edit',
            ['blog'=>$blog,'categories'=>$categories,'filtered'=>$filtered]);
    }

    public function update(Request $request,$id){
        $input = $request->all();
        $blog = Blog::findOrFail($id);


        if ($file = $request->file('image')){
            if ($blog->image){
                unlink('images/blog/'.$blog->image);
            }
            $name = uniqid().$file->getClientOriginalName();
            $name = strtolower(str_replace(' ','-',$name));
            $file->move('images/blog',$name);
            $input['image'] = $name;
        }

        $blog->update($input);
        if ($request->category_id){

            $blog->category()->sync($request->category_id);
        }
        if ($request->status == 1 || 0){
            return back();
        }
        return redirect('blog');
    }

    public function delete($id){
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect('blog');
    }

    public function trash(){
        $trash = Blog::onlyTrashed()->get();

        return view('blogs.trash',compact('trash'));
    }
    public function restore($id)
    {
        $restore = Blog::onlyTrashed()->findOrFail($id);
        $restore->restore($restore);
        return redirect('/blog');
    }    //
}
