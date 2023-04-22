<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TamgiacController extends Controller
{
    public function area()
    {
        return view('calculation.tamgiac');
    }

    public function tamgiac(Request $request)
    {
        $firstNumber = $request->input('firstNumber');
        $secondNumber = $request->input('secondNumber');
        $result = $firstNumber * $secondNumber * 0.5 ;

        return view('calculation.tamgiac', [
            'result' => $result,]);
    }
    public function tugiac(Request $request){
        $a = $request -> input ('A');
        $b = $request -> input ('b');
        $c = $request -> input ('c');
        $d = $request -> input ('d');
        $result1 = $a + $b + $c + $d;
        
        return view('caculation.tamgiac',[
            'result1' => $result1,
        ]);

    }
}
