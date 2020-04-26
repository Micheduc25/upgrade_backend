<?php
use App\TaskModel;
use Illuminate\Database\Seeder;

class TasksLabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaskModel::create([
            'title'=>'My first task',
        ]);
    }
}
