<?php

namespace App\Http\Controllers;

use App\Client;
use App\Certificate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class ClientController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('clients');
    }

    public function content()
    {
        $certificates = Certificate::orderBy('order', 'ASC')->get();
        return view('administrator.client.content', compact('certificates'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    public function register(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'email'         => 'required|email:rfc,dns|unique:clients',
            'password'      => 'required|confirmed',
            
        ], [
            'name.required'         => 'Nombre es requerido',
            'email.required'        => 'Email es requerido',
            'email.unique'          => 'Email ya se encuentra refistrado',
            'email.email'           => 'no tiene el formato del email',
            'password.required'     => 'Contraseña es requerida',
            'password.confirmed'     => 'Contraseñas no son iguales',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->input('password'));
        $data['status'] = ($request->has('status')) ? 1 : 0;

        try {
            $client = Client::create($data);

            if ($request->has('certificates')) 
                if($request->input('certificates'))
                    $client->certificates()->attach($request->input('certificates'));

            
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }

        return response()->json([], 201);
        
        
    }

    public function registerAsync(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'email'         => 'required|email:rfc,dns|unique:clients',
            'password'      => 'required',
            
        ], [
            'name.required'         => 'Nombre es requerido',
            'email.required'        => 'Email es requerido',
            'email.unique'          => 'Email ya se encuentra refistrado',
            'email.email'           => 'no tiene el formato del email',
            'password.required'     => 'Contraseña es requerida',
        ]);
        
        $data = $request->all();
        $data['password'] = Hash::make($request->input('password'));
        $data['status'] = 0;
        $client = Client::create($data);
        
        return response()->json([], 201);
    }

    public function certificates($id)
    {
        return response()->json(['certificates_id' => Client::find($id)->certificates()->pluck('certificate_id')]);
    }

    public function update(Request $request)
    {
        $client = Client::find($request->input('id'));

        $request->validate([
            'name'          => 'required',
            'email'         => ['required', 'email:rfc,dns', Rule::unique('clients')->ignore($client)],
            'password'      => 'confirmed',
            
        ], [
            'name.required'         => 'Nombre es requerido',
            'email.required'        => 'Email es requerido',
            'email.email'           => 'no tiene el formato del email',
            'email.unique'          => 'Email ya se encuentra refistrado',
            'password.confirmed'    => 'Contraseñas no son iguales',
        ]);

        $data = $request->all();
        $data['password'] = ($data['password']) ? Hash::make($request->input('password')) : $client->password;
        $data['status'] = ($request->has('status')) ? 1 : 0;
   
        $client->update($data);

        $certificates = $client->certificates;
        if ($request->has('certificates')) {
            if($request->input('certificates')){
                $client->certificates()->wherePivotNotIn('certificate_id', $request->input('certificates'))->detach();
    
                foreach ($request->input('certificates') as $certificates_id) {
                    if(! in_array($certificates_id, $certificates->pluck('id')->toArray()))
                        $client->certificates()->attach($certificates_id);
                }
            }else{
                $client->certificates()->detach();
            }
        }else{
            $client->certificates()->detach();
        }
        
        return response()->json([], 200);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $client = Client::where('email', $request->input('email'))->first();

        if (Auth::guard('clients')->attempt($credentials) && $client->status)
            session(['user_id' => $client->id]);
        else
            return response()->json(['message' => 'Datos no coinciden o usuario deshabilitado', 'status' => 0], 200);

        return response()->json(['status' => 1], 200);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user_id');
        Auth::guard('clients')->logout();
        return back();
    }

    public function find($id)
    {
        $content = Client::find($id);
        return response()->json(['content' => $content]);
    }

    public function destroy($id)
    {
        Client::find($id)->delete();
        return response()->json([], 200);
    }


    public function getList()
    {
        $clients = Client::orderBy('name', 'ASC');
        return DataTables::of($clients)
        ->editColumn('status', function($client) {
            return $client->status ? 'Activado' : 'Desactivado';
        })
        ->addColumn('actions', function($client) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$client->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroyClient('.$client->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions'])
        ->make(true);
    }
}
