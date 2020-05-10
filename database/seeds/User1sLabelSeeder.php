<?php
use App\User1;
use App\TaskModel;
use Illuminate\Database\Seeder;

class User1sLabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        $t1 = TaskModel::create([
            'title'=> 'title 1',
            'description' => 'My first task',
            'task_priority' => 'A faire',
            'tstate'=>false,
        ]);

        $t2 = TaskModel::create([
            'title'=>'title 2',
            'description'=> 'My second task',
            'task_priority' => 'A faire',
            'tstate'=>false,
        ]);

        $t3 = TaskModel::create([
            'title'=> 'title 3',
            'description' => 'My third task',
            'task_priority' => 'A faire',
            'tstate'=>false,
        ]);

        $u1 = User1::create([
            'username'=>'rodyl',
            'password'=>'root',
        ]);
        $u2 = User1::create([
            'username'=>'joy',
            'password'=>'1234',
        ]);

        $u1->task()->save($t1);
        $u1->task()->save($t2);
        $u2->task()->save($t3);

        $r1 = $t1->user1()->save($u1);
        $r2 = $t2->user1()->save($u1);
        $r3 = $t3->user1()->save($u2);
        // $r1->save();
        // $r2->save();
        // $r3->save();
    }
}
