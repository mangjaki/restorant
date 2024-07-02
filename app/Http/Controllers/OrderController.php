<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderDetail;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menu = Menu::all();
        return view('order.create', compact('menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'menu' => 'required|array',
            'menu.*.menu_id' => 'required|exists:menus,id',
            'menu.*.jumlah' => 'required|integer|min:1',
        ]);

        $order = Order::create([
            'user_id' => Auth::id(),
            'status' => 'pending',
        ]);

        foreach ($request->menu as $menu) {
            $menuItem = Menu::findOrFail($menu['menu_id']);
            $total_price = $menuItem->harga * $menu['jumlah'];

            OrderDetail::create([
                'order_id' => $order->id,
                'menu_id' => $menu['menu_id'],
                'jumlah' => $menu['jumlah'],
                'total_price' => $total_price,
            ]);
        }

        return redirect()->route('order.show', $order->id);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = Order::with('orderDetails.menu')->findOrFail($id);
        $qrCode = Builder::create()
            ->writer(new PngWriter)
            ->data(route('order.pay', $order->id))
            ->size(200)
            ->build();

        $qrCodePath = 'qrcodes/order_' . $order->id . '.png';

        if (!is_dir(public_path('qrcodes'))) {
            mkdir(public_path('qrcodes'), 0777, true);
        }

        $qrCode->saveToFile(public_path($qrCodePath));

        return view('order.show', compact('order', 'qrCodePath'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
