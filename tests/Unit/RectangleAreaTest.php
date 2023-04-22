<?php
use PHPUnit\Framework\TestCase;
use App\RectangleArea;

class RectangleAreaTest extends TestCase
{
    public function testCalculateArea()
    {
        
        $rectangle = new RectangleArea();
        // Test with valid dimensions

        $this->assertEquals(23, $rectangle->calculateArea(4, 5));
        
    }
}