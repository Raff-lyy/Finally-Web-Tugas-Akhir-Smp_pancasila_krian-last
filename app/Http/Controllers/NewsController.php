<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;


use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('dashboard.news.index', compact('news'));
    }

    public function create()
    {
        return view('dashboard.news.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'title'   => 'required|string|max:255',
        'content' => 'required',
        'image'   => 'nullable|image|max:5120',
    ]);

    $slug = Str::slug($validated['title']);
    $originalSlug = $slug;
    $counter = 1;

    // cek slug agar unik
    while (News::where('slug', $slug)->exists()) {
        $slug = $originalSlug . '-' . $counter++;
    }

    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('news', 'public');
    }

    News::create([
        'title'   => $validated['title'],
        'slug'    => $slug,
        'content' => $validated['content'],
        'image'   => $validated['image'] ?? null,
    ]);

    return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan');
}

public function update(Request $request, News $berita)
{
    $validated = $request->validate([
        'title'   => 'required|string|max:255',
        'content' => 'required',
        'image'   => 'nullable|image|max:5120',
    ]);

    $slug = Str::slug($validated['title']);
    $originalSlug = $slug;
    $counter = 1;

    // cek slug unik (abaikan slug berita ini)
    while (News::where('slug', $slug)->where('id', '!=', $berita->id)->exists()) {
        $slug = $originalSlug . '-' . $counter++;
    }

    // handle upload gambar
    if ($request->hasFile('image')) {
        // hapus gambar lama kalau ada
        if ($berita->image) {
            Storage::disk('public')->delete($berita->image);
        }

        $validated['image'] = $request->file('image')->store('news', 'public');
    } else {
        $validated['image'] = $berita->image; // tetap pakai yang lama
    }

    $berita->update([
        'title'   => $validated['title'],
        'slug'    => $slug,
        'content' => $validated['content'],
        'image'   => $validated['image'],
    ]);

    return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui');
}



    public function destroy(News $berita)
    {
        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus');
    }

    // Public index → daftar berita
    public function publicIndex()
    {
        $news = News::latest()->paginate(6);
        return view('news.index', compact('news'));
    }

    // Public show → detail berita
    public function show($slug)
    {
        $berita = News::where('slug', $slug)->firstOrFail();
        return view("dashboard.news.show", compact('berita'));
    }
    public function edit(News $berita)
{
    return view('dashboard.news.edit', compact('berita'));
}

}
