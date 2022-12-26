<?php

use App\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create(['name' => 'home']);
        Page::create(['name' => 'empresa']);
        Page::create(['name' => 'medios y equipos']);
        Page::create(['name' => 'clientes']);
        Page::create(['name' => 'novedades']);
        Page::create(['name' => 'descargas']);
        Page::create(['name' => 'certificados']);
    }
}
