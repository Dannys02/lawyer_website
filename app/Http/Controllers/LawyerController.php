<?php

namespace App\Http\Controllers;

use App\Models\about;
use App\Models\news;
use App\Models\galery;
use App\Models\jurnal;
use App\Models\legal_opini;
use App\Models\reviews;
use App\Models\segmentation;
use App\Models\service;
use App\Models\socialmedia;
use Illuminate\Http\Request;
use App\Models\legal_patnership;

class LawyerController extends Controller
{
    public function welcome()
    {
        $reviews = reviews::latest()->get();
        $news = news::latest()->get();
        $services = service::latest()->get();
        $about = about::latest()->first();
        $socialmedia = socialmedia::latest()->first();
        $segmentation = segmentation::first();
        return view('interface.welcome', compact('reviews', 'news', 'services', 'about', 'socialmedia', 'segmentation'));
    }

    public function about()
    {
        $about = about::latest()->first();
        $socialmedia = socialmedia::latest()->first();
        return view('interface.about', compact('about', 'socialmedia'));
    }

    public function service()
    {
        $services = service::latest()->get();
        $segmentation = segmentation::first();
        return view('interface.service', compact('services', 'segmentation'));
    }

    public function showService($id)
    {
        $service = service::findOrFail($id);
        $otherServices = service::where('id', '!=', $service->id)->latest()->take(6)->get();
        return view('interface.service-show', compact('service', 'otherServices'));
    }

    public function partner()
    {
        $patners = legal_patnership::all();
        return view('interface.partner', compact('patners'));
    }

    public function picture()
    {
        $galeries = galery::latest()->get();
        return view('interface.galery', compact('galeries'));
    }

    public function article(Request $request)
    {
        $search = trim($request->input('search', ''));

        $articlesQuery = legal_opini::query();

        if (!empty($search)) {
            $articlesQuery->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('author', 'like', "%{$search}%")
                      ->orWhere('text', 'like', "%{$search}%");
            });
        }

        $articles = $articlesQuery->latest()->paginate(12)->withQueryString();

        if ($request->ajax() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
            return view('interface.article-list-partial', compact('articles', 'search'));
        }

        return view('interface.article', compact('articles', 'search'));
    }

    public function showArticle($slug)
    {
        $article = legal_opini::where('slug', $slug)->firstOrFail();

        // Increment views safely
        $article->increment('views');

        // Related / recent articles
        $recentArticles = legal_opini::where('id', '!=', $article->id)
            ->latest()
            ->take(4)
            ->get();

        return view('interface.article-show', compact('article', 'recentArticles'));
    }

    public function file(Request $request)
    {
        $search = trim($request->input('search', ''));

        $query = jurnal::query();

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $file = $query->latest()->paginate(9)->withQueryString();

        if ($request->ajax() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
            return view('interface.jurnal-list-partial', compact('file', 'search'));
        }

        return view('interface.jurnal', compact('file', 'search'));
    }

    public function news(Request $request)
    {
        $search = trim($request->input('search', ''));

        $query = news::query();

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('publisher', 'like', "%{$search}%");
            });
        }

        $news = $query->latest('date_publish')->paginate(9)->withQueryString();

        if ($request->ajax() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
            return view('interface.news-list-partial', compact('news', 'search'));
        }

        return view('interface.news', compact('news', 'search'));
    }

    public function contact()
    {
        $reviews = reviews::latest()->get();
        $socialmedia = socialmedia::latest()->first();
        return view('interface.contact', compact('reviews', 'socialmedia'));
    }

    public function viewJurnal($id)
    {
        $jurnal = Jurnal::findOrFail($id);

        // Increment views safely when PDF is viewed
        $jurnal->increment('views');

        $filePath = storage_path('app/public/' . $jurnal->pdf_file);

        if (file_exists($filePath)) {
            return response()->file($filePath, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . basename($jurnal->pdf_file) . '"'
            ]);
        }

        return redirect()->back()->with('error', 'File tidak ditemukan.');
    }

    public function downloadJurnal($id)
    {
        $jurnal = Jurnal::findOrFail($id);

        // Increment views safely when downloaded/read
        $jurnal->increment('views');

        $filePath = storage_path('app/public/' . $jurnal->pdf_file);

        if (file_exists($filePath)) {
            return response()->download($filePath, basename($jurnal->pdf_file));
        }

        return redirect()->back()->with('error', 'File not found.');
    }
}
