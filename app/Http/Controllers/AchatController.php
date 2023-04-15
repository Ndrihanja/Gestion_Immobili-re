<?php

namespace App\Http\Controllers;

use App\Jobs\GenerateFactureJob;
use App\Models\Achat;
use App\Models\AchatTypeAchat;
use App\Models\Client;
use App\Models\Logement;
use App\Models\TypeAchat;
use Barryvdh\DomPDF\Facade\Pdf;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AchatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venteList = Achat::with(['clients', 'logements', 'type_achats'])
            ->select('achats.id', 'clients.nom_client as client', 'logements.nom_logement as logement', 'achats.prix_total as prix', 'achats.date_achat as date', 'type_achats.achat as achat')
            ->join('logements', 'logements.id', '=', 'achats.logement_id')
            ->join('clients', 'clients.id', '=', 'achats.client_id')
            ->join('achat_type_achats', 'achat_type_achats.achat_id', '=', 'achats.id')
            ->join('type_achats', 'type_achats.id', '=', 'achat_type_achats.type_achat_id')->get();

        return view('achat.achat', compact('venteList'));
    }

    public function generatePdf()
    {
        $datas = Achat::with(['clients', 'logements', 'type_achats'])
            ->select('achats.id', 'clients.nom_client as client', 'logements.id as id_logement', 'logements.lot as lot', 'logements.nom_logement as logement', 'achats.prix_total as prix', 'achats.date_achat as date', 'type_achats.achat as achat')
            ->join('logements', 'logements.id', '=', 'achats.logement_id')
            ->join('clients', 'clients.id', '=', 'achats.client_id')
            ->join('achat_type_achats', 'achat_type_achats.achat_id', '=', 'achats.id')
            ->join('type_achats', 'type_achats.id', '=', 'achat_type_achats.type_achat_id')->get();

        // share data to view
        view()->share('achat', $datas);
        $pdf = Pdf::loadView('achat.achat_pdf', ['datas' => $datas]);
        return $pdf->download('pdf_file.pdf');
    }

    public function generateFacture($lastAchatId)
    {
        $data = Achat::with(['clients', 'logements', 'type_achats'])
            ->select('achats.id as id', 'clients.nom_client as client', 'clients.adresse as adresse', 'logements.nom_logement as logement', 'achats.prix_total as prix', 'achats.date_achat as date', 'type_achats.achat as achat')
            ->join('logements', 'logements.id', '=', 'achats.logement_id')
            ->join('clients', 'clients.id', '=', 'achats.client_id')
            ->join('achat_type_achats', 'achat_type_achats.achat_id', '=', 'achats.id')
            ->join('type_achats', 'type_achats.id', '=', 'achat_type_achats.type_achat_id')->where('achats.id', $lastAchatId)
            ->first();

        // share data to view
        view()->share('achat', $data);
        $pdf = Pdf::loadView('achat.achat_facture', ['data' => $data]);

        return $pdf->download('pdf_file_' . $lastAchatId . '.pdf');
    }

    // index page add-vente
    public function venteAdd()
    {

        // On récupère les infos
        $logements = Logement::select("id", "nom_logement")->get();
        $clients = Client::select("id", "nom_Client")->get();
        $type_achats     = TypeAchat::select("id", "achat")->get();
        return view('achat.add-achat', ['logements' => $logements, 'clients' => $clients, 'type_achats' => $type_achats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function venteSave(Request $request)
    {
        // dd("Request : " + $request);
        $validator =   Validator::make($request->all(), [
            'type_achat_id'  => 'required',
            'logement_id'  => 'required',
            'client_id'  => 'required',
            'prix_total'  => 'required|double',
            'date_achat'  => 'required|date',
        ]);

        $prix = floatval($request->prix_total);

        DB::beginTransaction();
        try {
            $achat = new Achat();
            $achat->logement_id = bcadd($request->logement_id, 0, 0);
            $achat->client_id = bcadd($request->client_id, 0, 0);
            $achat->prix_total = $prix;
            $achat->date_achat = $request->date_achat;
            $achat->save();

            $lastAchatId = Achat::latest()->pluck('id')->first();
            $achattypeachat = new AchatTypeAchat();
            $achattypeachat->achat_id = bcadd($lastAchatId, 0, 0);
            $achattypeachat->type_achat_id = bcadd($request->type_achat_id, 0, 0);
            $achattypeachat->save();

            $this->generateFacture($lastAchatId);
            DB::commit();

            Toastr::success('Has been add successfully :)', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Fail, Add new achat :)', 'Error');
            return redirect()->back();
        }
    }

    // index page vente grid
    public function venteGrid()
    {
        $datas = Achat::with(['clients', 'logements', 'type_achats'])
            ->select('achats.id', 'clients.nom_client as client', 'logements.id as id_logement', 'logements.image', 'logements.lot as lot', 'logements.nom_logement as logement', 'achats.prix_total as prix', 'achats.date_achat as date', 'type_achats.achat as achat')
            ->join('logements', 'logements.id', '=', 'achats.logement_id')
            ->join('clients', 'clients.id', '=', 'achats.client_id')
            ->join('achat_type_achats', 'achat_type_achats.achat_id', '=', 'achats.id')
            ->join('type_achats', 'type_achats.id', '=', 'achat_type_achats.type_achat_id')->get();
        return view('achat.achat-grid', compact('datas'));
    }


    /** view for edit vente */
    public function venteEdit($id)
    {
        $venteEdit = Achat::where('id', $id)->first();

        // On récupère les infos
        $logement = Logement::select("id", "nom_logement")->get();
        $client = Client::select("id", "nom_Client")->get();
        $type_achat = TypeAchat::select("id", "achat")->get();
        return view('achat.edit-achat', compact('venteEdit'), ['logement' => $logement, 'client' => $client, 'type_achat' => $type_achat, 'venteEdit' => $venteEdit]);
    }

    /** update record */
    public function venteUpdate(Request $request)
    {
        DB::beginTransaction();
        try {

            $updateRecord = [
                'date_achat' => $request->date_achat,
                'prix_total' => $request->prix_total,
                'logement_id' =>  bcadd($request->logement_id, 0, 0),
                'client_id' =>  bcadd($request->client_id, 0, 0),
            ];
            Achat::where('id', $request->id)->update($updateRecord);
            $updatetype = [
                'type_achat_id' => bcadd($request->type_achat_id, 0, 0),

            ];
            AchatTypeAchat::where('id', $request->id)->update($updatetype);

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
    public function venteDelete(Request $request)
    {
        DB::beginTransaction();
        try {

            Achat::destroy($request->id);

            DB::commit();
            Toastr::success('Achat deleted successfully :)', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Achat deleted fail :)', 'Error');
            return redirect()->back();
        }
    }
}
