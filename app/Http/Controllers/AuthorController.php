<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
// フォームリクエストの読み込み
use App\Http\Requests\AuthorRequest;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    // データ一覧ページの表示
    public function index()
    {
    $user = Auth::user();
    $authors = Author::paginate(4);
    $param = ['authors' => $authors, 'user' =>$user];
    return view('index', $param);
    }

    // データ追加用ページの表示
    public function add()
    {
        return view('add');
    }

    // 追加機能
    public function create(AuthorRequest $request)
    {
        $form = $request->all();
        Author::create($form);
        return redirect('/');
    }

    // 追加：ここから
    public function find()
    {
        return view('find', ['input' => '']);
    }

    public function search(Request $request)
    {
        $author = Author::where('name', $request->input)->first();
        $param = [
            'input' => $request->input,
            'author' => $author
        ];
        return view('find', $param);
    }
    // 追加：ここまで

    // データ編集ページの表示
    public function edit(Request $request)
    {
        $author = Author::find($request->id);
        return view('edit', ['form' => $author]);
    }

    // 更新機能
    public function update(AuthorRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Author::find($request->id)->update($form);
        return redirect('/');
    }

    // データ削除用ページの表示
    public function delete(Request $request)
    {
        $author = Author::find($request->id);
        return view('delete', ['author' => $author]);
    }

    // 削除機能
    public function remove(Request $request)
    {
        Author::find($request->id)->delete();
        return redirect('/');
    }

    public function verror()
    {
        return view('verror');
    }

    // 追記：ここから

    public function bind(Author $author)
    {
        $data = [
            'author' => $author,
        ];
        return view('author.binds', $data);
    }
    // 追記：ここまで

    public function relate(Request $request)
    {
        $hasbooks = Author::has('book')->get();
        $nobooks = Author::doesntHave('book')->get();
        $param = ['hasbooks' => $hasbooks, 'nobooks' => $nobooks];
        return view('author.index', $param);
    }
    
    public function get()
    {
    $text = [
        'content' => '自由に入力してください',
    ];
    return view('middleware', $text);
    }

    public function post(Request $request)
    {
    $content = $request->content;
    $text = [
        'content' => $content . 'と入力しましたね'
    ];
    return view('middleware', $text);
    }
    public function check(Request $request)
    {
    $text = ['text' => 'ログインして下さい。'];
    return view('auth', $text);
    }

    public function checkUser(Request $request)
    {
    $email = $request->email;
    $password = $request->password;
    if (Auth::attempt(['email' => $email,
        'password' => $password])) {
        $text =   Auth::user()->name . 'さんがログインしました';
    } else {
        $text = 'ログインに失敗しました';
    }
    return view('auth', ['text' => $text]);
    }
}