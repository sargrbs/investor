<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MySQLCheck extends Command
{
    protected $signature = 'db:mysql-check';
    protected $description = 'Verifica se o MySQL está disponível';

    public function handle()
    {
        try {
            DB::connection()->getPdo();
            return 0;
        } catch (\Exception $e) {
            return 1;
        }
    }
}
