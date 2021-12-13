<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Returns;
use App\Car;
use App\User;
use Illuminate\Support\Facades\DB;
use DateTime;

class ReturnController extends Controller
{
    public function index(){
    	$data['menu'] = 2;
    	$data['title'] = 'List Peminjaman';
        $transaksi = Returns::All();
    	$data['no'] = 1;
    	return view('returns.index', ['data'=>$data, 'transaksi'=>$transaksi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['peminjaman'] = Returns::find($id);
        $data['title'] = "Edit Peminjaman ".$id;
        $data['menu'] = 2;

        return view('returns.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $validate = $request->validate([
            'harga' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'waktu' => 'nullable',
            'denda' => 'nullable',
            'total' => 'nullable'
        ]);

        $data['harga'] = $request['harga'];
        $data['tgl_pinjam'] = $request['tgl_pinjam'];
        $data['tgl_kembali'] = $request['tgl_kembali'];
        $data['waktu'] = $request['waktu'];
        $date_now = date('d-m-Y\TH:i:s');
        $sisa_waktu = (int) round((strtotime($date_now)-strtotime($data['tgl_kembali']))/3600);

        if ($sisa_waktu > 0){
            $data['denda'] = (int)((($data['harga']/100)*2)*$sisa_waktu);
        }else{
            $data['denda'] = 0;
        }

        $data['total'] = $data['denda']+$data['harga'];
        if ($request['status'] == 'selesai'){
            $data['status'] = $request['status'];
            $status['status'] = 'tersedia';
            $update = Car::where('nopol', $request['nopol'])->update($status);
        }
        $update = Returns::find($id)->update($data);

        return redirect()->route('returns.index');
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Returns::find($id);
        $status['status'] = 'tersedia';
        $update = Car::where('id_kendaraan', $data['id_kendaraan'])->update($status);
        $data->delete();
    }

    public function downloadCVS()
    {
        $table = Returns::all();
        $file = fopen('file.csv', 'w');
        foreach ($table as $row) {
            fputcsv($file, $row->toArray());
        }
        fclose($file);
        // return 'h';
        // dd($table);
    }
}
