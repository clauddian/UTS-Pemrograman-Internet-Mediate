<?php

namespace App\Http\Controllers;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pakets = Paket::latest()->paginate(20);
        return view('paket.index', compact('pakets'))->with('i', (request()->input('page',1)-1)*20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kd_paket' => 'required',
            'nm_paket' => 'required',
            'jenis_paket' => 'required',
            'nm_konsumen' => 'required',
            'tujuan' => 'required',
            'nm_penerima' => 'required',
            'foto_resi' => 'required'
        ]);

        $file = $request->file('foto_resi');
        $nama_file = time()."_".$file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'Resi';
        $file->move($tujuan_upload,$nama_file);

        Paket::create([
            'kd_paket' => $request->kd_paket,
            'nm_paket' => $request->nm_paket,
            'jenis_paket' => $request->jenis_paket,
            'nm_konsumen' => $request->nm_konsumen,
            'tujuan' => $request->tujuan,
            'nm_penerima' => $request->nm_penerima,
            'foto_resi' => $nama_file

        ]);


        return redirect()->route('paket.index')
        ->with('success','Paket Created Successfully.');
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
    public function edit(Paket $paket)
    {
         return view('paket.edit',compact('paket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paket $paket)
    {
        $request->validate([
            'kd_paket' => 'required',
            'nm_paket' => 'required',
            'jenis_paket' => 'required',
            'nm_konsumen' => 'required',
            'tujuan' => 'required',
            'nm_penerima' => 'required',
        ]);

        if($request->file('foto_resi')){
            unlink(public_path('Resi/'. $paket->foto_resi));
        $file = $request->file('foto_resi');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = "Resi";
        $file->move($tujuan_upload,$nama_file);

        Storage::delete('public/Resi/'. $paket->foto_resi);

        // update post data image
        $paket->update([
            'kd_paket' => $request->kd_paket,
            'nm_paket' => $request->nm_paket,
            'jenis_paket' => $request->jenis_paket,
            'nm_konsumen' => $request->nm_konsumen,
            'tujuan' => $request->tujuan,
            'nm_penerima' => $request->nm_penerima,
            'foto_resi' => $nama_file,
        ]);
        }
        else{
            $paket->update($request->all());
        }

        return redirect()->route('paket.index')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paket $paket)
    {
        $paket->delete();
        return redirect()->route('paket.index')->with('success','Data Berhasil Dihapus');
    }
}
