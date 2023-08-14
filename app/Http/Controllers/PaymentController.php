<?php

namespace App\Http\Controllers;

use App\Mail\SendTicketEmail;
use App\Models\Event;
use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {

        $request->validate([
            'first_name' => 'required|between:2,10',
            'last_name' => 'required|between:2,10',
            'phone' => 'required|between:10,11|unique:orders,phone',
            'email' => 'required|email|unique:orders,email',
        ]);

        $ticket = Ticket::query()->where('id', $request->ticket_id)->firstOrFail();

        $amount_cents = $ticket->price * 100;
        $event_name = Event::query()->where('id', $request->event_id)->pluck('title')[0];

        if ($amount_cents < 1000) {
            $order = new Order();
            $order->first_name = $request->first_name;
            $order->last_name = $request->last_name;
            $order->phone = $request->phone;
            $order->email = $request->email;
            $order->reference = uniqid(10);
            $order->event_id = $request->event_id;
            $order->ticket_id = $request->ticket_id;
            $order->user_id = Auth::user()->id;
            $order->save();

            if (isset($order)) {
                Mail::to($request->email)->send(new SendTicketEmail($event_name, $order->reference, $request->first_name . ' ' . $request->last_name, $order->created_at, $request->email));
            }

            return redirect()->back()->with('message', __("The ticket has been sent to the e-mail"));
        }

        $items = [
            [
                "name" => $ticket->title,
                "amount_cents" => $ticket->price * 100,
                "description" => $ticket->description,
                "quantity" => '1'
            ]
        ];


        $token = $this->getToken();

        $data = [
            "auth_token" => $token,
            "delivery_needed" => "false",
            "amount_cents" => $amount_cents,
            "currency" => "EGP",
            "items" => $items,
        ];

        $order = $this->createOrder($data);


        // Get Payment Token
        $billingData = [
            "email" => "$request->email",
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "shipping_method" => "PKG",
            "country" => "Egypt",
            "apartment" => "803",
            "floor" => "42",
            "street" => "Ethan Land",
            "building" => "8028",
            "phone_number" => $request->phone,
            "city" => "Jaskolskiburgh",
        ];
        $dataPaymentToken = [
            "auth_token" => $token,
            "amount_cents" => $amount_cents,
            "expiration" => 3600,
            "order_id" => $order->id,
            "billing_data" => $billingData,
            "currency" => "EGP",
            "integration_id" => env('PAYMOB_INTEGRATION_ID', 3972823)
        ];

        $paymentToken = $this->getPaymentToken($dataPaymentToken);

        $order = new Order();
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->reference = uniqid(10);
        $order->event_id = $request->event_id;
        $order->ticket_id = $request->ticket_id;
        $order->user_id = Auth::user()->id;
        $order->save();

        if (isset($order)) {
            Mail::to($request->email)->send(new SendTicketEmail($event_name, $order->reference, $request->first_name . ' ' . $request->last_name, $order->created_at, $request->email));
        }

        //        return Redirect::away('https://accept.paymob.com/api/acceptance/iframes/770265?payment_token=' . $paymentToken->object()->token);
        return Redirect::away('https://accept.paymob.com/api/acceptance/iframes/770266?payment_token=' . $paymentToken->object()->token);
    }

    public function getToken()
    {
        $response = Http::post('https://accept.paymob.com/api/auth/tokens', [
            "username" => "01021811237",
            "password" => "Hamo@108940"
        ]);

        return $response->object()->token;
    }

    public function createOrder($data)
    {
        $response = Http::post('https://accept.paymob.com/api/ecommerce/orders', $data);
        return $response->object();
    }

    public function getPaymentToken($dataPaymentToken)
    {
        $response = Http::post('https://accept.paymob.com/api/acceptance/payment_keys', $dataPaymentToken);
        return $response;
    }

    public function callback(Request $request)
    {

        $data = $request->all();

        //        dd($data);
        ksort($data);
        $hmac = $data['hmac'];
        $array = [
            'amount_cents',
            'created_at',
            'currency',
            'error_occured',
            'has_parent_transaction',
            'id',
            'integration_id',
            'is_3d_secure',
            'is_auth',
            'is_capture',
            'is_refunded',
            'is_standalone_payment',
            'is_voided',
            'order',
            'owner',
            'pending',
            'source_data_pan',
            'source_data_sub_type',
            'source_data_type',
            'success',
        ];
        $connectedString = '';
        foreach ($data as $key => $element) {
            if (in_array($key, $array)) {
                $connectedString .= $element;
            }
        }
        $secret = env('PAYMOB_HMAC', 'B25FE9EC3B8C8C76ACFABDFE7E4E8B14');
        $hashed = hash_hmac('sha512', $connectedString, $secret);
        if ($hashed == $hmac) {
            echo "secure";
            exit;
        }
        echo 'not secure';
        exit;
    }
}
