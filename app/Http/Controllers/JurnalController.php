<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use Barryvdh\DomPDF\Facade\Pdf;

class JurnalController extends Controller
{
    // 📌 INDEX
    public function index()
    {
        $jurnals = Jurnal::latest()->paginate(10);
        return view('dashboard.jurnal.index', compact('jurnals'));
    }

    // 📌 CREATE FORM
    public function create()
    {
        return view('dashboard.jurnal.create');
    }

    // 📌 STORE
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'penulis' => 'nullable|string|max:255',
            'tanggal' => 'required|date',
        ]);

        Jurnal::create($request->all());

        return redirect()->route('jurnals.index')->with('success', 'Jurnal berhasil ditambahkan.');
    }

    // 📌 EDIT FORM
    public function edit(Jurnal $jurnal)
    {
        return view('dashboard.jurnal.edit', compact('jurnal'));
    }

    // 📌 UPDATE
    public function update(Request $request, Jurnal $jurnal)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'penulis' => 'nullable|string|max:255',
            'tanggal' => 'required|date',
        ]);

        $jurnal->update($request->all());

        return redirect()->route('jurnals.index')->with('success', 'Jurnal berhasil diperbarui.');
    }

    // 📌 DESTROY
    public function destroy(Jurnal $jurnal)
    {
        $jurnal->delete();
        return redirect()->route('jurnals.index')->with('success', 'Jurnal berhasil dihapus.');
    }

    // 📌 EXPORT KE WORD
    public function exportWord(Jurnal $jurnal)
    {
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        \PhpOffice\PhpWord\Shared\Html::addHtml($section, $jurnal->isi);

        $file = storage_path("app/public/jurnal-{$jurnal->id}.docx");
        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($file);

        return response()->download($file)->deleteFileAfterSend(true);
    }

    // 📌 EXPORT KE EXCEL
    public function exportExcel(Jurnal $jurnal)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', $jurnal->judul);
        $sheet->setCellValue('A2', strip_tags($jurnal->isi));

        $writer = new Xlsx($spreadsheet);
        $file = storage_path("app/public/jurnal-{$jurnal->id}.xlsx");
        $writer->save($file);

        return response()->download($file)->deleteFileAfterSend(true);
    }

    // 📌 EXPORT KE PDF
    public function exportPdf(Jurnal $jurnal)
    {
        $pdf = Pdf::loadView('dashboard.jurnal.export', compact('jurnal'));
        return $pdf->download("jurnal-{$jurnal->id}.pdf");
    }
}
