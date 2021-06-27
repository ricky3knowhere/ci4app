<?php
namespace App\Database\Seeds;
use CodeIgniter\I18n\Time;

class PeopleSeeds extends \CodeIgniter\Database\Seeder {
  public function run() {

    $faker = \Faker\Factory::create('id_ID');

    for ($i = 0; $i < 100; $i++) {
      $data = [
        'name' => $faker ->name,
        'address' => $faker ->address,
        'created_at' => Time::createFromTimestamp($faker ->unixTime()),
        'edited_at' => Time::now()
      ];

      $this->db->table('people')->insert($data);
    }

    // Simple Queries
    //$this->db->query("INSERT INTO people (name, address,created_at,edited_at) VALUES(:name:, :address:,:created_at:,:edited_at:)", $data);

    // Using Query Builder

  }
}