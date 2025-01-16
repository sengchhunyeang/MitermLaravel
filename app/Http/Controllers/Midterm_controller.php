<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Midterm_controller extends Controller
{
    // This method returns the 'midterm' view without passing any data
    public function showMidterm(){
        // You can still return the view without passing any data
        return view('midterm');
    }

    // This method prepares some data (items) and passes it to the 'midterm' view
    public function passingData(){
        // Data for items
        $items = [
            [
                'ID' => 1,
                'name' => 'Mouse',
                'qty' => 20,
                'unitPrice' => 10.00,
                'discount' => 7,
            ],
            [
        git        'ID' => 2,
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

        // Calculate subtotal, max price, min price, tax, and total
        $subtotal = 0;
        $maxPrice = PHP_INT_MIN;
        $minPrice = PHP_INT_MAX;

        foreach ($items as $item) {
            $amount = $item['qty'] * $item['unitPrice'] * (1 - $item['discount'] / 100);
            $subtotal += $amount;

            // Update max and min price
            $maxPrice = max($maxPrice, $item['unitPrice']);
            $minPrice = min($minPrice, $item['unitPrice']);
        }

        // Tax rate and total calculation
        $taxRate = 0.05; // 5%
        $tax = $subtotal * $taxRate;
        $total = $subtotal + $tax;

        // Passing data to the 'midterm' view
        return view('midterm', compact('items', 'subtotal', 'maxPrice', 'minPrice', 'taxRate', 'tax', 'total'));
    }
}
