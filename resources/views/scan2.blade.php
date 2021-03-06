<!DOCTYPE html>
<html>
<body>
<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
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
</head>

<body>
    <!-- Div to show the scanner -->
    <div id="scanner-container"></div>
    <input type="button" id="btnScan" value="Start/Stop the scanner" />
    <input type="text" id="hdnBarcode"/>
</body>
</html>
<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>
<script>
var _scannerIsRunning = false;

$(document).ready(function () {
    
    $("#btnScan").click(function () {
        //alert("try to scan");
        if (_scannerIsRunning) {
            _scannerIsRunning = false;
            Quagga.stop();
            $("#btnScan").text("Start");
            $("#scanner-container").hide();
        } else {
            startScanner();
            $("video").attr("width", "100%");
            $("#btnScan").text("Stop");
            $("#scanner-container").show();
        }
    });
    LoadPage();
});

function closeModal() {
    $('.modal').hide();
    // more cleanup here
}

function startScanner() {
    Quagga.init({
        inputStream: {
            name: "Live",
            type: "LiveStream",
            target: document.querySelector('#scanner-container'),
            constraints: {
                facingMode: "environment",
                //"width":{"min":1200,},
                //"height":{"min":300},
                "aspectRatio": { "min": 1, "max": 100 }
            },
        },
        "locator": { "patchSize": "medium", "halfSample": false },
        "numOfWorkers": 1,
        "frequency": 10,
        "decoder": { "readers": [{ "format": "code_39_reader", "config": {} }] },
        "locate": true
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
        $("#hdnBarcode").val(result.codeResult.code);
        
        // LoadPage();
        $("#btnScan").click();
    });
}

function LoadPage()
{
    if ($("#hdnBarcode").val() == "")
        $("#hdnBarcode").val("BELOM DE"); //default barcode

    $.ajax({
        type: 'Get',
        url: 'Home/GetData/' + $("#hdnBarcode").val(),
        success: function (json) {
            //...
        }
    });
}
</script>