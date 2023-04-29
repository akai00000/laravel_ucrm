<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\InertiaTest;

class InertiaTestController extends Controller
{
    public function index()
    {
        // []は連想配列、変数を渡すことができる。
        return Inertia::render('Inertia/Index', [
            // テーブルデータの一括取得（bladeと大体同じ？）
            'blogs' => InertiaTest::all()
        ]);
    }

    public function show($id)
    {
        // dd($id);
        return Inertia::render('Inertia/Show', [
            'id' => $id,
            // ↓idが一致するテーブルデータを取得する。
            'blog' => InertiaTest::findOrFail($id)
        ]);
    }

    public function create()
    {
        return Inertia::render('Inertia/Create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => ['required'],
            'content' => ['required'],
        ]);
        // modelのInertiaTestのインスタンス化
        $inertiaTest = new InertiaTest;
        $inertiaTest->title = $request->title;
        $inertiaTest->content = $request->content;
        $inertiaTest->save();

        return to_route('inertia.index')->with([
            'message' => '送信完了'
        ]); //to_routeはlaravel^9から
        // withはフラッシュメッセージ用で記述している。
    }
    
    public function destroy($id) //ここでは引数はひとつ（idのみ）であるから、requestはつかっていない。
    {
        $blog = InertiaTest::FindOrFail($id);
        $blog->delete();
        return to_route('inertia.index')->with([
            'message' => " $blog->title を消去しました。"
        ]);
    }


}
