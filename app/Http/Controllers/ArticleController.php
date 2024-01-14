<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index(){
        $articles = Article::orderBy('id','asc')->get();
        return view('articles.index', compact('articles'));
    }

    public function create(){
        return view('articles.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'published_at' => 'required',
        ]);

        Article::create($request->post());

        return redirect()->route('articles.index')->with('success','Article berhasil ditambahkan');
        
    }

    public function edit(Article $article){
        return view('articles.edit', compact('article')); 
    }

    public function update(Request $request, Article $article){
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'published_at' => 'required',
        ]);
    
        $article->fill($request->post())->save();
    
        return redirect()->route('articles.index')->with('BERHASIL','Artikel berhasil diupdate');
    }    

    public function destroy(Article $article){
        $article->delete();
        return redirect()->route('articles.index')->with('BERHASIL','Artikel berhasil dihapus');
    }

    public function search(Request $request){
        $cari = $request->cari;
 
		$articles = Article::where('title', 'like', "%" . $cari . "%")->orderBy('id', 'asc')->paginate(4);

		return view('articles.index', compact('articles'));
    }
}
