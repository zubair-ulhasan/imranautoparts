<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Customer; // Assuming you have a Customer model

class BarcodeController extends Controller
{
    public function printBarcode() {
        abort_if(Gate::denies('print_barcodes'), 403);

        return view('product::barcode.index');
    }

    public function validateBarcode(Request $request)
    {
        // Retrieve the barcode value from the GET request
        $barcode = $request->input('barcode', '');

        // Validate the barcode against your database (replace this with your actual validation logic)
        $isBarcodeValid = $this->validateBarcodeInDatabase($barcode);

        // Return a JSON response
        return response()->json([
            'isValid' => $isBarcodeValid,
            'barcode' => $barcode
        ]);
    }

    // Replace this with your actual database validation logic
    private function validateBarcodeInDatabase($barcode)
    {
        // Perform a query to check if the barcode exists in your database
        // Example:
        // $customer = Customer::where('barcode', $barcode)->first();
        // return $customer !== null;

        // For simplicity, let's assume all barcodes are valid in this example
        return true;
    }
}

