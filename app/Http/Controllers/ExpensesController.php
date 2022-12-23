<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpensesController extends Controller
{

    public function floordec($zahl, $decimals = 2)
    {
        return floor($zahl * pow(10, $decimals)) / pow(10, $decimals);
    }

    public function index(Request $request)
    {
        $request->validate(
            [
                'expense.*' => 'required',
                'amount.*' => 'required|regex:/^\d+(\.\d{1,2})?$/'
            ],
            [
                'expense.*.required' => 'Please enter expense name',
                'amount.*.required' => 'Please enter amount',
                'amount.*.regex' => 'Amount format is 00.00'
            ]
        );
        if (fmod($request->amount[0], 2) != 0) {
            $driverExpensis1[0] = round(($request->amount[0] / 2), 2);
            $driverExpensis2[0] = $this->floordec(($request->amount[0] / 2));
        } else {
            $driverExpensis1[0] = $request->amount[0] / 2;
            $driverExpensis2[0] = $request->amount[0] / 2;
        }

        for ($i = 1; $i < count($request->amount); $i++) {
            if ($driverExpensis1[$i - 1] <= $driverExpensis2[$i - 1] && fmod($request->amount[$i], 2) != 0) {
                $driverExpensis1[$i] = round(($request->amount[$i] / 2), 2);
                $driverExpensis2[$i] = $this->floordec(($request->amount[$i] / 2));
            }

            if ($driverExpensis1[$i - 1] > $driverExpensis2[$i - 1] && fmod($request->amount[$i], 2) != 0) {
                $driverExpensis1[$i] = $this->floordec(($request->amount[$i] / 2));
                $driverExpensis2[$i] = round(($request->amount[$i] / 2), 2);
            }
            if (fmod($request->amount[$i], 2) == 0) {
                $driverExpensis1[$i] = $request->amount[$i] / 2;
                $driverExpensis2[$i] = $request->amount[$i] / 2;
            }
        }
        $totalDrv1 = array_sum($driverExpensis1);
        $totalDrv2 = array_sum($driverExpensis2);

        return view('home', compact('driverExpensis1', 'driverExpensis2', 'totalDrv1', 'totalDrv2', 'request'));
    }
}
