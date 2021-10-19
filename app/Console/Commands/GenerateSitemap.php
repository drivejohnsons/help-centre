<?php

namespace App\Console\Commands;

use App\Support\Facades\HelpCentreFacade;
use Illuminate\Console\Command;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates the help centre sitemap.';

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
     * @return int
     */
    public function handle(): int
    {
        $sitemap = HelpCentreFacade::generateSitemap();

        $sitemap->writeToFile(public_path('sitemap.xml'));

        return 0;
    }
}
