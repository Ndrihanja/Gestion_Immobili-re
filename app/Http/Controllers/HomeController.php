<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Agence;
use App\Models\Cite;
use App\Models\Client;
use App\Models\Logement;
use App\Models\Province;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /** home dashboard */
    public function index()
    {
        $vente_count = Achat::count();
        $agence_count = Agence::count();
        $province_count = Province::count();
        $clients = Client::all();
        $ventes = Achat::all();
        $achatscount = Achat::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');
        $total = Achat::sum('prix_total');
        $data = [];
        $achats = Achat::select(DB::raw("COUNT(*) as count, MONTHNAME(date_achat) as month"))
            ->groupBy('month')
            ->orderBy(DB::raw('MONTH(date_achat)'))
            ->get();
        foreach ($achats as $achat) {
            $data['label'][] = $achat->month;
            $data['datas'][] = $achat->count;
        }

        $achats_info = Achat::with(['logements', 'clients'])
            ->select('achats.id', 'achats.prix_total', 'achats.date_achat', 'logements.nom_logement', 'clients.nom_client')
            ->join('logements', 'logements.id', '=', 'achats.logement_id')
            ->join('clients', 'clients.id', '=', 'achats.client_id')
            ->get();


        $data['data'] = json_encode($data);
        $logement_count = Logement::count();
        return view('dashboard.home', ['vente_count' => $vente_count, 'agence_count' => $agence_count, 'province_count' => $province_count, 'clients' => $clients, 'ventes' => $ventes, 'logement_count' => $logement_count, 'achats' => $achatscount, 'data' => $data, 'total' => $total, 'achats_info' => $achats_info]);
    }

    /** profile user */
    public function userProfile()
    {
        return view('dashboard.profile');
    }

    /** agence dashboard */
    public function agenceDashboardIndex()
    {

        $data = [];
        $achats = Achat::select(DB::raw("COUNT(*) as count, MONTHNAME(date_achat) as month"))
            ->groupBy('month')
            ->orderBy(DB::raw('MONTH(date_achat)'))
            ->get();
        foreach ($achats as $achat) {
            $data['label'][] = $achat->month;
            $data['datas'][] = $achat->count;
        }

        $data['data'] = json_encode($data);
        // Obtenez la date de début et de fin de la semaine précédente
        $startOfWeek = Carbon::now()->subWeek()->startOfWeek();
        $endOfWeek = Carbon::now()->subWeek()->endOfWeek();

        // Comptez les achats de la semaine précédente
        $nombreAchats = Achat::whereBetween('date_achat', [$startOfWeek, $endOfWeek])->count();

        $agences = Agence::all();
        $agence_count = Agence::count();
        $province_count = Province::count();
        $cite_count = Cite::count();
        $count_vente = Achat::count();
        $ventes = Achat::with(['clients', 'logements', 'type_achats'])
            ->select('achats.id', 'clients.nom_client as client', 'logements.id as id_logement', 'logements.lot as lot', 'logements.nom_logement as logement', 'achats.prix_total as prix', 'achats.date_achat as date', 'type_achats.achat as achat')
            ->join('logements', 'logements.id', '=', 'achats.logement_id')
            ->join('clients', 'clients.id', '=', 'achats.client_id')
            ->join('achat_type_achats', 'achat_type_achats.achat_id', '=', 'achats.id')
            ->join('type_achats', 'type_achats.id', '=', 'achat_type_achats.type_achat_id')->get();

        return view('dashboard.agence_dashboard', ['agences' => $agences, 'agence_count' => $agence_count, 'province_count' => $province_count, 'cite_count' => $cite_count, 'nombreAchats' => $nombreAchats, 'count_vente' => $count_vente, 'ventes' => $ventes, 'data' => $data]);
    }

    /** client dashboard */
    public function clientDashboardIndex()
    {
        return view('dashboard.client_dashboard');
    }

    /** logement dashboard */
    public function logementDashboardIndex()
    {
        return view('dashboard.logement_dashboard');
    }

    /** terrain dashboard */
    public function terrainDashboardIndex()
    {
        return view('dashboard.terrain_dashboard');
    }
}
