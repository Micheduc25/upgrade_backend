<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User1;
use App\TaskModel;

class createUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cu';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create some user';

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
        $user = User1::find(46);
        $user->role = "super_administrator";
        $user->save();
        // $users = User1::all();

        // foreach($users as $user){
        //     $user = User1::findOrfail($user->id);
        //     $user->role = "user";
        //     $user->save();
        // }

        echo "Fin de la commande.\n";
    }
}
