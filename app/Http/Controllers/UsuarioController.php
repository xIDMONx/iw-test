<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

/**
 * Class UsuarioController
 *
 * @package App\Http\Controllers
 */
class UsuarioController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $usuarios = [];
        foreach (User::all() as $user) {
            $usuarios[] = [
                'name'      => $user->full_name,
                'email'     => $user->email,
                'telephone' => $user->telephone,
                'password'  => 'password',
            ];
        }
        
        return response()->json([
            'data' => $usuarios,
        ]);
    }
    
    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $response = ['success' => false, 'msg' => 'Ocurrió un error al generar el usuario.'];
        
        $usuario = User::create([
            'name'      => $request->name,
            'last_name' => $request->last_name,
            'age'       => $request->age,
            'telephone' => $request->telephone,
            'email'     => $request->email,
            'password'  => bcrypt('password'),
        ]);
        
        if (empty($usuario)) {
            return response()
                ->json($response);
        }
        
        $response['success'] = true;
        $response['msg']    = 'Usuario creado exitosamente!';
        
        return response()
            ->json($response);
    }
}
