<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{
    public function apiException($request, $exception)
    {
        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'errors' => 'Model not found'
            ], Response::HTTP_NOT_FOUND);
        }

        if ($exception instanceof NotFoundHttpException) {
            return response()->json([
                'errors' => 'Url not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return parent::render($request, $exception);
    }
}

