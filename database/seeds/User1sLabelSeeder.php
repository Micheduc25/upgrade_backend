<?php
use App\User1;
use Illuminate\Database\Seeder;

class User1sLabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User1::create([
            'username'=>'rodyl',
            'password'=>'root',
        ]);
    }
}
