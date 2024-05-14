<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//投稿されたページを表示するページ
use Illuminate\Support\Facades\DB;
//Postモデルを参照
use App\Models\Post;


class PostsController extends Controller
{
    //indexメソッド
    public function index()
    {
        //ユーザー情報を含めて投稿データを取得、created_atカラムを降順で並び替え
        $list = Post::with('user')->orderBy('created_at', 'desc')->get();
        //viewファイルindex.blade.phpの呼び出し
        return view('posts.index', ['lists' => $list]);
    }

    //crateFormメソッド
    public function createForm()
    {
        return view('posts.createForm');
    }

    //createメソッド
    public function create(Request $request)
    {
        $post = $request->input('newPost');
        $userId = auth()->user()->id; // 現在のログインユーザーのIDを取得

        DB::table('posts')->insert([
            'post' => $post,
            'user_id' => $userId, // ユーザーIDを投稿に関連付ける
        ]);
        return redirect('/index');
    }

    //updateFormメソッド
    public function updateForm($id)
    {
        $post = DB::table('posts')
            ->where('id', $id)
            ->first();
        return view('posts.updateForm', ['post' => $post]);
    }

    //updateメソッド
    public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        DB::table('posts')
            ->where('id', $id)
            ->update(
                ['post' => $up_post]
            );
        return redirect('/index');
    }

    //deleteメソッド
    public function delete($id)
    {
        DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('/index');
    }

    //ミドルウェア読み込みの記述
    public function __construct()
    {
        $this->middleware('auth');
    }

    //曖昧検索メソッド
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $results = Post::where('post', 'like', '%' . $keyword . '%')
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('posts.search-results', ['lists' => $results]);
    }
}
