<?php

namespace App\Http\Controllers;

abstract class Controller
{
    /**
     * Retorna uma resposta JSON de sucesso.
     *
     * @param  string  $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function successResponse($message)
    {
        return response()->json(['success' => true, 'message' => $message]);
    }

    /**
     * Retorna uma resposta JSON de erro.
     *
     * @param  string  $message
     * @param  int  $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function errorResponse($message, $statusCode = 400)
    {
        return response()->json(['success' => false, 'message' => $message], $statusCode);
    }
}
