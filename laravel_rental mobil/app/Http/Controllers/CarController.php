<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "List Mobil";
        $data['menu'] = 1;
        $cars = DB::table('tb_kendaraan')->get()->toArray();
        //ngereturn array dari query builder laravel
        $data['cars'] = json_decode(json_encode($cars), true);
        //catatan : besok2 pake notasi objek aja kalo nampilin data dari eloqeunt or dari db
        $data['no'] = 1;
        return view('car.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Add New Cars";
        $data['menu'] = 1;

        return view('car.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'merek' => 'required',
            'nopol' => 'required',
            'harga' => 'required',
            'type' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required'
        ]);

        if ($request->hasFile('gambar')) {
            $image_name = Image::make($request->file('gambar'))->resize(320, 240, function ($constraint) {
                $constraint->aspectRatio();
            });
            //save the watermarked and standard image to disc and recording their names for db
            $location = $request->file('gambar')->store('public/uploads');
            $fileName = md5($location . microtime());
            $extension = '.' . explode("/", $image_name->mime())[1];
            Storage::put('public/watermarked/' . $fileName . $extension, $image_name->encode());
        }

        $data['merek'] = $request['merek'];
        $data['nopol'] = $request['nopol'];
        $data['harga'] = $request['harga'];
        $data['type'] = $request['type'];
        $data['deskripsi'] = $request['deskripsi'];
        $data['gambar'] = $fileName . $extension;

        $insert = Car::create($data);

        return redirect()->route('car.index');
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
        $data['car'] = Car::find($id);
        $data['title'] = "Edit Mobil ".$id;
        $data['menu'] = 1;

        return view('car.edit', $data);
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
            'merek' => 'required',
            'nopol' => 'required',
            'harga' => 'required',
            'type' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable'
        ]);

        if ($request->hasFile('gambar')) {
            $image_name = Image::make($request->file('gambar'))->resize(320, 240, function ($constraint) {
                $constraint->aspectRatio();
            });
            //save the watermarked and standard image to disc and recording their names for db
            $location = $request->file('gambar')->store('public/uploads');
            $fileName = md5($location . microtime());
            $extension = '.' . explode("/", $image_name->mime())[1];
            Storage::put('public/watermarked/' . $fileName . $extension, $image_name->encode());
            $data['gambar'] = $fileName . $extension;
        }

        $data['merek'] = $request['merek'];
        $data['nopol'] = $request['nopol'];
        $data['harga'] = $request['harga'];
        $data['type'] = $request['type'];
        $data['deskripsi'] = $request['deskripsi'];

        $update = Car::find($id)->update($data);
        return redirect()->route('car.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_kendaraan')->where('id_kendaraan', '=', $id)->delete();
        return redirect()->route('car.index');
    }
}
