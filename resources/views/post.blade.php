@extends('layouts.layout')

@section('css')

        <link rel= "stylesheet" href="{{asset('css/styles.css')}}">
        <link rel= "stylesheet" href="{{asset('css/styles_post.css')}}">
        <link rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css"/>

@endsection

@section('script')

    <script src= "{{asset('js/post.js')}}" defer></script>
    <script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js" defer></script>

@endsection

@section('title')
Post
@endsection

@section('content')

        <section class="main">

            <div class="indietro">
            <i class='bx bx-chevron-left' ></i>
            <h2>Torna indietro</h2>
            </div>
            
            <div class="container container_post">
                <div class="img">
                    <img src="{{asset($casa->img)}}" alt="">                                                              
                </div>  
                
                <div class="data" id=>  

                    <div class="title_like">
                        <h1 class="title" name = '{{$casa->id_casa}}'>
                                 {{$casa->nome}}                                      
                        </h1>
                        @if(Session::get('user')!==null)
                            @if($like != null)

                                @if($like)
                                    <i class="bx bxs-heart" id="cuore" name = '{{$casa->id_casa}}'></i>
                                @else
                                    <i class="bx bx-heart" id="cuore" ></i>
                                @endif

                            @else
                                <i class="bx bx-heart" id="cuore" ></i>
        
                            @endif
                        @endif
                    </div>                                                        
                    

                    <h2 class="prezzo">
                        € {{$casa->prezzo}}   
                    </h2> 

                    <h2 class="indirizzo">
                        {{$casa->indirizzo}}   
                    </h2> 

                     <h2 class="descrizione">
                        {{$casa->descrizione}}   
                     </h2>  
                     
                     <div class="mappa">


                    </div>
                   
                </div>

            </div>
        </section>
@endsection
