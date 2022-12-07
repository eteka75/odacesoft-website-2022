<?php

namespace App\Console\Commands;

use App\Providers\AppServiceProvider;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;

class versionflush extends Command
{
       /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inertia:version-flush';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a unique Inertia version for this build based on the public/mix-manifest.json file.';

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
    public function handle()
    {
        $mixManifestFile = public_path('mix-manifest.json');

        // check if the mix manifest exists
        if(!File::exists($mixManifestFile)) {
            $this->error("Mix manifest cannot be found at `{$mixManifestFile}`.");
            return;
        }

        // generate the md5 hash of the file
        $inertiaVersionHash = md5_file($mixManifestFile);

        // store the md5 hash as a new Inertia version
        Cache::put(AppServiceProvider::getInertiaVersionCacheKey(), $inertiaVersionHash);
    }
}
