<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;
use App\Post;
class PostsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show($slug){
    //     $posts = ['primero'=>"Hola mundo perrito",
    // 'segundo'=>'Hola mundo perrito segundo'];
    // $post = DB::table('posts')->where('slug',$slug)->first();
    // $post = Post::where('slug',$slug)->firstOrfail();
//    if (! $post) {
//        # code...
//        abort(404);
//    }

    return view('post',['post'=> Post::where('slug',$slug)->firstOrfail()]);
    }
}
