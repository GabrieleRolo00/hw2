@extends('layouts.layoutForm')

    @section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel= "stylesheet" href="{{asset('css/styles_login.css')}}">
    @endsection

    @section('script')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src= "{{asset('js/login_script.js')}}" defer></script>
        <script type="text/javascript">
            const REGISTER_ROUTE = "{{route('register')}}";
        </script>
    @endsection
 

    @section('title')
        Login
    @endsection

    @section('alert')
        @if (Session::has('alert'))

        <div class="alert alert-success alert-dismissible  fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert">
        <span aria-hidden="true">&times;</span>
        </button>
        {{ session('alert') }}
        </div>

        @endif
    @endsection
    

        @section('form')

        

            <div class="forms">
                    <div class="form login">
                        <span class="title">Login</span>

                        <form action="{{url('login')}}" method="post" id="formLogin">
                        @csrf
                        <div class="input-field dati">
                                <input type="text" name="email" class="input" id="emailLogin" value= "<?php if(isset($_COOKIE["user_login"])) echo $_COOKIE["user_login"] ?>"placeholder = "Enter your email" required>
                                <i class='bx bx-envelope icon'></i>
                            </div>

                            <p class="textErr" id="textErrEmail"></p>

                            <div class="input-field dati">
                                <input type="password" name="password" class="password input" value= "<?php if(isset($_COOKIE["user_pass"])) echo $_COOKIE["user_pass"] ?>" placeholder = "Enter your password" required>
                                <i class='bx bx-lock-alt icon' ></i>
                                <i class='bx bx-low-vision showHidePw' ></i>
                            </div>

                            @if (isset($errLog) )

                                <p class="textErr" id="textErrPass" > Wrong email or password </p>

                            @endif

                            <div class="checkbox-text">
                                <div class="checkbox-content" >
                                    <input type="checkbox" name="remember" <?php if(isset($_COOKIE["user_login"])){ ?> checked <?php } ?> id="logCheck">
                                    <label for="logCheck" class="text">Remember me</label>
                                </div>

                                
                            </div>

                            <div class="input-field button">
                                <input type="submit" value="Login Now" id="btnLogin">
                            </div>

                            <div class="login-signup">
                                <span class="text">Not a member?
                                    <a href="#" class="text signup-link">Signup now</a>
                                </span>
                            </div>
                        </form>
                    </div>

            <!-- Registration-->

                <div class="form signup">
                        <span class="title">Registration</span>

                        <form action="{{url('register')}}" method='post' id="formReg">
                            @csrf
                            <div class="input-field">
                                <input type="text" name="nome" class="input" id="nome" placeholder = "Enter your name" required>
                                <i class='bx bx-user icon' ></i>
                            </div>

                            <p class="textErr" id="textErrNome"></p>

                            <div class="input-field">
                                <input type="text" name="email" class="input" id="emailReg" placeholder = "Enter your email" required>
                                
                                <i class='bx bx-envelope icon'></i>
                            </div>
                            <p class="textErr" id="textErrEmail"></p>

                            <div class="input-field">
                                <input type="password" class="password input" id= "password" name="password" placeholder = "Create a password" required>
                                <i class='bx bx-lock-alt icon' ></i>
                            </div>

                            <div class="input-field">
                                <input type="password" class="password input" id= "confirmPassword" name="password_confirmation" placeholder = "Confirm your password" required>
                                <i class='bx bx-lock-alt icon' ></i>
                                <i class='bx bx-low-vision showHidePw' ></i>
                            </div>

                            <p class="textErr" id="textErrPass"></p>

                            <div class="input-field button">
                                <input type="submit" value="Register Now" id="btnReg">
                            </div>

                            <div class="login-signup">
                                <span class="text">Are you a member? 
                                    <a href="#" class="text login-link">Login now</a>
                                </span>
                            </div>
                        </form>
                    </div>
            </div>
        @endsection
