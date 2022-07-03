<html>
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        @yield('meta')

        <!-- CSS -->
        @yield('css')

        <!-- ICONE -->
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

        <!-- JS -->
        
        @yield('script')

       

        <title> @yield('title') </title>

    </head>
    <body>

        <header>
            <nav>
                <a href= "{{url('index')}}" class= logo> CASA SERVICE <i class="bx bx-home" ></i> </a>
        
                <div class="menu">
                    <ul class="lista">
        
                        <li class="item">
                            <a href="{{url('index')}}" class="nav_link"> Home </a>
                            <a href="{{url('index')}}"> <i class="bx bx-home-alt-2"></i></a>
                        </li>

                        @if (Session::get('user')!=null)
        
                        <li class="item">

                        

                            <a href="{{url('preferiti')}}" class="nav_link" id="btn_pref">Preferiti</a>

                        
                            <a href="{{url('preferiti')}}"> <i class="bx bx-like" ></i>
                        </li>
                        @endif

        
                        <li class="item contact">
                            <a href="#contact" class="nav_link"> Contatti </a>
                            <a href="#contact"> <i class="bx bxs-phone-call"></i>
                        </li>


                        @if (Session::get('user')!=null)
                        <li class="item" id="btn_annuncio">

                       
                            <a href="{{url('create')}}" class="ann_link">Crea annuncio </a>
                           

                            <a href="{{url('create')}}"> <i class="bx bx-message-add"></i>
                            
                        </li>
                        @endif 

                        @if (Session::get('user')==null)
                            <li class="item"  id="btn_login">

                            
                                <a href="{{url('login')}}" class="nav_link">Accedi</a>

                                <a href="{{url('login')}}"> <i class="bx bx-user"></i></a>
                            </li>
                        @endif

                        @if (Session::get('user')!=null)
                            <li class="item" id="btn_logout">
                            
                                <a href="{{url('logout')}}" class="nav_link">Logout</a>
                            
                                <a href="{{url('logout')}}"> <i class="bx bxs-user-x" ></i></a>
                            </li>
                        @endif
        
                    </ul>
                </div>
                </nav>

                <section>@yield('search')</section>
        </header>
            

        <section>@yield('content')</section>
                                
        <!--FOOTER-->

        <footer class="footer section">

            <div class="footer_container container grid">
                <div>
                    <a href="#" class="footer_logo">
                      Casa service<i class="bx bx-home" ></i>
                    </a>

                    <p class="footer_description">
                          Il nostro sito è bellissimo veramente</br>dai un occhiata
                    </p>
                </div>

                <div class="footer_content">
                    <div>
                        <h3 class="footer_title">
                              About
                        </h3>

                        <ul class="footer_links">
                            <li>
                                <a href="#" class="footer_link">About us</a>
                            </li>
                            <li>
                                <a href="#" class="footer_link">Features</a>
                            </li>
                            <li>
                                <a href="#" class="footer_link">News</a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="footer_title">
                          Company
                        </h3>

                        <ul class="footer_links">
                            <li>
                                <a href="#" class="footer_link">How we work?</a>
                            </li>
                            <li>
                                <a href="#" class="footer_link">Capital</a>
                            </li>
                            <li>
                                <a href="#" class="footer_link">Security</a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="footer_title">
                          Support
                        </h3>

                        <ul class="footer_links">
                            <li>
                                <a href="#" class="footer_link">FAQs</a>
                            </li>
                            <li>
                                <a href="#" class="footer_link">Support center</a>
                            </li>
                            <li>
                                <a href="#" class="footer_link">Contac us</a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="footer_title">
                          Follow us
                        </h3>

                        <ul class="footer_social">
                            <a href="" target="_blank"class="footer_social-link">
                            <i class="bx bxl-facebook-circle"></i>
                            </a>
                            <a href="" target="_blank"class="footer_social-link">
                            <i class="bx bxl-instagram" ></i>
                            </a>
                            <a href="" target="_blank"class="footer_social-link">
                            <i class="bx bxl-twitter" ></i>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>     
            
            <div class="footer_info container">
                <span class="footer_copy">
                   &#169; Bedimcode. All rigths reserved 
                </span>

                <div class="footer_privacy">
                    <a href="">Terms & Agreements</a>
                    <a href="">Privacy Policy</a>
                </div>
            </div>
         </footer> 



    
     </body>
    
        
</html>