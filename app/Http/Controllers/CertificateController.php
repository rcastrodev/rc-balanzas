<?php

namespace App\Http\Controllers;

use App\Certificate;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class CertificateController extends Controller
{
    public function content()
    {
        $certificates = Certificate::orderBy('order', 'ASC')->get();
        return view('administrator.certificate.content', compact('certificates'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        
        if($request->hasFile('image'))
            $data['image'] = $request->file('image')->store('images/certificate','public');

        if($request->hasFile('content_2'))
            $data['content_2'] = $request->file('content_2')->store('images/certificate','public');

        Certificate::create($data);
        
        return response()->json([], 201);
    }

    public function update(Request $request)
    {
        $element = Certificate::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('public')->exists($element->image))
                Storage::disk('public')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/certificate','public');
        } 
        
        if($request->hasFile('content_2')){
            if(Storage::disk('public')->exists($element->content_2))
                Storage::disk('public')->delete($element->content_2);
            
            $data['content_2'] = $request->file('content_2')->store('images/certificate','public');
        }

        $element->update($data);
    }

    public function find($id)
    {
        $content = Certificate::find($id);
        return response()->json(['content' => $content]);
    }

    public function destroy($id)
    {
        $element = Certificate::find($id);
        
        if(Storage::disk('public')->exists($element->image))
            Storage::disk('public')->delete($element->image);

        if(Storage::disk('public')->exists($element->content_2))
            Storage::disk('public')->delete($element->content_2);

        $element->delete();
        return response()->json([], 200);
    }

    public function descargarCertificado($id)
    {
        $content = Certificate::findOrFail($id);  
        if (Storage::disk('public')->exists($content->content_2)) {
            return Response::download($content->content_2);  
        }else{
            return back();  
        }
    }

    public function getList()
    {
        return DataTables::of(Certificate::orderBy('order', 'ASC'))
        ->addColumn('actions', function($element) {
            $button = '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$element->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$element->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';

            return $button;
        })
        ->rawColumns(['actions', 'image'])
        ->make(true);
    }
}
