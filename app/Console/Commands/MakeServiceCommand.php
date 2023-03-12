<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {namaservice : Nama dari service yang ingin dibuat}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Buat file service dengan nama yang diberikan di dalam folder Services';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $serviceName = $this->argument('namaservice');
        $servicePath = app_path('Services/' . $serviceName . '.php');
        if (file_exists($servicePath)) {
            $this->error('Service already exists!');
            return;
        }
        $template = str_replace(
            ['{{serviceName}}', '{{namespace}}'],
            [$serviceName, $this->laravel->getNamespace() . 'Services'],
            file_get_contents(__DIR__ . '/stubs/service.stub')
        );
        if (!file_exists(dirname($servicePath))) {
            mkdir(dirname($servicePath), 0755, true);
        }
        file_put_contents($servicePath, $template);
        $this->info('Service created successfully.');
    }
}
