<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class emailController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function sendEmail(Request $request)
    {
        $to      = $request->input('email');
        $subject = 'the subject';
        $message = 'Gracias por suscribirte a nuestro newsletter';
        $headers = 'From: contactobikelab@gmail.com'       . "\r\n" .
            'Reply-To: contactobikelab@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
    }
}
