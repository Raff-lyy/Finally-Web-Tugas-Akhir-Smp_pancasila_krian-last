<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class PublicBeritaController extends Controller
{
    // Halaman daftar berita publik
    public function index()
    {
        $news = News::latest()->paginate(6);
        return view('news.index', compact('news'));
    }

    // Halaman detail berita publik
    public function show($slug)
    {
        $berita = News::where('slug', $slug)->firstOrFail();
        return view('news.show', compact('berita'));
    }
}
