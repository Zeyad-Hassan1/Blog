<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;



class postsController extends Controller
{
    public function create(Request $request){
        $post = new Post();

        $image = $request->file('image');
        $filename = $image->getClientOriginalName();

        $image->move('images',$filename);

        $post->create([
            'image'      => $filename,
            'title'      => $request->title,
            'content'    => $request->content,
            'category'   => $request->category,
            'created_by' => auth()->user()->id,
        ]);

        return redirect('/admin/posts');
    }

    public function del_post(Request $request){
        $post = new Post();

        $post = $post->find($request->id);
        $post->delete();

        return redirect('/admin/posts');
    }
}
