<?php

namespace App\Http\Controllers;

use App\Article;
use App\Mail\ContactMe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ArticlesController extends Controller
{

    public  function store(){
        request()->validate(['email' => 'required|email']);
        Mail::raw('Todo correcto', function($message){
            $message->to(request('email'))->subject('Hello world!');
        });
        Mail::to(request('mail'))->send(new ContactMe('shirts'));
        return redirect('/cotact')->with('message','Email sent!');
    }

    // public function index(){

    //     if(request('tag')){
    //         $articles = Tag::where('name',request('tag'))->firstOrFail()->articles;
            
    //     }else{
    //         $article = Article::latest()->get();
    //     }
        
    //     return view('articles.index',['articles'=>$article]);
    // }
    // public function show(Article $article){
    //     // $article = Article::findOrFail($id);
    //     // return view('articles.show',['article'=>$article]);
    //     return redirect(route('articles.show', $article));
    // }
    // public function create(){

    //     return view('articles.show',['tags'=> Tag::all()]);
    // }



    // public function store(){
    //     $this->validateArticle();
        
    //     $article  = new Article(request(['title','excerpt','body']));
    //     $article->user_id = 1;
    //     $article->save();
    //     $articles->tags()->attach(request('tags'));
    //     return redirect('/articles');
    // }









    // public function edit(Article $article){
    //     return view('articles.edit', compact('article'));
    // }
    // public function update(Article $article){
    //     $article->update($this->validateArticle());
    //     return redirect($article->path());
    // }
    // public function destroy(){
        
    // }

    // protected function validateArticle(){
    //     return request()->validate([
    //         'title'=>'required',
    //         'excerpt'=>'required',
    //         'body'=>'required',
    //         'tags' => 'exists:tags,id'
    //     ]);
    // }
}
