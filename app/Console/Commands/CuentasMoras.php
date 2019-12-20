<?php

namespace SurtidoraLainez\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use SurtidoraLainez\BitacoraTarea;
use SurtidoraLainez\Cuenta;

class CuentasMoras extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cuentas:moras';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Vamos a Verificar que cuentas estan atrasadas';

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
        CuentasCommands::RevisarCuentas();

    }
}
