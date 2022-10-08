<?php

namespace App\Exceptions;

use Exception;

class CityHasBeenTakenException extends Exception
{
    protected $message = 'A city with this name already exists';

    public function render()
    {
        return response()->json([
            'error' => class_basename($this),
            'message' => $this->getMessage(),
        ], 409);
    }
}