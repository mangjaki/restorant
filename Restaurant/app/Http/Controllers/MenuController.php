<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = Menu::all();
        return view('menu.index')->with('menu', $menu);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->user()->cannot('create', Menu::class)){
            abort(403);
        }
        $val = $request->validate([
            'url_menu' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama'=> 'required|max:40',
            'jenis'=> 'required|max:40',
            'harga'=> 'required',
            'stok'=> 'required'
        ]);

        //extensi file yang di upload
        $ext = $request->url_menu->getClientOriginalExtension();
        //rename misal: nama.extensi nasgor.png
        $val['url_menu'] = $request->nama.".".$ext;
        //upload ke dalam folder public/fotomenu/
        $request->url_menu->move('fotomenu/', $val['url_menu']);

        Menu::create($val);
        return redirect()->route('menu.index')->with('success', $val['nama']. ' Berhasil di Simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($menu)
    {
        $menu = Menu::findOrFail($menu);
        return view('menu.show')->with('menu', $menu);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($menu)
    {
        $menu = Menu::find($menu);
        return view('menu.edit')->with('menu', $menu);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $menu)
    {
        if ($request->url_menu) {
            $val = $request->validate([
                'url_menu'=> 'required|file|mimes:jpeg,png,jpg,gif,svg|max:5000',
                'nama'=> 'required|max:40',
                'jenis'=> 'required|max:40',
                'harga'=> 'required',
                'stok'=> 'required'
            ]);
            //extensi file yang di upload
            $ext = $request->url_menu->getClientOriginalExtension();
            //rename misal: nama.extensi nasgor.png
            $val['url_menu'] = $request->nama.".".$ext;
            //upload ke dalam folder public/fotomenu/
            $request->url_menu->move('fotomenu/', $val['url_menu']);
        }else{
            $val = $request->validate([
                //'url_menu'=> 'required|file|mimes:jpeg,png,jpg,gif,svg|max:5000',
                'nama'=> 'required|max:40',
                'jenis'=> 'required|max:40',
                'harga'=> 'required',
                'stok'=> 'required'
            ]);
        }
        $menu = Menu::find($menu);
        Menu::where('id', $menu['id'])->update($val);
        return redirect()->route('menu.index')->with('success',$val['nama'].' Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($menu)
    {
        $menu = Menu::find($menu);
        File::delete('fotomenu/'.$menu['url_foto']);
        $menu->delete();
        return redirect()->route('menu.index')->with('success','Data Berhasil di Hapus');
    }

    public function qrCode()
    {
        $qrCode = new QrCode(route('menu.index'));
        $qrCode->setSize(200);
        $writer = new PngWriter();
        $qrCodePath = 'qrcodes/menu.png';

        if (!is_dir(public_path('qrcodes'))) {
            mkdir(public_path('qrcodes'), 0777, true);
        }

        $result = $writer->write($qrCode);
        $result->saveToFile(public_path($qrCodePath));

        return view('menu.qrcode', ['qrCodePath' => $qrCodePath]);
    }
}
