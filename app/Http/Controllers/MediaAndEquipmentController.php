<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class MediaAndEquipmentController extends Controller
{
    public function content()
    {
        return view('administrator.media-and-equipment.content');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        
        if($request->hasFile('image'))
            $data['image'] = $request->file('image')->store('images/media-and-equipment','public');

        Content::create($data);
        
        return back()->with('mensaje', 'Creado con exito');
    }

    public function update(Request $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('public')->exists($element->image))
                Storage::disk('public')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/media-and-equipment','public');
        }   

        $element->update($data);
        return back()->with('mensaje', 'Actualizado con exito');
    }

    public function find($id)
    {
        $content = Content::find($id);
        return response()->json(['content' => $content]);
    }

    public function destroy($id)
    {
        $element = Content::find($id);
        
        if(Storage::disk('public')->exists($element->image))
            Storage::disk('public')->delete($element->image);

        $element->delete();
        return response()->json([], 200);
    }


    public function getList()
    {
        return DataTables::of(Content::where('section_id', '6')->orderBy('order', 'ASC'))
        ->editColumn('image', function($slider){
            return '<img src="'.asset($slider->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->addColumn('actions', function($element) {
            $button = '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$element->id.')"></button>';

            if ($element->name != 'Cat??logo') {
                $button.= '<button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$element->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
            }

            return $button;
        })
        ->rawColumns(['actions', 'content_2', 'image'])
        ->make(true);
    }
}
