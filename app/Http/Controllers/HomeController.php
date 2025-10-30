<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil berita
        $featured = News::latest()->first();
        $news = News::latest()->skip(1)->take(6)->get();

        // Ambil guru & staff, group by jabatan
        $teachersByPosition = Teacher::all()->groupBy('jabatan');

        return view('welcome', compact('featured', 'news', 'teachersByPosition'));
    }

    public function showNews($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        return view('dashboard.news.show', compact('news'));
    }
}
