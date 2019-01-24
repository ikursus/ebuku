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
        $data['status'] = 'pending';

        $tempahan = DB::table('tempahan')->insertGetId($data);
        
        return redirect()->route('order.thankyou', $tempahan);
        # return redirect('order/thankyou/' . $tempahan);

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
