<?php

use App\Page;
use App\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Home */
        Section::create(['page_id' => Page::where('name', 'home')->first()->id, 'name' => 'section_1']);
        Section::create(['page_id' => Page::where('name', 'home')->first()->id, 'name' => 'section_2']);

        /** Empresa */
        Section::create(['page_id' => Page::where('name', 'empresa')->first()->id, 'name' => 'section_1']);
        Section::create(['page_id' => Page::where('name', 'empresa')->first()->id, 'name' => 'section_2']);
        Section::create(['page_id' => Page::where('name', 'empresa')->first()->id, 'name' => 'section_3']);

        /** Medios y equipos */
        Section::create(['page_id' => Page::where('name', 'medios y equipos')->first()->id, 'name' => 'section_1']);

        /** clientes */
        Section::create(['page_id' => Page::where('name', 'clientes')->first()->id, 'name' => 'section_1']);

        /** novedades */
        Section::create(['page_id' => Page::where('name', 'novedades')->first()->id, 'name' => 'section_1']);

        /** descargas */
        Section::create(['page_id' => Page::where('name', 'descargas')->first()->id, 'name' => 'section_1']);

        /** certificados */
        Section::create(['page_id' => Page::where('name', 'certificados')->first()->id, 'name' => 'section_1']);
    }
}
