<?php

namespace App\Http\Controllers;
use App\Models\Konsumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class KonsumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $konsumens = Konsumen::latest()->paginate(20);
        return view('konsumen.index', compact('konsumens'))->with('i', (request()->input('page',1)-1)*20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('konsumen.create');
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
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'foto' => 'required'
        ]);

        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'Profile';
        $file->move($tujuan_upload,$nama_file);

        Konsumen::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'foto' => $nama_file

        ]);


        return redirect()->route('konsumen.index')
        ->with('success','Konsumen Created Successfully.');
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
    public function edit(Konsumen $konsumen)
    {
        return view('konsumen.edit',compact('konsumen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Konsumen $konsumen)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        if($request->file('foto')){
            unlink(public_path('Profile/'. $konsumen->foto));
        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = "Profile";
        $file->move($tujuan_upload,$nama_file);

        Storage::delete('public/Profile/'. $konsumen->foto);

        // update post data image
        $konsumen->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'foto' => $nama_file,
        ]);
        }
        else{
            $konsumen->update($request->all());
        }

        return redirect()->route('konsumen.index')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Konsumen $konsumen)
    {
        $konsumen->delete();
        return redirect()->route('konsumen.index')->with('success','Data Berhasil Dihapus');
    }
}
