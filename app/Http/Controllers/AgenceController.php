<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\Province;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class AgenceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agenceList = Agence::with(['provinces'])->select('agences.id', 'agences.nom_agence', 'agences.mail', 'agences.phone', 'provinces.id as province_id', 'provinces.nom_province as nom_province')
            ->join('provinces', 'provinces.id', '=', 'agences.province_id')
            ->get();
        return view('agence.agence', compact('agenceList'));
    }

    public function generatePdf()
    {
        // retreive all records from db
        $datas = Agence::with('provinces')->get();
        // share data to view
        view()->share('agence', $datas);
        $pdf = Pdf::loadView('agence.agence_pdf', ['datas' => $datas]);
        return $pdf->download('pdf_file.pdf');
    }

    // index page add-agence
    public function agenceAdd()
    {

        // On récupère les provinces
        $provinces = Province::select("id", "nom_province")->get();
        return view('agence.add-agence', ['provinces' => $provinces]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function agenceSave(Request $request)
    {
        $validator =   Validator::make($request->all(), [
            'nom_agence'  => 'required|string',
            'phone'  => 'required|string',
            'mail'  => 'required|string',
            'province_id'  => 'required',
        ]);



        DB::beginTransaction();
        try {
            $agence = new Agence();
            $agence->nom_agence = $request->nom_agence;
            $agence->phone = $request->phone;
            $agence->mail = $request->mail;
            $agence->province_id = bcadd($request->province_id, 0, 0);
            $agence->save();

            Toastr::success('Has been add successfully :)', 'Success');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Fail, Add new agence :)', 'Error');
            return redirect()->back();
        }
    }

    // index page student grid
    public function agenceGrid()
    {
        return view('agence.agence-grid');
    }


    /** view for edit agence */
    public function agenceEdit($id)
    {
        $agenceEdit = Agence::where('id', $id)->first();

        // On récupère les provinces
        $provinces = Province::select("id", "nom_province")->get();
        return view('agence.edit-agence', compact('agenceEdit'), ['provinces' => $provinces, 'agenceEdit' => $agenceEdit]);
    }

    /** update record */
    public function agenceUpdate(Request $request)
    {
        DB::beginTransaction();
        try {

            $updateRecord = [
                'nom_agence' => $request->nom_agence,
                'phone' => $request->phone,
                'mail' => $request->mail,
                'province_id' =>  bcadd($request->province_id, 0, 0),
            ];
            Agence::where('id', $request->id)->update($updateRecord);

            Toastr::success('Has been update successfully :)', 'Success');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, update agence  :)', 'Error');
            return redirect()->back();
        }
    }




    /** user delete */
    public function agenceDelete(Request $request)
    {
        DB::beginTransaction();
        try {

            Agence::destroy($request->id);

            DB::commit();
            Toastr::success('Agene deleted successfully :)', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Agence deleted fail :)', 'Error');
            return redirect()->back();
        }
    }
}
