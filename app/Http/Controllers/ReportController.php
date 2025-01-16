<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Report;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index() {
        $data = Report::get();
        return view('admin.report-list', compact('data'));
    }

    public function addReport() {
        return view('admin.add-report');
    }

    public function saveReport(Request $request) {
        // dump($request);
        // $request->validate([
        //     'name' => 'required',
        //     'nik' => ['required', 'string', 'max:255'],
        //     'nohp' => 'required',
        //     'tujuan' => 'required',
        //     'deskripsi' => 'required',
        // ]);

        if($request->name==null or $request->nik==null or $request->nohp==null or $request->tujuan==null or $request->deskripsi==null){
            return redirect('/')->with('warning', 'Data yang dimasukkan harus lengkap!');        
        }

        // dump($request);

        // // dump($request);
        if($request->gambar!=null){ 
            // Get the uploaded file
            $image = $request->file('gambar');

            // dump($image);

            // Set a unique name for the file
            $imageName = time().'.'.$image->extension();

            // Move the uploaded file to the storage path
            $image->move(public_path('images'), $imageName);
        }

        
        $name = $request->name;
        $id_user = Auth::id();
        $nik = $request->nik;
        $nohp = $request->nohp;
        $tujuan = $request->tujuan;
        $tanggal = Carbon::now()->toDateTimeString();
        $deskripsi = $request->deskripsi;

        $report = new Report();
        $report->name = $name;
        $report->id_user = $id_user;
        $report->nik = $nik;
        $report->nohp = $nohp;
        $report->tanggal = $tanggal;
        $report->tujuan = $tujuan;
        $report->deskripsi = $deskripsi;
        if($request->gambar!=null){
        $report->gambar = '/images/'.$imageName;
        }
        $report->save();

        // Ambil semua data dari model Report
        $reports = Report::all();

        // Kembalikan tampilan dengan data yang telah disimpan
        return redirect('/')->with('success', 'Laporan telah dikirim untuk diverifikasi.');
        // return dump($reports);
    }

    public function editReport($id) {
        $data = Report::where('id', '=', $id)->first();
        return view('admin.edit-report', compact('data'));
    }

    public function updateReport(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'nik' => ['required', 'string', 'max:255', 'unique:users'],
            'nohp' => 'required',
            'tujuan' => 'required',
            'deskripsi' => 'required',
        ]);

        $id = $request->id;
        $name = $request->name;
        $nik = $request->nik;
        $nohp = $request->nohp;
        $tujuan = $request->tujuan;
        $tanggal = Carbon::now()->toDateTimeString();
        $deskripsi = $request->deskripsi;

        Report::where('id', '=', $id)->update([
            'name' => $name,
            'nik' => $nik,
            'nohp' => $nohp,
            'tujuan' => $tujuan,
            'tanggal' => $tanggal,
            'deskripsi' => $deskripsi,
        ]);

        return redirect()->back()->with('success', 'Report Updated Successfully');
    }

    public function deleteReport($id) {
        Report::where('id', '=', $id)->delete();
        return redirect()->back()->with('success', 'Report Deleted Successfully');
    }

    public function konfirmasiReport($id){
        if(Report::where('id', '=', $id)->get()->first()->status=='Disimpan'){
            Report::where('id', '=', $id)->update(['status' => "Terverifikasi"]);    
        }
        else if(Report::where('id', '=', $id)->get()->first()->status=='Terverifikasi'){
            Report::where('id', '=', $id)->update(['status' => "Selesai"]);
        }
        else{
            Report::where('id', '=', $id)->update(['status' => "Disimpan"]);
        }
        return redirect()->route('report-list')->with('success', 'Status telah diubah ke tahap selanjutnya.');
    }
}
