<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResendVerification extends Controller
{
    //

   public function  Resend (Request $request)
   {
    $request->user()->sendEmailVerificationNotification();
 
   return ['mesg' => 'Message Verification has been send '];
    
   }
        
}
