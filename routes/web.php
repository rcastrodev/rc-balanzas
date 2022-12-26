<?php

use App\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/', 'PagesController@home')->name('index');
Route::get('/empresa', 'PagesController@empresa')->name('empresa');
Route::get('/medios-y-equipos', 'PagesController@mediosYEquipos')->name('medios-y-equipos');
Route::get('/clientes', 'PagesController@clientes')->name('clientes');
Route::get('/novedades', 'PagesController@novedades')->name('novedades');
Route::get('/novedad/{id}', 'PagesController@novedad')->name('novedad');
Route::get('/presupuesto', 'PagesController@presupuesto')->name('presupuesto');
Route::get('/contacto', 'PagesController@contacto')->name('contacto');
Route::post('enviar-contacto', 'MailController@contact')->name('send-contact');
Route::get('/descargar-archivo/{id}/{reg}', 'ContentController@descargarArchivo')->name('descargar-archivo');
Route::get('/descargar-certificado/{id}', 'CertificateController@descargarCertificado')->name('descargar-certificado');
Route::post('cliente/authenticate', 'ClientController@authenticate')->name('client.authenticate');
Route::post('cliente/register-async', 'ClientController@registerAsync')->name('client.register-async');
Route::get('cliente/logout', 'ClientController@logout')->name('client.logout');
Route::post('enviar-cotizacion', 'MailController@quote')->name('send-quote');

Route::middleware(['client'])->group(function () {
    Route::get('/descargas', 'PagesController@descargas')->name('descargas');
    Route::get('/certificados', 'PagesController@certificados')->name('certificados');
});

