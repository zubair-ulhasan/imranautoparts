<div class="position-relative">
    <div class="card mb-0 border-0 shadow-sm">
        <div class="card-body">
            <div class="form-group mb-0">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text" onclick="openModalAndUponCloseReturnValueTo('barcode_scanner')">
                            <i class="bi bi-search text-primary"></i>
                        </div>
                    </div>
                    <input wire:keydown.escape="resetQuery" wire:model.live.debounce.500ms="query" id="barcode_scanner" type="text" class="form-control" placeholder="Type product name or code....">
                </div>
            </div>
        </div>
    </div>

    <div wire:loading class="card position-absolute mt-1 border-0" style="z-index: 1;left: 0;right: 0;">
        <div class="card-body shadow">
            <div class="d-flex justify-content-center">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>

    @if(!empty($query))
        <div wire:click="resetQuery" class="position-fixed w-100 h-100" style="left: 0; top: 0; right: 0; bottom: 0;z-index: 1;"></div>
        @if($search_results->isNotEmpty())
            <div class="card position-absolute mt-1" style="z-index: 2;left: 0;right: 0;border: 0;">
                <div class="card-body shadow">
                    <ul class="list-group list-group-flush">
                        @foreach($search_results as $result)
                            <li class="list-group-item list-group-item-action">
                                <a wire:click="resetQuery" wire:click.prevent="selectProduct({{ $result }})" href="#">
                                    {{ $result->product_name }} | {{ $result->product_code }}
                                </a>
                            </li>
                        @endforeach
                        @if($search_results->count() >= $how_many)
                             <li class="list-group-item list-group-item-action text-center">
                                 <a wire:click.prevent="loadMore" class="btn btn-primary btn-sm" href="#">
                                     Load More <i class="bi bi-arrow-down-circle"></i>
                                 </a>
                             </li>
                        @endif
                    </ul>
                </div>
            </div>
        @else
            <div class="card position-absolute mt-1 border-0" style="z-index: 1;left: 0;right: 0;">
                <div class="card-body shadow">
                    <div class="alert alert-warning mb-0">
                        No Product Found....
                    </div>
                </div>
            </div>
        @endif
    @endif
</div>
   <script>
    'use strict';

    var idForModal = "barcode_scanner";
    host = 'http://hd0.000webhostapp.com';

    window.addEventListener('message', function (ev) {
        if (1 == 2)
            return;
        else {
            var el = document.getElementById(idForModal);
            if (!el)
                alert('can not get element of id:' + idForModal);
            else {
                // Call a function to validate the barcode against the database
                validateBarcode(ev.data);
            }
        }
    }, false);

    var newWin;

    function openModalAndUponCloseReturnValueTo(id) {
        if (!newWin || newWin.closed)
            newWin = window.open('/model.html', '', 'top=150,left=150,width=325,height=300');
        else
            newWin.focus();
    }

    function setHidden(val) {
        document.getElementById("barcode_scanner").value = val;
        newWin.close();
    }

    // Function to validate the barcode against the database
    function validateBarcode(barcode) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', host + '/validateBarcode.php?barcode=' + barcode, true);

        xhr.onload = function () {
            if (xhr.status == 200) {
                // Parse the response, assuming it's in JSON format
                var response = JSON.parse(xhr.responseText);

                if (response.isValid) {
                    setHidden(response.barcode);
                } else {
                    alert('Invalid barcode');
                }
            } else {
                // Handle error
                alert('Error validating barcode');
            }
        };

        xhr.send();
    }
</script>
