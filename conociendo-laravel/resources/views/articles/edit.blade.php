@extends('layout')
@section('head')
    
@endsection
@section('content')
<div class="wrapper">
    <div id="page" class="container">
        <h1>Update article</h1>
        <form action="/articles/{{$article->id}}" method="PUT">
            <div class="field">
                <label for="tittle" class="label"></label>
                <div class="control">
                    <input type="text" class="input" name="tittle" id="tittle" value="{{$article->title}}">
                </div>
            </div>
            <div class="field">
                <label for="excerpt" class="label">Excerpt</label>
                <div class="control">
                    <textarea name="excert" id="excert" cols="30" rows="10">{{$article->excerpt}}</textarea>
                </div>
            </div>
            <div class="field">
                <label for="body" class="label">Body</label>
                <div class="control">
                    <textarea name="body" id="body" cols="30" rows="10">{{$article->excerpt}}</textarea>
                    
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <button class="button is-link" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection