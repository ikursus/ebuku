<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(2);

        return view('template_users/index', compact('users'));
    }

    public function datatables()
    {
        $users = User::select([
            'id',
            'name',
            'email',
        ]);

        return DataTables::of($users)
        ->addColumn('action', function ($person) {
            return view('template_users/action', compact('person') );
        })
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('template_users/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required:min:3',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        $data = $request->all();

        User::create($data);
        # DB::table('users')->insert($data);

        return redirect()->route('users.index');

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
    public function edit(User $user)
    {
        return view('template_users/edit', compact('user'));
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
        $request->validate([
            'name' => 'required:min:3',
            'email' => 'required|unique:users,email,'. $id
        ]);
        # Dapatkan semua data dari borang KECUALI password
        $data = $request->except('password');

        # Semak jika ruangan password tidak kosong.
        if ( !empty($request->input('password') ) )
        {
            # Attachkan rekod password yang diencrypt ke array $data
            $data['password'] = bcrypt($request->input('password'));
        }

        # Update rekod user berkaitan
        $user = User::find($id);

        $user->update($data);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
