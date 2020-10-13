@extends('layout')

@section('head')
    
@endsection
@section('content')
    <div class="wrapper">
        <div id="page" class="container">
            <h1>New Article</h1>
            <form action="/articles" method="POST">
                <div class="field">
                    <label for="title" class="label"></label>
                    <div class="control">
                        <input type="text" class="input @error('title') is-danger" name="title" id="title" value="{{ old('title') }}">
                        @error('title')
                            <p class="help is-danger">{{$errors->first('title')}}</p>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label for="excerpt" class="label">Excerpt</label>
                    <div class="control">
                        <textarea class="textarea @error('excerpt') is-danger" name="excert" id="excert" cols="30" rows="10">{{ old('excert') }}</textarea>
                        @error('excerpt')
                            <p class="help is-danger">{{$errors->first('excerpt')}}</p>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label for="body" class="label">Body</label>
                    <div class="control">
                        <textarea class="textarea @error('body') is-danger" name="body" id="body" cols="30" rows="10">{{ old('body') }}</textarea>
                        @error('body')
                            <p class="help is-danger">{{$errors->first('body')}}</p>
                        @enderror
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