<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\Cite;
use Barryvdh\DomPDF\Facade\Pdf;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citeList = Cite::with(['agences'])
            ->select('cites.id', 'cites.nom_cite', 'agences.id as agence_id', 'agences.nom_agence as nom_agence')
            ->join('agences', 'agences.id', '=', 'cites.agence_id')
            ->get();
        return view('cite.cite', compact('citeList'));
    }

    public function generatePdf()
    {
        // retreive all records from db
        $datas = Cite::all();
        // share data to view
        view()->share('agence', $datas);
        $pdf = Pdf::loadView('cite.cite_pdf', ['datas' => $datas]);
        return $pdf->download('pdf_file.pdf');
    }

    // index page add-cite
    public function citeAdd()
    {

        // On récupère les agences
        $agences = Agence::select("id", "nom_agence")->get();
        return view('cite.add-cite', ['agences' => $agences]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function citeSave(Request $request)
    {
        $validator =   Validator::make($request->all(), [
            'nom_cite'  => 'required|string',
            'agence_id'  => 'required',
        ]);



        DB::beginTransaction();
        try {
            $cite = new Cite();
            $cite->nom_cite = $request->nom_cite;
            $cite->agence_id = bcadd($request->agence_id, 0, 0);
            $cite->save();

            Toastr::success('Has been add successfully :)', 'Success');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Fail, Add new cite :)', 'Error');
            return redirect()->back();
        }
    }

    // index page cite grid
    public function citeGrid()
    {
        return view('cite.cite-grid');
    }


    /** view for edit cite */
    public function citeEdit($id)
    {
        $citeEdit = Cite::where('id', $id)->first();

        // On récupère les agences
        $agences = Agence::select("id", "nom_agence")->get();
        return view('cite.edit-cite', compact('citeEdit'), ['agences' => $agences, 'citeEdit' => $citeEdit]);
    }

    /** update record */
    public function citeUpdate(Request $request)
    {
        DB::beginTransaction();
        try {

            $updateRecord = [
                'nom_cite' => $request->nom_cite,
                'agence_id' =>  bcadd($request->agence_id, 0, 0),
            ];
            Cite::where('id', $request->id)->update($updateRecord);

            Toastr::success('Has been cite successfully :)', 'Success');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, cite agence  :)', 'Error');
            return redirect()->back();
        }
    }




    /** cite delete */
    public function citeDelete(Request $request)
    {
        DB::beginTransaction();
        try {

            Agence::destroy($request->id);

            DB::commit();
            Toastr::success('Cite deleted successfully :)', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Cite deleted fail :)', 'Error');
            return redirect()->back();
        }
    }
}
