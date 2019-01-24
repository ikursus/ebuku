<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($book_id)
    {
        #$buku = Booklist::findOrFail($id);
        $buku = DB::table('booklist')
        ->where('id', '=', $book_id)
        ->first(); // LIMIT 1

        return view('orders.template_order', compact('buku'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $book_id)
    {
        # Validate data dari borang
        #$this->validate($request, []);
        $request->validate([
            'nama_pelanggan' => 'required|min:3',
            'email_pelanggan' => 'required|email'
        ]);

        # Dapatkan data dari borang
        $data = $request->only([
            'nama_pelanggan',
            'email_pelanggan',
            'telefon_pelanggan',
            'jumlah_bayaran',
            'tarikh_bayaran',
            'masa_bayaran',
            'kuantiti'
        ]);
        
        # Bekalkan kepada id booklist_id
        $data['booklist_id'] = $book_id;
        $data['status'] = 'PENDING';

        # Cek jika ada fail yang di upload
        if ( $request->hasFile('bukti_bayaran') )
        {
            // Dapatkan maklumat fail gambar
          $gambar = $request->file('bukti_bayaran');
          // Dapatkan NAMA fail gambar tersebut
          $nama_gambar = $gambar->getClientOriginalName();
          // Berikan nama baru fail gambar dengan adanya timestamp
          $nama_baru = date('Y-m-dH-i-S').'-'.$nama_gambar;
          // Upload gambar ke folder simpanan gambar bernama uploads yang berada di dalam public
          $gambar->move('uploads', $nama_baru);
          // Masukkan maklumat nama gambar ke array $data
          $data['bukti_bayaran'] = $nama_baru;
        }

        $tempahan_id = DB::table('tempahan')->insertGetId($data);
        
        # return redirect()->route('order.thankyou', $tempahan_id);
        return redirect('order/thankyou/' . $tempahan_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function thankYou($id)
    {
        $tempahan = DB::table('tempahan')->whereId($id)->first();

        return view('orders.template_thankyou', compact('tempahan'));
    }
}
