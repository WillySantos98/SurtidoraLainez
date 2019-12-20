<?php

namespace SurtidoraLainez\Console\Commands;

use Illuminate\Console\Command;
use SurtidoraLainez\Console\Commands\Cobros\Cobroscommands;
use SurtidoraLainez\Cuenta;

class Cobros extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cobros:nivel1';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cuenta que entra en mora se le crea reporte';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $cuentas = Cuenta::all();
        $txt = fopen(public_path().'/TXT/Cobros/nivel1.txt', "w");
        foreach ($cuentas as $cuenta){
            if ($cuenta->estado_interes == 2 && $cuenta->tipo_cuenta == 1 && $cuenta->total_intereses > 0 && $cuenta->estado_cuenta == 1) {
                Cobroscommands::RevisarReporte($cuenta->id, $txt);
            }
        }
        fclose($txt);
    }
}
