@extends('layouts.layoutForm')

@section('css')
<link rel= "stylesheet" href="{{asset('css/styles_login.css')}}">
    <link rel= "stylesheet" href="{{asset('css/styles_create.css')}}">
@endsection

@section('script')
    <script src= "{{asset('js/crea_annuncio.js')}}" defer></script>
@endsection


@section('title')
Crea annuncio
@endsection
    
@section('form')
            
            <!-- Create -->
                <div class="form">
                        <span class="title">Crea annuncio</span>

                        <form action="{{url('create/crea')}}" method='get' id="formCreate">
                            
                            <div class="input-field">
                                <input type="text" name="nome" class="input" id="nome" placeholder = "Enter house name" required>
                                <i class='bx bx-home-alt-2 icon'></i>
                            </div>


                            <div class="input-field">
                                <input type="text" name="prezzo" class="input" id="prezzo" placeholder = "Enter price" required>
                                <i class='bx bx-euro icon' ></i>
                            </div>

                
                            <div class="input-field">
                                <input type="text" name="citta" class="input" id="citta" placeholder = "Enter city" required>
                                <i class='bx bxs-city icon' ></i>
                            </div>

                            
                            <div class="input-field">
                                <input type="text" name="indirizzo" class="input" id="indirizzo" placeholder = "Enter address" required>
                                <i class='bx bxs-map icon' ></i>
                            </div>

                            <div class="input-field input-img">
                                <input type="text" placeholder = "Enter img (add .jpg or .png)" class="input" name="img" required>
                                <i class='bx bx-image icon' ></i>
                            </div>

                            
                            <div class="input-field textArea">
                                <textarea  maxlength= "500" rows="3" cols="54" name="descrizione" class="input" id="descrizione" placeholder = "Enter description" required></textarea>  
                            </div>

                            <p class="textErr" id="textErr"></p>

                            <div class="input-field button">
                                <input type="submit" value="Create Now" id="btnCreate">
                            </div>

                            <div class="login-signup">
                                <span>
                                    <a href="{{url('index')}}" class="text login-link">Back to home</a>
                                </span>
                            </div>
                        </form>
                    </div>
            
@endsection
