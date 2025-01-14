<!doctype html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    @vite('resources/css/app.css')
</head>
<body style="font-family: 'Comic Sans MS',serif">

<div class="overflow-x-auto m-5">
    <table class="min-w-full border-collapse border border-black">
        <thead class="bg-blue-500 text-white">
        <tr class="underline">
            <th class="border border-black px-4 py-2 text-center">ID</th>
            <th class="border border-black px-4 py-2 text-center">Item</th>
            <th class="border border-black px-4 py-2 text-center">QTY</th>
            <th class="border border-black px-4 py-2 text-center">UNIT PRICE</th>
            <th class="border border-black px-4 py-2 text-center">Discount</th>
            <th class="border border-black px-4 py-2 text-center">AMOUNT</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($items as $item)
        <tr class="bg-white">
            <td class="border border-black px-4 py-2 text-center">{{ $item['ID'] }}</td>
            <td class="border border-black px-4 py-2 text-center">{{ $item['name'] }}</td>
            <td class="border border-black px-4 py-2 text-center">{{ $item['qty'] }}</td>
            <td class="border border-black px-4 py-2">
                <div class="flex justify-between">
                    <span>$</span>
                    <span>{{ number_format($item['unitPrice'], 2) }}</span>
                </div>
            </td>
            <td class="border border-black px-4 py-2 text-center">{{ $item['discount'] }}%</td>
            <td class="border border-black px-4 py-2">
                <div class="flex justify-between">
                    <span>$</span>
                    <span>{{ number_format($item['qty'] * $item['unitPrice'] * (1 - $item['discount'] / 100), 2) }}</span>
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
        <tfoot class="text-end">
        @php
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

        $taxRate = 0.05; // 5%
        $tax = $subtotal * $taxRate;
        $total = $subtotal + $tax;
        @endphp
        <tr>
            <td colspan="3" class="border border-black text-center font-bold text-black bg-blue-500">Thank you for your business!</td>
            <td class="border border-black px-4 py-2 text-right font-semibold" colspan="2">Subtotal</td>
            <td class="border border-black px-4 py-2">
                <div class="flex justify-between">
                    <span>$</span>
                    <span>{{ number_format($subtotal, 2) }}</span>
                </div>
            </td>

        </tr>
        <tr>
            <td colspan="2" class="border border-black text-end font-bold">Max Price</td>
            <td class="border border-black px-4 py-2">
                <div class="flex justify-between">
                    <span>$</span>
                    <span>{{ number_format($maxPrice, 2) }}</span>
                </div>
            </td>
            <td class="border border-black px-4 py-2 text-right font-semibold" colspan="2">TAX RATE</td>
            <td class="border border-black px-4 py-2 font-bold">5.00%</td>
        </tr>
        <tr>
            <td colspan="2" class="border border-black text-end font-bold">Min Price</td>
            <td class="border border-black px-4 py-2">
                <div class="flex justify-between">
                    <span>$</span>
                    <span>{{ number_format($minPrice, 2) }}</span>
                </div>
            </td>
            <td class="border border-black px-4 py-2 text-right font-semibold" colspan="2">TAX</td>
            <td class="border border-black px-4 py-2">
                <div class="flex justify-between">
                    <span>$</span>
                    <span>{{ number_format($tax, 2) }}</span>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="border border-black text-end font-bold">Total Price</td>
            <td class="border border-black px-4 py-2">
                <div class="flex justify-between">
                    <span>$</span>
                    <span>{{ number_format($subtotal, 2) }}</span>
                </div>
            </td>
            <td class="border border-black px-4 py-2 text-right text-blue-600 font-bold" colspan="2">TOTAL</td>
            <td class="border border-black px-4 py-2">
                <div class="flex justify-between">
                    <span>$</span>
                    <span>{{ number_format($total, 2) }}</span>
                </div>
            </td>
        </tr>
        </tfoot>
    </table>
</div>
</body>
</html>
