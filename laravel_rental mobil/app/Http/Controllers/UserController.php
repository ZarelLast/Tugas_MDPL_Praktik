<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "List Pelanggan";
        $data['menu'] = 3;
        $users = DB::table('tb_pelanggan')->get()->toArray();
        $data['users'] = json_decode(json_encode($users), true);
        $data['no'] = 1;
        return view('users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.user.create');
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
        $data['pelanggan'] = User::find($id);
        $data['title'] = "Edit Pelanggan ".$id;
        $data['menu'] = 3;

        return view('users.edit', $data);
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
        $validate = $request->validate([
            'nama' => 'required',
            'telp' => 'nullable',
            'alamat' => 'nullable',
            'email' => 'required',
            'password_new' => 'required',
        ]);

        $data['nama'] = $request['nama'];
        $data['telp'] = $request['telp'];
        $data['alamat'] = $request['alamat'];
        $data['email'] = $request['email'];
        if($request['password_old'] != $request['password_new']){
            $data['password'] = bcrypt($request['password_new']);
        }else{
            $data['password'] = $request['password_old'];
        }

        $update = User::find($id)->update($data);
        return redirect()->route('pelanggan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
    }
}
