<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use App\Models\Post;

class PostController extends Controller
{
    public function index() 
    {
        $headers = [ 'Content-Type' => 'application/json; charset=utf-8' ];
        $posts = DB::table('posts')->get();

        return view('view-posts', compact('posts'));
        // return response()->json($posts, 200, $headers, JSON_UNESCAPED_UNICODE);
    }

    public function addToFav(Request $request, $id)
    {      
        $post = Post::where('id', $id)->get();
        $post = json_encode($post, JSON_UNESCAPED_UNICODE);

        $cookiestring = Cookie::get('fav_list');

        if ((mb_stripos($cookiestring, $post)) === false) 
        {
            $cookie = $request->cookie('fav_list');
            $cookie .= $post;

            Cookie::queue('fav_list', $cookie);
        }

        return response()->redirectTo('/view-posts');
    }

    public function removeFromFav($id) 
    {
        $post = Post::where('id', $id)->get();
        $post = json_encode($post, JSON_UNESCAPED_UNICODE);

        $cookiestring = Cookie::get('fav_list');

        if ((mb_stripos($cookiestring, $post)) !== false) 
        {
            $cookiestring = str_replace($post, '', $cookiestring);
            Cookie::queue('fav_list', $cookiestring);
        }

        return response()->redirectTo('/view-posts');
    }

    public function addToCompare(Request $request, $id)
    {      
        $post = Post::where('id', $id)->get();
        $post = json_encode($post, JSON_UNESCAPED_UNICODE);

        $cookiestring = Cookie::get('compare_list');

        if ((mb_stripos($cookiestring, $post)) === false) 
        {
            $cookie = $request->cookie('compare_list');
            $cookie .= $post;

            Cookie::queue('compare_list', $cookie);
        }

        return response()->redirectTo('/view-posts');
    }

    public function removeFromCompare($id) 
    {
        $post = Post::where('id', $id)->get();
        $post = json_encode($post, JSON_UNESCAPED_UNICODE);

        $cookiestring = Cookie::get('compare_list');

        if ((mb_stripos($cookiestring, $post)) !== false) 
        {
            $cookiestring = str_replace($post, '', $cookiestring);
            Cookie::queue('compare_list', $cookiestring);
        }

        return response()->redirectTo('/view-posts');
    }

    public function compareList(Request $request)
    {
        return response()->view('compare');
    }
}
