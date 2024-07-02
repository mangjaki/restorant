<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class PaymentController extends Controller
{
    public function pay($id)
    {
        $order = Order::with('orderDetails.menu')->findOrFail($id);

        // Generate QR Code
        $qrCode = new QrCode(route('order.process', ['order' => $id]));
        $qrCode->setSize(200);
        $writer = new PngWriter();
        $qrCodePath = 'qrcodes/order_' . $id . '.png';

        if (!is_dir(public_path('qrcodes'))) {
            mkdir(public_path('qrcodes'), 0777, true);
        }

        $result = $writer->write($qrCode);
        $result->saveToFile(public_path($qrCodePath));

        return view('payments.pay', compact('order', 'qrCodePath'));

    }

    public function process(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        Payment::create([
            'order_id' => $order->id,
            'amount' => $order->orderDetails->sum('total_price'),
            'payment_method' => $request->payment_method,
            'transaction_id' => $request->transaction_id,
        ]);

        $order->update(['status' => 'paid']);

        return redirect()->route('order.show', $order->id)->with('success', 'Pembayaran berhasil!');
    }
}