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
