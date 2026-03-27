<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ROLS
        DB::table('rols')->insert([
            ['name' => 'Admin'],
            ['name' => 'Guard'],
        ]);

        // USERS
        DB::table('users')->insert([
            [
                'name'       => 'Carlos Ramirez',
                'id_number'  => '1020304050',
                'email'      => 'carlos@prison.com', 
                'password'   => Hash::make('password123'),
                'rol_id'     => 1,
                'state'      => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Maria Lopez',
                'id_number'  => '2030405060',
                'email'      => 'maria@prison.com', 
                'password'   => Hash::make('password123'),
                'rol_id'     => 2,
                'state'      => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Jorge Perez',
                'id_number'  => '3040506070',
                'email'      => 'jorge@prison.com', 
                'password'   => Hash::make('password123'),
                'rol_id'     => 2,
                'state'      => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Ana Gomez',
                'id_number'  => '4050607080',
                'email'      => 'ana@prison.com', 
                'password'   => Hash::make('password123'),
                'rol_id'     => 1,
                'state'      => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // PRISONERS
        DB::table('prisoners')->insert([
            [
                'name'            => 'Luis Herrera',
                'birth_date'      => '1985-03-15',
                'entry_datetime'  => '2020-06-01 08:00:00',
                'crime'           => 'Robbery',
                'cell'            => 'A-101',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'name'            => 'Pedro Castillo',
                'birth_date'      => '1990-07-22',
                'entry_datetime'  => '2021-02-14 10:30:00',
                'crime'           => 'Fraud',
                'cell'            => 'B-205',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'name'            => 'Ricardo Mora',
                'birth_date'      => '1978-11-05',
                'entry_datetime'  => '2019-09-20 14:00:00',
                'crime'           => 'Assault',
                'cell'            => 'C-310',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'name'            => 'Andres Silva',
                'birth_date'      => '1995-01-30',
                'entry_datetime'  => '2022-11-05 09:15:00',
                'crime'           => 'Drug trafficking',
                'cell'            => 'A-102',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
        ]);

        // VISITORS
        DB::table('visitors')->insert([
            [
                'name'                    => 'Sandra Herrera',
                'id_number'               => '5060708090',
                'relationship_to_prisoner' => 'Sister',
                'created_at'              => now(),
                'updated_at'              => now(),
            ],
            [
                'name'                    => 'Camila Castillo',
                'id_number'               => '6070809010',
                'relationship_to_prisoner' => 'Wife',
                'created_at'              => now(),
                'updated_at'              => now(),
            ],
            [
                'name'                    => 'Tomas Mora',
                'id_number'               => '7080901020',
                'relationship_to_prisoner' => 'Brother',
                'created_at'              => now(),
                'updated_at'              => now(),
            ],
            [
                'name'                    => 'Elena Silva',
                'id_number'               => '8090102030',
                'relationship_to_prisoner' => 'Mother',
                'created_at'              => now(),
                'updated_at'              => now(),
            ],
        ]);

        // VISITS
        DB::table('visits')->insert([
            [
                'date'        => '2024-01-10',
                'start_time'  => '09:00:00',
                'end_time'    => '10:00:00',
                'prisoner_id' => 1,
                'visitor_id'  => 1,
                'user_id'     => 2,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'date'        => '2024-01-15',
                'start_time'  => '11:00:00',
                'end_time'    => '12:00:00',
                'prisoner_id' => 2,
                'visitor_id'  => 2,
                'user_id'     => 2,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'date'        => '2024-02-03',
                'start_time'  => '14:00:00',
                'end_time'    => '15:00:00',
                'prisoner_id' => 3,
                'visitor_id'  => 3,
                'user_id'     => 3,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'date'        => '2024-02-20',
                'start_time'  => '16:00:00',
                'end_time'    => '17:00:00',
                'prisoner_id' => 4,
                'visitor_id'  => 4,
                'user_id'     => 3,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);

        // GUARD SESSIONS
        DB::table('guard_sessions')->insert([
            [
                'start_datetime' => '2024-01-10 07:00:00',
                'user_id'        => 2,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'start_datetime' => '2024-01-15 07:00:00',
                'user_id'        => 2,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'start_datetime' => '2024-02-03 07:00:00',
                'user_id'        => 3,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'start_datetime' => '2024-02-20 07:00:00',
                'user_id'        => 3,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
        ]);
    }
}
