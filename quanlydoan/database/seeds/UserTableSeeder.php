<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('user')->insert([
            array('username'=>'20152023','password'=>bcrypt('20152023'),'position'=>'1','full_name'=>'Ha Dinh Khoe','email'=>'hadinhkhoe@gmail.com','phone'=>'0388446430'),
            array('username'=>'20152408','password'=>bcrypt('20152408'),'position'=>'1','full_name'=>'Pham Cong Manh','email'=>'hadinhkhoe@gmail.com','phone'=>'0388446430'),
            array('username'=>'GV000001','password'=>bcrypt('GV000001'),'position'=>'2','full_name'=>'Tran Dinh Khang','email'=>'khangtd@gmail.com','phone'=>'0388446430'),
            array('username'=>'admin','password'=>bcrypt('admin'),'position'=>'3','full_name'=>'Admin','email'=>'admin@gmail.com','phone'=>'0388446430'),
            array('username'=>'20151566','password'=>bcrypt('20151566'),'position'=>'1','full_name'=>'Pham Huy Hoang','email'=>'hadinhkhoe@gmail.com','phone'=>'0388446430'),
            array('username'=>'20152128','password'=>bcrypt('20152128'),'position'=>'1','full_name'=>'Nguyen Quoc Lam','email'=>'hadinhkhoe@gmail.com','phone'=>'0388446430')
        ]);
              
        DB::table('student')->insert([
            array('username'=>'20152023','class'=>'CNTT2.01'),
            array('username'=>'20152408','class'=>'CNTT2.04'),
            array('username'=>'20151566','class'=>'CNTT2.01'),
            array('username'=>'20152128','class'=>'CNTT2.01')
        ]);

        DB::table('teacher')->insert([
            array('username'=>'GV000001','workplace'=>'B1-702')
        ]);

        DB::table('subject')->insert([
            array('subject_name'=>'IT4421'),
            array('subject_name'=>'Khac')
        ]);

        DB::table('group')->insert([
            array('id_subject'=>'1','id_teacher'=>'1','group_name'=>'Do an','project_name'=>'QLDA','semester'=>'20181','finish_project'=>'0'),
        ]);

        DB::table('group_student')->insert([
            array('id_group'=>'1','id_student'=>'1'),
            array('id_group'=>'1','id_student'=>'2'),
            array('id_group'=>'1','id_student'=>'3'),
            array('id_group'=>'1','id_student'=>'4'),
        ]);
    }
}
