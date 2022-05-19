<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;

class AnimeController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/v1/animes/{id}",
     *     tags={"animes"},
     *     @OA\Response(
     *         response=200,
     *         description="Selecciona un anime y muestra sus detalles."
     *     ),
     *     @OA\Parameter (
     *         name="id",
     *         in="path",
     *         description="Id del anime",
     *         required=true,
     *         @OA\Schema(
     *          type="integer"
     *         )
     *    ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function show(Anime $anime){
        $anime->categories;
        return $anime;
    }

    /**
     * @OA\Get(
     *     path="/api/v1/animes/query/by",
     *     tags={"animes"},
     *     @OA\Response(
     *         response=200,
     *         description="Filtro general de animes."
     *     ),
     *     @OA\Parameter (
     *         name="title",
     *         in="query",
     *         description="Titulo del anime",
     *         required=false,
     *         @OA\Schema(
     *          type="String"
     *         )
     *    ),
     *     @OA\Parameter (
     *         name="categories_id",
     *         in="query",
     *         description="ids de categorias, si son varios separarlos por coma",
     *         required=false,
     *         @OA\Schema(
     *          type="String"
     *         )
     *    ),
     *     @OA\Parameter (
     *         name="page",
     *         in="query",
     *         description="pagina a mostrar",
     *         required=false,
     *         @OA\Schema(
     *          type="Integer"
     *         )
     *    ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function findBy(Request $request){
        $anime = Anime::query();

        if(!$request->has('categories_id') && !$request->has('title')){
           return $anime->paginate();
        }

        $anime->select('animes.*');

        if($request->has('categories_id')){

            explode(',', $request->categories_id);

            $categories = $request->categories_id;
            $categories = explode(',', $categories);
            $isJoin = false;
            foreach ($categories as $category) {
                if(is_numeric($category)){
                    if(!$isJoin) {
                        $anime->join('categories_has_animes',
                            'categories_has_animes.animes_id',
                            'animes.id');
                        $isJoin = true;
                    }
                    $anime->orWhere('categories_has_animes.categories_id', $category);
                }
            }
        }

        if($request->has('title')){
            $anime->where('animes.title', 'like', '%'.strtolower($request->title).'%');
        }

        $anime->groupBy('animes.id');

        return $anime->paginate();
    }
}
