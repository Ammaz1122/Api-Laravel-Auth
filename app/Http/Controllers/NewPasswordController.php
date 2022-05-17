<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class NewPasswordController extends Controller
{
    public function forgot(Request $request)
    {
        $request->validate(
            ['email' => 'required|email'
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );
     
        return Password::RESET_LINK_SENT
                    ? (['status' => __($status)])
                    : (['email' => __($status)]);


    }

    


}
