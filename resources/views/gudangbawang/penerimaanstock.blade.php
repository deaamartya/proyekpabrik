@section('title') 
Soyuz - Datatable
@endsection 
@extends('gudangbawang.layouts.main')
@section('style')
<!-- DataTables css -->
<link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<style type="text/css">
    .redclass{
        border-color: red !important;
    }
</style>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        /* In order to place the tracking correctly */
        canvas.drawing, canvas.drawingBuffer {
            position: absolute;
            left: 0;
            top: 0;
        }
    </style>
@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-8">
            <h2 class="page-title text-left pl-5">Penerimaan Bawang kulit</h2>
            <input type="button" id="btn" value="Start/Stop the scanner" />
        </div>
        <div class="col-4">
            <div class="widgetbar">
                <h5 class="page-subtitle text-left pl-5">10 Juni 2020</h5>
            </div>                        
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-8 pl-5">
            <form action="{{url('/gudang-bawang/penerimaanstock')}}">
                <div class="modal-body">
                        <div class="form-group mb-0">
                          <label for="validationCustom01">Berat Bawang Kupas (Kg)</label>
                          <input type="text" class="form-control" name="barcode" id="barcode" required placeholder="sbk001">
                          <div class="valid-feedback">
                            Looks good!
                          </div>
                        </div>
                        <div class="form-group mb-0">
                          <label for="validationCustom01">Merek Bawang</label>
                          <input type="text" class="form-control" name="merekbawang" id="merekbawang" required placeholder="Merek Bawang">
                          <div class="valid-feedback">
                            Looks good!
                          </div>
                        </div>
                        <div class="form-group mb-0">
                            <label for="validationCustom01">Tanggal Penerimaan Bawang</label>
                            <input type="date" class="form-control" name="merekbawang" id="merekbawang" required placeholder="Tanggal Penerimaan Bawang">
                            <div class="valid-feedback">
                              Looks good!
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <label for="validationCustom01">Jumlah Bawang Diterima</label>
                            <input type="date" class="form-control" name="jumlah" id="jumlah" required placeholder="Jumlah Bawang Diterima">
                            <div class="valid-feedback">
                              Looks good!
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
            
        </div>
    </div>          
</div>
<!-- End Breadcrumbbar -->


@endsection 



@section('script')
<!-- Datatable js -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script>
    "use strict";
    $(document).ready(function() {
        /* -- Table - Datatable -- */
        $('#datatable').DataTable( {
            "searching" : false,
            "paging" : false,
            "info" : false,
            "order": [[ 1, "asc" ]],
            responsive: true
        } );
    });
</script>

<script src="https://cdn.rawgit.com/serratus/quaggaJS/0420d5e0/dist/quagga.min.js"></script>
    <script>
        var _scannerIsRunning = false;

        function startScanner() {
            Quagga.init({
                inputStream: {
                    name: "Live",
                    type: "LiveStream",
                    target: document.querySelector('#scanner-container'),
                    constraints: {
                        width: 480,
                        height: 320,
                        facingMode: "environment"
                    },
                },
                decoder: {
                    readers: [
                        "code_128_reader",
                        "ean_reader",
                        "ean_8_reader",
                        "code_39_reader",
                        "code_39_vin_reader",
                        "codabar_reader",
                        "upc_reader",
                        "upc_e_reader",
                        "i2of5_reader"
                    ],
                    debug: {
                        showCanvas: true,
                        showPatches: true,
                        showFoundPatches: true,
                        showSkeleton: true,
                        showLabels: true,
                        showPatchLabels: true,
                        showRemainingPatchLabels: true,
                        boxFromPatches: {
                            showTransformed: true,
                            showTransformedBox: true,
                            showBB: true
                        }
                    }
                },

            }, function (err) {
                if (err) {
                    console.log(err);
                    return
                }

                console.log("Initialization finished. Ready to start");
                Quagga.start();

                // Set flag to is running
                _scannerIsRunning = true;
            });

            Quagga.onProcessed(function (result) {
                var drawingCtx = Quagga.canvas.ctx.overlay,
                drawingCanvas = Quagga.canvas.dom.overlay;

                if (result) {
                    if (result.boxes) {
                        drawingCtx.clearRect(0, 0, parseInt(drawingCanvas.getAttribute("width")), parseInt(drawingCanvas.getAttribute("height")));
                        result.boxes.filter(function (box) {
                            return box !== result.box;
                        }).forEach(function (box) {
                            Quagga.ImageDebug.drawPath(box, { x: 0, y: 1 }, drawingCtx, { color: "green", lineWidth: 2 });
                        });
                    }

                    if (result.box) {
                        Quagga.ImageDebug.drawPath(result.box, { x: 0, y: 1 }, drawingCtx, { color: "#00F", lineWidth: 2 });
                    }

                    if (result.codeResult && result.codeResult.code) {
                        Quagga.ImageDebug.drawPath(result.line, { x: 'x', y: 'y' }, drawingCtx, { color: 'red', lineWidth: 3 });
                    }
                }
            });


            Quagga.onDetected(function (result) {
                console.log("Barcode detected and processed : [" + result.codeResult.code + "]", result);
            });
        }


        // Start/stop scanner
        document.getElementById("btn").addEventListener("click", function () {
            if (_scannerIsRunning) {
                Quagga.stop();
            } else {
                startScanner();
            }
        }, false);
    </script>
@endsection 