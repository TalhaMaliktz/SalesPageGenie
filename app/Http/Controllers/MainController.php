<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
   public function Index()
   {
      return View('Index');
   }
   public function Login()
   {
       return View('auth\login');
   }
   public function Register()
   {
       return View('auth\register');
   }


   public function AboutUs()
   {
       return View('AboutUs');
   }

   
}
