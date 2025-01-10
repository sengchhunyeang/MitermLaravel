<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Midterm_controller extends Controller
{
     // This method returns the 'midterm' view without passing any data
    public function showMidterm(){
        // The 'midterm' view is loaded when the showMidterm method is called.
        return view('midterm');
    }
    // This method prepares some data (items) and passes it to the 'midterm' view.
    public function passingData(){
        $items = [
            [
                'ID' => 1,
                'name' => 'Mouse',
                'qty' => 20,
                'unitPrice' => 10.00,
                'discount' => 7,
            ],
            [
                'ID' => 2,
                'name' => 'Keyboard',
                'qty' => 12,
                'unitPrice' => 20.00,
                'discount' => 7,
            ],
            [
                'ID' => 3,
                'name' => 'Monitor',
                'qty' => 13,
                'unitPrice' => 25.00,
                'discount' => 7,
            ],
            [
                'ID' => 4,
                'name' => 'USB Flash',
                'qty' => 8,
                'unitPrice' => 15.00,
                'discount' => 7,
            ],
            [
                'ID' => 5,
                'name' => 'SSD Hard Disk',
                'qty' => 9,
                'unitPrice' => 50.00,
                'discount' => 7,
            ],
            [
                'ID' => 6,
                'name' => 'Network Cable',
                'qty' => 12,
                'unitPrice' => 3.00,
                'discount' => 7,
            ],
        ];

        // Passing the $items array to the 'midterm' view using the compact function
        return view('midterm', compact('items'));
    }
    //        $id="1";
//        $mouse = "Mouse";
//        $qty= 20;
//        $unitPrice= 10.00;
//        $discount=7;
//        return view('midterm', compact('id', 'mouse', 'qty', 'unitPrice', 'discount'));
}
