<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    
    {
        $abouts = About::all();
        return view('dashboard.about.index', compact('abouts'));
    }

    public function edit(About $about)
    {
        return view('dashboard.about.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|array',
            'values' => 'nullable|array',
            'stats' => 'nullable|array',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $data = $request->only(['title', 'subtitle', 'visi']);

        // Misi, Values, Stats jadi JSON
        $data['misi'] = $request->misi ? json_encode($request->misi) : null;
        $data['values'] = $request->values ? json_encode($request->values) : null;
        $data['stats'] = $request->stats ? json_encode($request->stats) : null;

        // Upload image
        if ($request->hasFile('image')) {
            if ($about->image) {
                Storage::delete($about->image);
            }
            $data['image'] = $request->file('image')->store('public/about-images');
        }

        $about->update($data);

        return redirect()->route('dashboard.about.edit', $about)->with('success','About berhasil diperbarui!');
    }
}
