<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Session;


class UserController extends BaseController
{


    public function login(){

        $request = request();

        $email = $request['email'];
        $password = $request['password'];



        if ( session()->has('user')){

            return redirect('/index');
        }


        if($email!==null && $password!==null)
        {
            
            $passMd5 = md5($password);
        
            $user = User::where('email', $email)
                    ->where('password', $passMd5)
                    ->first();

            if($user!==null)
            {

                $remember = $request['remember'];

                if(!empty($remember)){

                    setcookie("user_login", $email, time()+ (10*365*24*60*60));
                    setcookie("user_pass", $password, time()+ (10*365*24*60*60));
                }else{
                    if(isset($_COOKIE["user_login"])){
                        setcookie ("user_login", "");
                    }
                    if(isset($_COOKIE["user_pass"])){
                        setcookie ("user_pass", "");
                    }
            
                }

                Session::put('user', $user->id_utente);

                return redirect('/index');
            }else
                {
                    return view('login')->with('errLog',true);
                }
        }
    }

    public function register(){

        $request = request();
            
        $email = $request['email'];
        $password = $request['password'];
        $nome = $request['nome'];


        if($this->countErrors($request) === 0)
        {
        
            $passMd5 = md5($password);

            $newUser = User::create([

                'nome' => $nome,
                'email' => $email,
                'password' => $passMd5,

            ]);

            if($newUser){ 
                        
                return redirect('login')->with('alert', 'User Created Successfully.');

            }
             else redirect('register');

             
                
        }   
    
    }

    private function countErrors($data) {
        $error = array();
        
        # USERNAME
        if(!isset($data['nome'])) {
            $error[] = "Username non valido";
        }

        # PASSWORD
        if (strlen($data["password"]) < 6) {
            $error[] = "Caratteri password insufficienti";
        }

        if (strcmp($data["password"], $data["password_confirmation"]) != 0) {
            $error[] = "Le password non coincidono";
        }

        # EMAIL
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $email = User::where('email', $data['email'])->first();
            if ($email !== null) {
                $error[] = "Email già utilizzata";
            }
        }

        return count($error);
    }

    public function logout(){
        session()->flush();

        return redirect('/index');
    }

    public function checkEmail($email){
        
        $exist = User::where('email',$email)->exists();

        return ['exists' => $exist];

    }

    public function index() {
        return view('register');
    } 
        
}




?>