<?php

namespace Database\Seeders;

use App\Models\Device;
use Illuminate\Database\Seeder;

class BaseDevicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Device::factory()->createMany([
            [
                'name' => 'Game Boy',
            ],
            [
                'name' => 'Game Boy Color',
            ],
            [
                'name' => 'Game Boy Advance',
            ],
            [
                'name' => 'Game Boy Advance SP',
            ],
            [
                'name' => 'Nintendo DS',
            ],
            [
                'name' => 'Nintendo DS Lite',
            ],
            [
                'name' => 'Nintendo DS XL',
            ],
            [
                'name' => 'Nintendo DSi',
            ],
            [
                'name' => 'Nintendo DSi XL',
            ],
            [
                'name' => 'Nintendo 3DS',
            ],
            [
                'name' => 'Nintendo 3DS XL',
            ],
            [
                'name' => 'New Nintendo 3DS',
            ],
            [
                'name' => 'New Nintendo 3DS XL',
            ],
            [
                'name' => 'Smartphone Android',
            ],
            [
                'name' => 'Smartphone IOS',
            ],
            [
                'name' => 'Nintendo Switch',
            ],
            [
                'name' => 'Nintendo Switch Lite',
            ],
            [
                'name' => 'Nintendo Wii',
            ],
            [
                'name' => 'Nintendo Gamecube',
            ],
            [
                'name' => 'Nintendo 64',
            ],
            [
                'name' => 'Nintendo Wii U',
            ],
            [
                'name' => 'Pokemon Showdown',
            ],
            [
                'name' => 'Pokemon Online',
            ],
            [
                'name' => 'Emulador Android',
            ],
            [
                'name' => 'Emulador DesMuMe',
            ],
            [
                'name' => 'Emulador Dolphin',
            ],
        ]);
    }
}
