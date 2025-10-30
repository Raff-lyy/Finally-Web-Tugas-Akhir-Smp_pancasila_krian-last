<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    
    public function public()
{
    $teachers = Teacher::all();
    return view('components.teachers', compact('teachers'));
}


    public function index()
    {
        $teachers = Teacher::all();
        return view('dashboard.guru.index', compact('teachers'));
    }

    public function create()
    {
        return view('dashboard.guru.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'subject'  => 'nullable|string|max:255',
            'photo'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('teachers', 'public');
        }

        Teacher::create($data);

        return redirect()->route('guru.index')->with('success', 'Guru berhasil ditambahkan.');
    }

    public function edit(Teacher $guru)
    {
        return view('dashboard.guru.edit', ['teacher' => $guru]);
    }

    public function update(Request $request, Teacher $guru)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'subject'  => 'nullable|string|max:255',
            'photo'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($guru->photo) {
                Storage::disk('public')->delete($guru->photo);
            }
            $data['photo'] = $request->file('photo')->store('teachers', 'public');
        }

        $guru->update($data);

        return redirect()->route('guru.index')->with('success', 'Guru berhasil diperbarui.');
    }

    public function destroy(Teacher $guru)
    {
        if ($guru->photo) {
            Storage::disk('public')->delete($guru->photo);
        }
        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Guru berhasil dihapus.');
    }
}
