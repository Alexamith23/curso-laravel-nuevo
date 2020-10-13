<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index(){
        $article = Article::latest()->get();
        return view('articles.index',['articles'=>$article]);
    }
    public function show(Article $article){
        // $article = Article::findOrFail($id);
        // return view('articles.show',['article'=>$article]);
        return redirect(route('articles.show', $article));
    }
    public function create(){
        return view('articles.show');
    }
    public function store(){
        Article::create($this->validateArticle());
        return redirect('/articles');
    }
    public function edit(Article $article){
        return view('articles.edit', compact('article'));
    }
    public function update(Article $article){
        $article->update($this->validateArticle());
        return redirect($article->path());
    }
    public function destroy(){
        
    }

    protected function validateArticle(){
        return request()->validate([
            'title'=>'required',
            'excerpt'=>'required',
            'body'=>'required'
        ]);
    }
}
