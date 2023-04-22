<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculationController extends Controller
{
    public function index()
    {
        return view('calculation.index');
    }

    public function calculate(Request $request)
    {
        $firstNumber = $request->input('firstNumber');
        $secondNumber = $request->input('secondNumber');
        $operator = $request->input('operator');

        switch ($operator) {
            case '+':
                $result = $firstNumber + $secondNumber;
                break;
            case '-':
                $result = $firstNumber - $secondNumber;
                break;
            case '*':
                $result = $firstNumber * $secondNumber;
                break;
            case '/':
                $result = $firstNumber / $secondNumber;
                break;
            default:
                $result = '';
                break;
        }

        return view('calculation.index', [
            'result' => $result,]);
    }
}
