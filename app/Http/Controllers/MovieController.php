<?php

namespace App\Http\Controllers;

use App\MovieModel;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;

/**
 * Class MovieController
 *
 * @package App\Http\Controllers
 */
class MovieController extends Controller
{
    /**
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($id)
    {
        $movies = MovieModel::where('id_user', '=', $id)->get();
    
        if (empty($movies)) {
            $movies = [];
        }
        
        return response()
            ->json([
                'data' => $movies
            ]);
    }
    
    /**
     * @param MovieModel $movie
     *
     * @return MovieModel
     */
    public function show(MovieModel $movie)
    {
        return $movie;
    }
    
    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $response = ['success' => false, 'msg' => 'Ocurrió un error al agregar la película'];
    
        $movie = MovieModel::create($request->all());
    
        if (empty($movie)) {
            return response()
                ->json($response);
        }
    
        $response['success'] = true;
        $response['msg']     = 'Película registrada exitosamente!';
    
        return response()
            ->json($response);
    }
    
    /**
     * @param Request    $request
     * @param MovieModel $movie
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, MovieModel $movie)
    {
        $movie->update($request->all());
        
        return response()->json($movie, 200);
    }
    
    /**
     * @param MovieModel $movie
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(MovieModel $movie)
    {
        $movie->delete();
        
        return response()->json(null, 204);
    }
}
