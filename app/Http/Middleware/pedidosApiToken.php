<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class pedidosApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //creando nuestra propia llave API-KEY
        $apiKey = env('PEDIDOS_API_KEY');
        //comprobando si se ha enviado la llave API-KEY en el encabezado de la petición
        if(!$request->header('Pedidos-KEY') || $request->header('Pedidos-KEY') !== $apiKey){
            return response()->json(['error' => 'No se ha enviado la llave API-KEY'], 401);
        }
        //si la llave API-KEY es correcta, pasamos al siguiente middleware o controlador de la petición
        return $next($request);
    }
}
