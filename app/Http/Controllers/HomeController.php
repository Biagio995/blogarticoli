<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $articles = Article::take(3)->get();

        return view ('home', compact('articles'));
    }

    public function aboutUs() {
        return view ('chi-siamo');
    }

    public function contacts() {
        return view ('contatti');
    }
}
