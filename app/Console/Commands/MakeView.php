<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeView extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:view properties.index';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Créer une nouvelle vue Blade avec un template par défaut';

    /**
     * filesystem instance
     * 
     * @var Filesystem
     */
    protected $files;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->files = new Filesystem();
    }


    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $path = resource_path('views/' . str_replace('.', '/', $name) . '.blade.php');


        if ($this->files->exists($path)) {
            $this->error('La vue {$name} existe déjà.');
            return 1;
        }

        // create the directory if we need to
        $dir = dirname($path);
        if (!$this->files->isDirectory($dir)) {
            $this->files->makeDirectory($dir, 0755, true);
        }

        $template = <<<'EOT'
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('$name') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <p>Hello $name</p>
            </div>
        </div>
    </div>
</x-app-layout>
EOT;

        $this->files->put($path, $template);

        $this->info('La vue {$name} a été créée avec succès.');
        return 0;
    }
}