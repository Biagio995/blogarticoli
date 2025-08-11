<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Storage as FacadesStorage;

class ArticleController extends Controller
{
    
    public function index() {
        $articles = Article::paginate(3);
        
        return view ('articoli.index', compact('articles'));
    }
    
    public function show(Article $article){
        
        if (!$article) {
            return abort(404, 'Article not found');
        }
        return view ('articoli.show', compact('article'));
    }
    
    public function create() 
    {
        $categories = Category::all();
        return view('articoli.create', compact('categories'));
    }
    
    public function store(ArticleRequest $request) {
        
        
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $ext = $request->file('image')->extension();
            $fileName = uniqid() . '.' . $ext;
        }
        try {
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $url = Storage::url($path);
            $newArticle = new Article();
            $newArticle->title = $request->input('title');
            $newArticle->content = $request->input('content');
            $newArticle->user_id = Auth::user()->id;
            $newArticle->image = $url;
            $newArticle->save();
            $newArticle->categories()->attach($request->categories);
        } catch (\Throwable $e) {
            
        }
        
        return redirect()->back()->with('success', 'Articolo creato con successo!');
    }
    
    /**
    * Show the form for editing the specified resource.
    */
    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('articoli.edit', compact('article', 'categories'));
    }
    
    /**
    * Update the specified resource in storage.
    */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $ext = $request->file('image')->extension();
            $fileName = uniqid() . '.' . $ext;
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $url = Storage::url($path);
            
            
            
            $imagePath = public_path($article->image);
            if(FacadesFile::exists($imagePath)){
                unlink($imagePath);
            }
            
            
            
            $article->update( [
                'title' => $request->title,
                'content' => $request->content,
                'image' => $url,
            ]);
        } else {
            $article->update( [
                'title' => $request->title,
                'content' => $request->content,
            ]);
        }
        
        $article->categories()->detach();
        $article->categories()->attach($request->categories);
        
        return redirect()->route('dashboard')->with('success', 'Articolo aggiornato con successo!');
    }
    
    /**
    * Remove the specified resource from storage.
    */
    public function destroy(Article $article)
    {
        
        if ($article->image) {
            $relativePath = str_replace('/storage/', '', $article->image);
            FacadesStorage::disk('public')->delete($relativePath);
        }
        
        $article->delete();
        
        return redirect()->back()->with('success', 'Articolo eliminato con successo!');
    }
    
    
    public function dashboard() 
    {
        return view('users.dashboard', ['articles' => Auth::user()->articles]);
    }
}