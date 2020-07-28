<button id="opener">Barcode scanner</button>

<div id="modal" title="Barcode scanner">
    <span class="found"></span>
    <div id="interactive" class="viewport"></div>
    <p>Hasil Scan adalah :</p><strong id="result"></strong>
</div>
<script src="https://cdn.rawgit.com/serratus/quaggaJS/0420d5e0/dist/quagga.min.js"></script>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('live_w_locators.js')}}"></script>