<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    public function printReceipt()
    {
        $items = [
            [
                'name' => 'Buku Laravel',
                'qty' => 1,
                'price' => 50000
            ],
            [
                'name' => 'Pulpen',
                'qty' => 2,
                'price' => 5000
            ],
            [
                'name' => 'Buku Catatan',
                'qty' => 1,
                'price' => 15000
            ],
        ];

        $subtotal = 0;

        foreach ($items as $item) {
            $subtotal += $item['qty'] * $item['price'];
        }

        $payment = 100000;
        $change = $payment - $subtotal;

        $transactionNumber = 'TRX-' . now()->format('YmdHis');
        $date = now()->format('d-m-Y H:i:s');

        return view('receipt', compact(
            'items',
            'subtotal',
            'payment',
            'change',
            'transactionNumber',
            'date'
        ));
    }
}