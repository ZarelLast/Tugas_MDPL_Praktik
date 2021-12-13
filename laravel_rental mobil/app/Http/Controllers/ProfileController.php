<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data_user = User::find($id)->where('id_pelanggan', $id)->get()[0];
        $menu = 2;
    	$title = 'Profile - '.$data_user->nama;
        return view('pages.user.index',  compact('title', 'menu', 'data_user'));
    }


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
        return redirect()->route('profile', $id);
    }
}
