<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Tempahan;

class TempahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $query = DB::table('tempahan')
        // ->join('booklist', 'tempahan.booklist_id', '=', 'booklist.id')
        // #->where('tempahan.status', '=', 'PAID')
        // ->select('tempahan.*', 'booklist.id as Idbooklist', 'booklist.title')
        // ->paginate(5);
        $query = Tempahan::paginate(5);

        return view('tempahan.index', compact('query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        # $tempahan = DB::table('tempahan')->whereId($id)->first();
        $tempahan = DB::table('tempahan')
        ->where('id', '=', $id)
        ->first();
        $tempahan = Tempahan::find($id);
        
        return view('tempahan.show', compact('tempahan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tempahan = DB::table('tempahan')->whereId($id)->first();
        
        return view('tempahan.edit', compact('tempahan'));
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
        $data = $request->only('status');

        $tempahan = DB::table('tempahan')
        ->where('id', '=', $id)
        ->update($data);
        
        return redirect()->back()->with('alert-success', 'Rekod berjaya dikemaskini!');
        #return redirect()->route('tempahan.show', $id);
        #return redirect('/tempahan/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tempahan = DB::table('tempahan')
        ->whereId($id)
        ->delete();

        return redirect()->route('tempahan.index');
    }

}
