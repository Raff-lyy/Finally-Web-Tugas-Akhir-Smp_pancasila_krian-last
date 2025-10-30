<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Simpan pesan dari landing page
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        Contact::create($request->all());

        return back()->with('success', 'Pesan Anda telah terkirim, kami akan segera menghubungi Anda.');
    }

    // Tampilkan di dashboard
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('dashboard.contacts.index', compact('contacts'));
    }

    // Redirect ke email client (Gmail/Yahoo)
    public function reply($id)
    {
        $contact = Contact::findOrFail($id);
        return redirect()->away("mailto:{$contact->email}?subject=Balasan%20:{$contact->subject}");
    }

    // Hapus pesan
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Pesan berhasil dihapus.');
    }
}
