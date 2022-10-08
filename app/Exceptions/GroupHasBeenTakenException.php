<?php

namespace App\Exceptions;

use Exception;

class GroupHasBeenTakenException extends Exception
{
    protected $message = 'A group with this name already exists';

    public function render()
    {
        return response()->json([
            'error' => class_basename($this),
            'message' => $this->getMessage(),
        ], 409);
    }
}