<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class uploadToCloud extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'uploadToCloud';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upload local file to cloud';

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
        $users = User::get();
        
        for ($i=0; $i < count($users); $i++) { 
            $fileName = $users[$i]->image;
            $url = url(Storage::url($fileName));
            $contents = file_get_contents($url);
            Storage::disk('s3')->put($fileName,$contents);
            User::whereId($users[$i]->id)->update([
                'url' => Storage::disk('s3')->url($fileName)
            ]);
        }
    }
}
