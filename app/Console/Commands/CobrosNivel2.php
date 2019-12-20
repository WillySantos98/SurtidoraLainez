<?php

namespace SurtidoraLainez\Console\Commands;

use Illuminate\Console\Command;

class CobrosNivel2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cobros:nivel2';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Busca que cuentas en moras pueden pasar al nivel 2 de importancia';

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

    }
}