Route::middleware('auth')->prefix('admin')->group(function () {
    /** Page Home */
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('home/content', 'HomeController@content')->name('home.content');
    Route::post('home/content/generic-section/store', 'HomeController@store')->name('home.content.store');
    Route::post('home/content/generic-section/update', 'HomeController@update')->name('home.content.update');
    Route::post('home/content/update', 'HomeController@updateSection')->name('home.content.update-section');
    Route::delete('home/content/{id}', 'HomeController@destroy')->name('home.content.destroy');
    Route::get('home/content/slider/get-list', 'HomeController@sliderGetList')->name('home.slider.get-list');
    /** Fin home*/

    /** Page Company */
    Route::get('company/content', 'CompanyController@content')->name('company.content');
    Route::post('company/content/store-slider', 'CompanyController@storeSlider')->name('company.content.storeSlider');
    Route::post('company/content/update-slider', 'CompanyController@updateSlider')->name('company.content.updateSlider');
    Route::post('company/qualities/store', 'CompanyController@createInfo')->name('company.info.store');
    Route::post('company/content/update-info', 'CompanyController@updateInfo')->name('company.content.updateInfo');
    Route::post('company/content/generic-section/update', 'CompanyController@updateHomeGenericSection')->name('company.content.generic-section.update');
    Route::delete('company/content/{id}', 'CompanyController@destroySlider')->name('company.content.destroy');
    Route::get('company/content/slider/get-list', 'CompanyController@sliderGetList')->name('company.slider.get-list');
    Route::get('company/content/service/get-list', 'CompanyController@serviceGetList')->name('company.service.get-list');
    /** Fin company*/

    /** Media and equipment */
    Route::get('media-and-equipment/content', 'MediaAndEquipmentController@content')->name('media-and-equipment.content');
    Route::post('media-and-equipment/content/store', 'MediaAndEquipmentController@store')->name('media-and-equipment.content.store');
    Route::post('media-and-equipment/content', 'MediaAndEquipmentController@update')->name('media-and-equipment.content.update');
    Route::get('media-and-equipment/content/find/{id?}', 'MediaAndEquipmentController@find')->name('media-and-equipment.content.find');
    Route::delete('media-and-equipment/content/{id}', 'MediaAndEquipmentController@destroy')->name('media-and-equipment.content.destroy');
    Route::get('media-and-equipment/content/get-list', 'MediaAndEquipmentController@getList');
    /** Media and equipment */

    /** Page Brand */
    Route::get('brand/content', 'BrandController@content')->name('brand.content');
    Route::post('brand/content/generic-section/store', 'BrandController@store')->name('brand.content.store');
    Route::post('brand/content/generic-section/update', 'BrandController@update')->name('brand.content.update');
    Route::post('brand/content/update', 'BrandController@updateSection')->name('brand.content.update-section');
    Route::delete('brand/content/{id}', 'BrandController@destroy')->name('brand.content.destroy');
    Route::get('brand/content/slider/get-list', 'BrandController@sliderGetList')->name('brand.slider.get-list');
    /** Fin Brand*/

    /** Page News */
    Route::get('news/content', 'NewsController@content')->name('news.content');
    Route::post('news/create', 'NewsController@createInfo')->name('news.content.createInfo');
    Route::post('news/content/update-info', 'NewsController@updateInfo')->name('news.content.updateInfo');
    Route::delete('news/content/{id}', 'NewsController@destroySlider')->name('news.content.destroy');
    Route::get('news/content/slider/get-list', 'NewsController@sliderGetList')->name('news.slider.get-list');
    /** Fin News*/

    /** price Download */
    Route::get('download/content', 'DownloadController@content')->name('download.content');
    Route::post('download/content/store', 'DownloadController@store')->name('download.content.store');
    Route::post('download/content', 'DownloadController@update')->name('download.content.update');
    Route::get('download/content/find/{id?}', 'DownloadController@find')->name('download.content.find');
    Route::delete('download/content/{id}', 'DownloadController@destroy')->name('download.content.destroy');
    Route::get('download/content/get-list', 'DownloadController@getList');
    /** Fin Download*/

    /** price Certificate */
    Route::get('certificate/content', 'CertificateController@content')->name('certificate.content');
    Route::post('certificate/content/store', 'CertificateController@store')->name('certificate.content.store');
    Route::post('certificate/content', 'CertificateController@update')->name('certificate.content.update');
    Route::get('certificate/content/find/{id?}', 'CertificateController@find')->name('certificate.content.find');
    Route::delete('certificate/content/{id}', 'CertificateController@destroy')->name('certificate.content.destroy');
    Route::get('certificate/content/get-list', 'CertificateController@getList');
    /** Fin Certificate*/

    Route::get('client/content', 'ClientController@content')->name('client.content');
    Route::post('client/register', 'ClientController@register')->name('client.content.store');
    Route::post('client/update', 'ClientController@update')->name('client.content.update');
    Route::get('client/find/{id?}', 'ClientController@find')->name('client.content.find');
    Route::post('client/content/{id}', 'ClientController@destroy')->name('client.content.destroy');
    Route::get('client/content/certificates/{id}', 'ClientController@certificates')->name('client.content.certificates');
    Route::get('client/content/get-list', 'ClientController@getList');

    /** Page newsletter */
    Route::get('newsletter/content', 'NewsLetterController@content')->name('newsletter.content');
    Route::get('newsletter/content/get-list', 'NewsLetterController@getList')->name('newsletter.content.get-list');
    Route::delete('newsletter/content/{id}', 'NewsLetterController@destroy')->name('newsletter.content.destroy');
    /** Fin newsletter*/

    /** Page company */
    Route::get('data/content', 'DataController@content')->name('data.content');
    Route::put('data/content', 'DataController@update')->name('data.content.update');
    /** Fin company*/

    Route::get('page/content', 'AdminPageController@content')->name('page.content');
    Route::put('page/content', 'AdminPageController@update')->name('page.content.update');

    Route::get('content/', 'ContentController@content')->name('content');
    Route::get('content/{id}', 'ContentController@findContent');
    Route::post('content/hero-update', 'ContentController@heroUpdate')->name('content.hero-update');
    Route::post('content/image/{id}/{reg}', 'ContentController@destroyImage')->name('content.destroy-image');

    Route::get('user/get-list', 'UserController@getList')->name('user.get-list');
    Route::resource('user', 'UserController');
});
