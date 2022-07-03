@extends('layouts.layout')


@section('meta')
    <meta name="csrf-token" content="{{csrf_token()}}">
    
@endsection

@section('css')
    <link rel= "stylesheet" href="{{asset('css/styles.css')}}">
    <link rel= "stylesheet" href="{{asset('css/styles_search.css')}}">
    
@endsection

@section('script')
    <script src="{{asset('js/search.js')}}" defer ></script>
@endsection
@section('title')
Search
@endsection


@section('content')
<section class="main">
    <h1 id="title">
        Case in vendita a : {{$case[0]->citta}}
    </h1>

    <h2 id="risultati">
        Trovati {{$totCase}} risultati
    </h2>

    <form action="" method="post" class="home__search" name="form_search">
        @csrf
                <div class="search">
                    <i class='bx bxs-map'></i>
                    <input type="search" name="citta" placeholder="Search by location..."  class="search-input">
                </div>
                <input type="submit" value= "Search" class="button">
            </form>

    
    <div class="search_container section">

        <!-- carico la prima volta con php -->                                  
        @foreach($case as $casa)
            <div class="card">
            <a href="{{url('post/'.$casa->id_casa)}}">
                <div class="div_img">
                <img src= {{$casa->img}} alt="" class="card_img">
                </div>

                <div class="card_data">
                        
                        <h3 class="card_title">
                        {{$casa->nome}}                            
                        </h3>


                        <h2 class="card_price">
                            <span>€</span>{{$casa->prezzo}}
                        </h2>


                        <p class="card_description">
                            {{$casa->descrizione}}
                        </p>
                </div>
                </a>
            </div>
        @endforeach
                                        


    </div>

</section>
@endsection