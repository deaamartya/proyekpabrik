<!DOCTYPE html> 
<html> 
<head> 
    <title>Cetak  Barcode</title> 
</head> 
<body> 
    <table  width="100%"> 
    <tr> 
 
       <td align="center"  style="border: lpx solid #ccc"> 
       <br>
           <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($id_penerimaan, 'C39')}}" height="60" width="180">
        <br>
          {{$id_penerimaan}}
      </td>
      @if ($no++ %3 ==0)
           </tr><tr>
      @endif
    </tr>
   </table>
  </body>
</html>