<?php

namespace App\Http\Controllers;

use SEO;
use App\Car;
use App\Data;
use App\Page;
use App\Client;
use App\Content;
use App\Product;
use App\Service;
use App\Category;
use App\Document;
use App\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class PagesController extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = Data::first();
    }

    public function home()
    {
        $page = Page::where('name', 'home')->first();
        SEO::setTitle('home');
        SEO::setDescription(strip_tags($this->data->description)); 
        $sections   = $page->sections;
        $sliders    = Content::where('section_id', 1)->orderBy('order', 'ASC')->get();
        $mediaAndEquipments = Content::where('section_id', 6)->orderBy('order', 'ASC')->get();
        $clients    = Content::where('section_id', 7)->where('content_2', 1)->orderBy('order', 'ASC')->get();
        $news       = Content::where('section_id', 8)->where('content_5', 1)->orderBy('order', 'ASC')->get();
        $section2   = Content::where('section_id', 2)->first();
        return view('paginas.index', compact('sliders', 'section2', 'mediaAndEquipments', 'clients', 'news'));
    }

    public function empresa()
    {
        SEO::setTitle('empresa');
        $section1 = Content::where('section_id', 3)->first();
        $images = Content::where('section_id', 4)->orderBy('order', 'ASC')->get();
        $section3s = Content::where('section_id', 5)->orderBy('order', 'ASC')->get();
        SEO::setDescription(strip_tags($this->data->description)); 
        return view('paginas.empresa', compact('section1', 'images', 'section3s'));
    }

    public function mediosYEquipos()
    {
        SEO::setTitle('medios y equipos');
        SEO::setDescription(strip_tags($this->data->description)); 
        $mediaAndEquipments = Content::where('section_id', 6)->orderBy('order', 'ASC')->get();
        return view('paginas.medios-y-equipos', compact('mediaAndEquipments'));
    }

    public function clientes()
    {
        SEO::setTitle('clientes');
        SEO::setDescription(strip_tags($this->data->description)); 
        $clients = Content::where('section_id', 7)->orderBy('order', 'ASC')->get();
        return view('paginas.clientes', compact('clients'));
    }

    public function novedades()
    {
        SEO::setTitle('novedades');
        SEO::setDescription(strip_tags($this->data->description)); 
        $news = Content::where('section_id', 8)->orderBy('order', 'ASC')->get();
        return view('paginas.novedades', compact('news'));
    }

    public function novedad($id)
    {
        $new = Content::findOrFail($id);
        SEO::setTitle($new->content_1);
        SEO::setDescription(strip_tags($new->content_3)); 
        return view('paginas.novedad', compact('new'));
    }

    public function presupuesto()
    {
        SEO::setTitle('presupuesto');
        SEO::setDescription(strip_tags($this->data->description)); 
        return view('paginas.presupuesto');
    }

    public function contacto()
    {
        $content = Content::where('section_id', 9)->where('content_1', 'Contacto')->first();
        $page = Page::where('name', 'contacto')->first();
        SEO::setTitle("contacto");
        return view('paginas.contacto', compact('content'));
    }

    public function descargas()
    {
        SEO::setTitle('descargas');
        SEO::setDescription(strip_tags($this->data->description)); 
        $elements = Content::where('section_id', 9)->orderBy('order', 'ASC')->get();
        return view('paginas.descargas', compact('elements'));
    }

    public function certificados()
    {
        SEO::setTitle('certificados');
        SEO::setDescription(strip_tags($this->data->description)); 
    
        $client = Client::find(session('user_id'));
        $certificates = [];
        if ($client) 
            $certificates = $client->certificates;
        
        return view('paginas.certificados', compact('certificates'));
    }
}
