<?php

namespace App\Http\Controllers;

use App\Models\Teacher;

class TentangController extends Controller
{
    public function index()
    {
        $teachersByPosition = Teacher::all()->groupBy('position');
        return view('tentang.tentang', compact('teachersByPosition'));
    }
}
