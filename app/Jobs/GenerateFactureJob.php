<?php

namespace App\Jobs;

use App\Models\Achat;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Barryvdh\DomPDF\Facade\Pdf;

class GenerateFactureJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $lastAchatId;
    /**
     * Create a new job instance.
     *
     * @param int $lastAchatId
     */
    public function __construct(int $lastAchatId)
    {
        $this->lastAchatId = $lastAchatId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = Achat::with(['clients', 'logements', 'type_achats'])
            ->select('achats.id', 'clients.nom_client as client', 'logements.nom_logement as logement', 'achats.prix_total as prix', 'achats.date_achat as date', 'type_achats.achat as achat')
            ->join('logements', 'logements.id', '=', 'achats.logement_id')
            ->join('clients', 'clients.id', '=', 'achats.client_id')
            ->join('achat_type_achats', 'achat_type_achats.achat_id', '=', 'achats.id')
            ->join('type_achats', 'type_achats.id', '=', 'achat_type_achats.type_achat_id')
            ->where('achats.id', $this->lastAchatId)
            ->first();
        view()->share('achat', $data);
        $pdf = Pdf::loadView('achat.achat_pdf', ['data' => $data]);
        $pdf->download('pdf_file.pdf');
    }
}
