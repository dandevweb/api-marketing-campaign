<?php

namespace App\Exceptions;

use Exception;

class DiscountHasBeenTakenException extends Exception
{
    protected $message = 'A discount with this name already exists';

    public function render()
    {
        return response()->json([
            'error' => class_basename($this),
            'message' => $this->getMessage(),
        ], 409);
    }
}