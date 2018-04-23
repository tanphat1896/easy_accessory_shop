<?php

namespace App\Http\Controllers\Admin;

use App\TinTuc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news_s = TinTuc::all();
        return view('admin.content.news.index', compact('news_s'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = TinTuc::store($request->all());

        if (empty($news))
            return back()->with('errors', ['Không thể lưu bài viết, thử lại sau']);

        return redirect()->route('news.show', [$news->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = TinTuc::findOrFail($id);

        return view('admin.content.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = TinTuc::findOrFail($id);

        return view('admin.content.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $news = TinTuc::findOrFail($id);

        $success = TinTuc::updateNews($news, $request->all());

        if ($success)
            return back()->with('success', 'Cập nhật thành công');

        return back()->with('errors', ['Không thể cập nhật tin tức, thử lại sau']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $newsIds = $request->get('news-id');
        if (!is_array($newsIds))
            return back()->with('errors', ['Dữ liệu không hợp lệ']);

        TinTuc::destroy($newsIds);
        return back()->with('success', 'Xóa thành công');
    }
}
