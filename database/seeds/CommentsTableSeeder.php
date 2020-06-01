<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $texts = ['コメント１', 'コメント2', 'コメント3'];
      foreach ($texts as $text) {
        DB::table('comments')->insert([
          'thread_id' => 1,
          'name' => '匿名',
          'text' => $text,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
        ]);
      }
    }
}
