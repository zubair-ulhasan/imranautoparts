<?php
namespace App\Http\Livewire;

use Livewire\Component;

class BarcodeScanner extends Component
{
    public $scannedBarcode = '';

    public function handleBarcodeScan()
    {
        // Perform barcode scanning logic here
        // For example, assume $scannedBarcode is the scanned value
        $this->scannedBarcode = $barcode_scanner ;
        $this->emit('barcode_scanner', $this->scannedBarcode);
    }

    public function render()
    {
        return view('livewire.barcode_scanner');
    }
}
