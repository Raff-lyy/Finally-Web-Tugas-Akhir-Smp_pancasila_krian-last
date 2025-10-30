<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    // --- FRONTEND ---
    public function index()
    {
        $programs = Program::latest()->get();
        return view('programs.index', compact('programs'));
    }

    // --- DASHBOARD ---
    public function dashboardIndex()
    {
        $programs = Program::latest()->get();
        return view('dashboard.programs.index', compact('programs'));
    }

    public function create()
    {
        return view('dashboard.programs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'desc'  => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('programs', 'public');
        }

        Program::create($data);

        return redirect()->route('dashboard.programs.index')
                         ->with('success', 'Program berhasil ditambahkan.');
    }

    public function edit(Program $program)
    {
        return view('dashboard.programs.edit', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'desc'  => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('programs', 'public');
        }

        $program->update($data);

        return redirect()->route('dashboard.programs.index')
                         ->with('success', 'Program berhasil diperbarui.');
    }

    public function destroy(Program $program)
    {
        if ($program->image) {
            \Storage::disk('public')->delete($program->image);
        }
        $program->delete();

        return redirect()->route('dashboard.programs.index')
                         ->with('success', 'Program berhasil dihapus.');
    }
}
