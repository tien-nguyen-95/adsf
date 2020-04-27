<?php

namespace App\Http\Controllers;

use App\News;
use App\Tag;
use Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\EditNewsRequest;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $list_news = News::all();
        return view('admin\news.index', compact('list_news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();

        return view('admin.news.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $news = new News;
        $news->title = request('title');
        $news->content = request('content');
        $news->user_created = Auth::user()->email;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name_image = $file->getClientOriginalName();
            $image = Str::random(5) . "_" . $name_image;
            while (file_exists("images/news/" . $image)) {
                 $image = Str::random(5) . "_" . $name_image;
            }
            $file->move("images/news/", $image);
            $news->image = $image;
        }

        $news->save();

        if(request('tag')) {
            $news->tags()->attach(request('tag'));
        }

        return redirect()->route('news.index')->with('success', 'Tạo mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.detail', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::all();
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditNewsRequest $request, $id)
    {
        $news = News::findOrFail($id);
        $news->title = request('title');
        $news->content = request('content');
        $news->user_updated = Auth::user()->email;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name_image = $file->getClientOriginalName();
            $image = Str::random(5) . "_" . $name_image;
            while (file_exists("images/news/" . $image)) {
                 $image = Str::random(5) . "_" . $name_image;
            }
            $file->move("images/news/", $image);
            if (!empty($news->image)) {
                unlink("images/news/" . $news->image);
            }
            $news->image = $image;
        }

        $news->save();

        if(request('tag')) {
            $news->tags()->attach(request('tag'));
        }

        return redirect()->route('news.index')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->tags()->detach();
        $news->delete();
        return redirect()->route('news.index')->with('success', "Xóa $news->name thành công");
    }
}
