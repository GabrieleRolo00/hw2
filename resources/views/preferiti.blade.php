@extends('layouts.layout')

@section('css')

        <link rel= "stylesheet" href="{{asset('css/styles.css')}}">
        <link rel= "stylesheet" href="{{asset('css/styles_post.css')}}">
        <link rel= "stylesheet" href="{{asset('css/styles_search.css')}}">
@endsection

@section('script')

    <script src= "{{asset('js/pref.js')}}" defer></script>

@endsection

@section('title')
Preferiti
@endsection

@section('content')

        <section class="main">

            <h1 id="title">
                Le tue preferenze
            </h1>
    
            <div class="search_container section" id="search_container">
    
                
    
            </div>

        </section>
@endsection
