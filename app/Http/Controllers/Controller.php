<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="anipedia API",
 *      description="Servicio publico para obtener datos de algunos animes",
 *      @OA\Contact(
 *          email="granadosklissman@gmail.com"
 *      ),
 *      @OA\License(
 *          name="General Public License",
 *          url="https://raw.githubusercontent.com/KlissmanGranados/licenses/master/GNU"
 *      )
 * )
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Ruta principal"
 * )
 */
class Controller extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
