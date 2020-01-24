<?php


use Phinx\Seed\AbstractSeed;

class GameSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
      $data = [
        [
          'title' => 'グリザイアの果実'
        ],
        [
          'title' => 'グリザイアの迷宮'
        ],
      ];

      $posts = $this->table('games');
      $posts->insert($data)
            ->saveData();

    }
}
