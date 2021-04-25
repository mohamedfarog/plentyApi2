<?php

namespace Database\Seeders;

use App\Models\Shop;
use App\Models\Tablesched;
use Illuminate\Database\Seeder;

class TableschedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $shops = Shop::where('cat_id', 1)->get();
        foreach ($shops as $shop) {
            foreach ($days as $day) {
                Tablesched::create(['day' => $day, 'seating_time' => 30, 'shop_id' => $shop->id, 'opening' => "10:00:00 AM", 'closing' => '10:00:00 PM']);
            }
        }
    }
}
