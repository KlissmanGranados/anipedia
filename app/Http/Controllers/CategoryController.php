<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/categories",
     *     tags={"categorias"},
     *     @OA\Response(
     *         response=200,
     *         description="Todas las categorias",
     *     ),
     *     @OA\Parameter (
     *         name="page",
     *         in="query",
     *         description="Pagina",
     *         required=false,
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
    public function index(){
        return Category::paginate();
    }

}
