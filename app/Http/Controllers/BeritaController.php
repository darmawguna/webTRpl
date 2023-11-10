<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Http\Requests\StoreBeritaRequest;
use App\Http\Requests\UpdateBeritaRequest;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::getBerita()->orderByDesc('berita_id')->paginate(6);
        $beritaTerkini = Berita::getBerita()->orderByDesc('berita_id')->get();
        return view('berita', compact('berita', 'beritaTerkini'));
    }
    public function detail($slug = 'all')
    {
        $beritaTerkini = Berita::getBerita()->where('slug', '!=', $slug)->orderByDesc('berita_id')->paginate(6);
        if ($slug == 'all') {
            $berita = Berita::getBerita()->orderByDesc('berita_id')->paginate(6);
            return view('berita', compact('berita', 'beritaTerkini'));
        }
        $berita = Berita::getBerita()->where('slug', '=', $slug)->first();
        return view('detailBerita', compact('berita', 'beritaTerkini'));
    }
}
