<?php
namespace App;
use Exception;
class RectangleArea
{
    public function calculateArea($width, $height)
    {
        if ($width <= 0 || $height <= 0) {
            throw new Exception("Invalid rectangle dimensions");
        }

        return $width * $height;
    }
}