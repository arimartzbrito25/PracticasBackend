<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PurchaseEmail;

class EmailController extends Controller
{
    /**
     * PREVIEW DEL CORREO
     * Se usa para renderizar el HTML del email en el navegador o Postman
     */
    public function preview(Request $request)
    {
        $data = [
            'customer_name'  => $request->input('customer_name', 'John Doe'),
            'order_number'   => $request->input('order_number', 'RB20240125-1'),
            'payment_method' => $request->input('payment_method', 'Transferencia'),
            'payment_status' => $request->input('payment_status', 'Procesando pago'),
            'purchase_date'  => $request->input('purchase_date', '25/01/2024 10:11 am'),
            'email'          => $request->input('email', 'demo@test.com'),
            'products'       => $request->input('products', [
                [
                    'name' => 'Producto de prueba',
                    'quantity' => 1,
                    'price' => 10,
                    'subtotal' => 10
                ]
            ]),
            'total'          => $request->input('total', 10),
        ];

        return view('EmailPreview', $data);
    }

    /**
     * ENVÍO REAL DEL CORREO
     * Se consume desde Postman (API)
     */
    public function send(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $data = $request->all();

        Mail::to($data['email'])
            ->send(new PurchaseEmail($data));

        return response()->json([
            'message' => 'Correo enviado correctamente'
        ]);
    }
}
