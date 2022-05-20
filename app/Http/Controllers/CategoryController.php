<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;

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
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function index(){
        return Cache::rememberForever('categories', function(){
            return Category::all();
        });
    }

}
