<?php

namespace App\Http\Controllers;

use App\Models\Cite;
use App\Models\Logement;
use App\Models\Terrain;
use App\Models\TypeLogement;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LogementController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logementList = Logement::with(['cites', 'type_logements', 'terrains'])
            ->select('logements.id', 'logements.nom_logement as logement', 'logements.prix as prix', 'logements.image', 'cites.nom_cite as cite', 'type_logements.type as type', 'terrains.surface as surface')
            ->join('cites', 'cites.id', '=', 'logements.cite_id')
            ->join('terrains', 'terrains.id', '=', 'logements.terrain_id')
            ->join('type_logements', 'type_logements.id', '=', 'logements.type_logement_id')
            ->get();
        return view('logement.logement', compact('logementList'));
    }

    // index page add-agence
    public function logementAdd()
    {

        // On récupère les donnés etrangeres
        $cites = Cite::select("id", "nom_cite")->get();
        $terrains = Terrain::select("id", "surface")->get();
        $Typelogements = TypeLogement::select("id", "type")->get();
        return view('logement.add-logement', ['cites' => $cites, 'terrains' => $terrains, 'Typelogements' => $Typelogements]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logementSave(Request $request)
    {

        $validator =   Validator::make($request->all(), [
            'lot'  => 'required|string',
            'nom_logement'  => 'required|string',
            'image'  => 'required|image',
            'prix' => 'required|double',
            'cite_id'  => 'required',
            'terrain_id'  => 'required',
            'type_logement_id'  => 'required',
        ]);



        DB::beginTransaction();
        try {

            $upload_file = rand() . '.' . $request->image->extension();
            $request->image->move(public_path('/storage/logement-photos/'), $upload_file);
            $prix = floatval($request->prix);
            $logement = new Logement();
            $logement->lot = $request->lot;
            $logement->nom_logement = $request->nom_logement;
            $logement->image = $upload_file;
            $logement->prix = $prix;
            $logement->cite_id = bcadd($request->cite_id, 0, 0);
            $logement->terrain_id = bcadd($request->terrain_id, 0, 0);
            $logement->type_logement_id = bcadd($request->type_logement_id, 0, 0);

            //dd($logement);
            $logement->save();

            Toastr::success('Has been add successfully :)', 'Success');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            //dd($e);
            DB::rollBack();
            Toastr::error('Fail, Add new logement :)', 'Error');
            return redirect()->back();
        }
    }

    // index page logement grid
    public function logementGrid()
    {
        $logementList = Logement::with(['cites', 'type_logements', 'terrains'])
            ->select('logements.id', 'logements.nom_logement as logement', 'logements.prix as prix', 'logements.lot', 'logements.image', 'cites.nom_cite as cite', 'type_logements.type as type', 'terrains.surface as surface')
            ->join('cites', 'cites.id', '=', 'logements.cite_id')
            ->join('terrains', 'terrains.id', '=', 'logements.terrain_id')
            ->join('type_logements', 'type_logements.id', '=', 'logements.type_logement_id')
            ->get();
        return view('logement.logement-grid', compact('logementList'));
    }


    /** view for edit logement */
    public function logementEdit($id)
    {
        $logementEdit = Logement::where('id', $id)->first();

        // On récupère les données etrengeres

        $cites = Cite::select("id", "nom_cite")->get();
        $terrains = Terrain::select("id", "surface")->get();
        $Typelogements = TypeLogement::select("id", "type")->get();
        return view('agence.edit-agence', compact('agenceEdit'), ['cites' => $cites, 'logementEdit' => $logementEdit, 'terrains' => $terrains, 'TypeLogements' => $Typelogements]);
    }

    /** update record */
    public function logementUpdate(Request $request)
    {
        DB::beginTransaction();
        try {

            $updateRecord = [
                'lot' => $request->lot,
                'nom_logement' => $request->nom_logement,
                'image' => $request->image,
                'cite_id' =>  bcadd($request->cite_id, 0, 0),
                'terrain_id' =>  bcadd($request->terrain_id, 0, 0),
                'type_logement_id' =>  bcadd($request->type_logement_id, 0, 0),
            ];
            Logement::where('id', $request->id)->update($updateRecord);

            Toastr::success('Has been update successfully :)', 'Success');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, update logement  :)', 'Error');
            return redirect()->back();
        }
    }




    /** logement delete */
    public function logementDelete(Request $request)
    {
        DB::beginTransaction();
        try {

            Logement::destroy($request->id);

            DB::commit();
            Toastr::success('Logement deleted successfully :)', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Logement deleted fail :)', 'Error');
            return redirect()->back();
        }
    }
}
