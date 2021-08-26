<?php
namespace App\Http\Controllers\admin;
use App\Models\Category;
use App\Models\Posts;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Models\User;

class PostsController extends Controller
{
    public function index(){
        $posts = Posts::paginate(5);

        return view('admin.posts.index')->with('posts',$posts);
        //or return view('admin.posts.index')->with('posts', $posts);
    }
    public function create(){
        $users = User::pluck('name','id');
        $categories = Category::pluck('title','id');
        return view('admin.posts.create')->with('users',$users)->with('categories',$categories);
    }
    public function store(PostRequest $request){

        $post = Posts::create($request->all());
        $category_ids = $request->input('category_id');
        $post->categories()->attach($category_ids);

        return redirect(route('posts.index'))->with('success','Post created successfully');
    }
    public function edit(Posts $post){
       // dd($post);
        $users = User::pluck('name','id');
        $categories = Category::pluck('title','id');
        $selectedCategories = $post->categories->pluck('id');
        return view('admin.posts.edit')->with('post',$post)->with('users', $users)->with('categories',$categories)->with('selectedCategories',$selectedCategories);
    }
    public function update(PostRequest $request, Posts $post){
       // $input = [
        //    'title'=> $request->title,
        //    'excerpt'=>$request->excerpt,
       //    'content'=>$request->content
       // ];
       // $post->update($input);
        $category_ids = $request->input('category_id');
        $post->update($request->all());
        $post->categories()->sync($category_ids);

        return redirect(route('posts.index'))->with('success','Post updated successfully');

    }

    public function destroy(Posts $post){
        $post->delete();
        return redirect(route('posts.index'))->with('success','Post deleted successfully');

    }

}
