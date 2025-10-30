<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function index()
    {
        $heroes = Hero::all();
        return view('dashboard.hero.index', compact('heroes'));
    }

    public function edit(Hero $hero)
    {
        return view('dashboard.hero.edit', compact('hero'));
    }

    public function update(Request $request, Hero $hero)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
            'button_1_text' => 'nullable|string|max:50',
            'button_2_text' => 'nullable|string|max:50',
            'background_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:9000',
            'stats.students' => 'nullable|integer',
            'stats.teachers' => 'nullable|integer',
            'stats.programs' => 'nullable|integer',
            'stats.years' => 'nullable|integer',
        ]);

        $data = $request->only([
            'title','subtitle','button_1_text','button_2_text'
        ]);

        $data['stats'] = $request->input('stats', []);

        // Handle background image
        if ($request->hasFile('background_image')) {
            // Hapus file lama jika ada
            if ($hero->background_image) {
                Storage::delete('public/'.$hero->background_image);
            }

            // Simpan file baru di storage/app/public/hero-images
            $path = $request->file('background_image')->store('hero-images', 'public');

            // Simpan nama file relatif ke database
            $data['background_image'] = $path; // misal: hero-images/nama-file.jpg
        }

        $hero->update($data);

        return redirect()->route('dashboard.hero.index')->with('success','Hero berhasil diperbarui!');
    }
}
