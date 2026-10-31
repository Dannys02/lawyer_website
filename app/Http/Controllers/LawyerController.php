<?php

namespace App\Http\Controllers;

use App\Models\news;
use App\Models\galery;
use App\Models\jurnal;
use App\Models\legal_opini;
use App\Models\reviews;
use App\Models\service;
use Illuminate\Http\Request;
use App\Models\legal_patnership;

class LawyerController extends Controller
{
    public function welcome()
    {
        $reviews = reviews::latest()->get();
        $patners = legal_patnership::latest()->get();
        $news = news::latest()->get();
        $services = service::all();
        return view('interface.welcome', compact('reviews', 'patners', 'news', 'services'));
    }

    public function about()
    {
        return view('interface.about');
    }

    public function service()
    {
        $services = service::all();
        return view('interface.service', compact('services'));
    }

    public function partner()
    {
        $patners = legal_patnership::all();
        return view('interface.partner', compact('patners'));
    }

    public function picture()
    {
        $galeries = galery::all();
        return view('interface.galery', compact('galeries'));
    }

    public function article()
    {
        $articles = legal_opini::all();
        return view('interface.article', compact('articles'));
    }

    public function file()
    {
        $file = jurnal::all();
        return view('interface.jurnal', compact('file'));
    }

    public function news()
    {
        $news = news::all();
        return view('interface.news', compact('news'));
    }

    public function contact()
    {
        $reviews = reviews::latest()->get();
        return view('interface.contact', compact('reviews'));
    }

    public function downloadJurnal($id)
    {
        $jurnal = Jurnal::findOrFail($id);

        $filePath = storage_path('app/public/' . $jurnal->pdf_file);

        if (file_exists($filePath)) {
            return response()->download($filePath, basename($jurnal->pdf_file));
        }

        return redirect()->back()->with('error', 'File not found.');
    }
}
