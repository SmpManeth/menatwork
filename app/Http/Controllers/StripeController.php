<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;

class StripeController extends Controller
{
    public function checkout()
    {
        return View('checkout');
    }
    public static function session(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'whatsapp_number' => ['required', 'string', 'min:3', 'max:255'],
        ]);

        $dataToPass = http_build_query([
            'name' => $request->first_name,
            'email' => $request->email,
            'whatsapp_number' => $request->whatsapp_number,
        ]);

        $productname = "Registration payment";
        $totalprice = 30;

        $two = "00";
        $totalprice = "$totalprice$two";

        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'EUR',
                        'product_data' => [
                            "name" => $productname,
                        ],
                        'unit_amount' => $totalprice,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('register_new') . '?' . $dataToPass,
            'cancel_url' => route('dashboard'),
        ]);


        return redirect()->away($session->url);
    }

    public static function session_two(Request $request)
    {
       
        $request->validate([
            'employee_agreement' => 'required|max:2048', // Max file size of 2MB
            // 'termsconditions' => 'required|max:2048', // Max file size of 2MB 'photo' => 'required|image|max:2048', // Max file size of 2MB
        ]);
       
        $employee_agreement = $request->file('employee_agreement')->store('public/upload_images');
       // $termsconditions = $request->file('termsconditions')->store('public/upload_images');
        $dataToPass = http_build_query([
            'employee_agreement' => $employee_agreement,
            //'termsconditions' => $termsconditions,
        ]);

        $productname = "Documentation payment";
        $totalprice = 555;

        $two = "00";
        $totalprice = "$totalprice$two";

        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'EUR',
                        'product_data' => [
                            "name" => $productname,
                        ],
                        'unit_amount' => $totalprice,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('stepfour_post') . '?' . $dataToPass,
            'cancel_url' => route('dashboard'),
        ]);


        return redirect()->away($session->url);
    }
    public function success()
    {
    }
}
