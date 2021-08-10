<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = new Status();
        $status->name = 'dang hoat dong';
        $status->save();

        $status = new Status();
        $status->name = 'ngung hoat dong';
        $status->save();
    }
}
