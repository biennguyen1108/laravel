<?php
use PHPUnit\Framework\TestCase;
use App\RectangleArea;

class RectangleAreaTest extends TestCase
{
    public function testCalculateArea()
    {
        
        $rectangle = new RectangleArea();

        // Test with valid dimensions
        $this->assertEquals(20, $rectangle->calculateArea(4, 5));
        
        // Test with invalid dimensions (0)
        $this->expectException(Exception::class);
        $rectangle->calculateArea(0, 0);

        // Test with invalid dimensions (negative)
        $this->expectException(Exception::class);
        $rectangle->calculateArea(-2, 3);
    }
}