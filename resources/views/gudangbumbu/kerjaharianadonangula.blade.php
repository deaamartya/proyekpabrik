@section('title') 
Soyuz - Datatable
@endsection 
@extends('gudangbumbu.layouts.main')
@section('style')
<!-- DataTables css -->
<link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->   
<link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-8">
            <h2 class="page-title text-left pl-5">Order Masak</h2>
        </div>
        <div class="col-4">
            <h2 class="page-title text-right pr-5">10 Juni 2020</h2>
        </div>
    </div>        
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->    
<div class="contentbar">                
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="default-datatable1" class="display table table-striped table-bordered">
                                <thead>
                                    <tr>      
                                        <th>Tanggal</th>
                                        <th>HC</th>
                                        <th>SP</th>
                                        <th>GS</th>
                                        <th>Status</th>
                                        <th>Terambil</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2011/04/25</td>
                                        <td>50</td>
                                        <td>-</td>
                                        <td>50</td>
                                        <td class="text-danger">100%</td>
                                        <td class="text-danger">100%</td>
                                    </tr>
                                    <tr>
                                        <td>2011/04/25</td>
                                        <td>-</td>
                                        <td>40</td>
                                        <td>60</td>
                                        <td class="text-danger">80%</td>
                                        <td class="text-danger">40%</td>
                                    </tr>
                                    <tr>
                                        <td>2011/04/25</td>
                                        <td>50</td>
                                        <td>-</td>
                                        <td>30</td>
                                        <td class="text-danger">0%</td>
                                        <td class="text-danger">0%</td>
                                    </tr>
                                    <tr>
                                        <td>2011/04/25</td>
                                        <td>20</td>
                                        <td>30</td>
                                        <td>60</td>
                                        <td class="text-danger">0%</td>
                                        <td class="text-danger">0%</td>
                                    </tr>
                                    <tr>
                                        <td>2011/04/25</td>
                                        <td>30</td>
                                        <td>20</td>
                                        <td>20</td>
                                        <td class="text-danger">0%</td>
                                        <td class="text-danger">0%</td>
                                    </tr>                                
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>HC</th>
                                        <th>SP</th>
                                        <th>GS</th>
                                        <th>Status</th>
                                        <th>Terambil</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
        <!-- start kerja harian adonan gula -->
    
        <div style="width:100%;height:auto ;border-style: solid; border-color:blue;">
            <h2 class="page-title text-left pl-5">Kerja harian Adonan Gula</h2> 
            <div class="row">
                <div style="width:30%;border-style: solid; margin:0px 0px 5px 20px">
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1" style="transform: translate(140px, 0px);" >Tambah bahan</button><br>
                <h5 style="text-align:center">Terima (Kg)</h5>
                <input  class="form-control" type="text" name="terimakarung" id="terimakarung">
                </div>

                <div style="width:30%;border-style: solid; margin:0px 0px 5px 20px">
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2" style="transform: translate(150px, 0px);" >Sisa bahan</button><br>
                <h5 style="text-align:center">Sisa (Kg)</h5>    
                <input class="form-control" type="text" name="terimakarung" id="terimakarung">
                </div>

                {{-- <div style="width:30%;border-style: solid; margin:0px 0px 5px 20px">
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal3" >Prive</button><br>
                <input class="form-control" type="text" name="terimakarung" id="terimakarung">
                </div> --}}

            </div>

            <h5 style="color:black ; text-align:center"  > Persediaan Adonan Gula  </h5> 
            <div class="row">
                <div style="width:30%;border-style: solid; margin:0px 0px 5px 20px">
                   
                    <h5 style="color:black ; text-align:center"  > HC </h5> 
                    <input class="form-control" type="text" name="terimakarung" id="terimakarung">
                </div>
                <div style="width:30%;border-style: solid; margin:0px 0px 5px 20px">
                    
                    <h5 style="color:black ; text-align:center"  > SP </h5> 
                    <input class="form-control" type="text" name="terimakarung" id="terimakarung">
                </div>
                <div style="width:30%;border-style: solid; margin:0px 0px 5px 20px">
                   
                    <h5 style="color:black ; text-align:center"  > GS </h5> 
                    <input class="form-control" type="text" name="terimakarung" id="terimakarung">
                </div>
            </div>
        
            <div>
                <h5 style="margin:5px 0px 5px 50px ">Hasil</h5>
                <div class="col-lg-8" style="margin:0px 0px 5px 20px" >
                    <div class="card m-b-20"  >
                        <div class="card-header">
                            <h5 class="card-title">HC</h5>
                        </div>
                        <div class="card-body">
                            <input class="form-control" type="text"  id="touchspin-vertical-btn" name="touchspin-vertical-btn" value="0">
                        </div>
                    </div>
                </div>  

                <div class="col-lg-8" style="margin:0px 0px 5px 20px" >
                    <div class="card m-b-20"  >
                        <div class="card-header">
                            <h5 class="card-title">SP</h5>
                        </div>
                        <div class="card-body">
                            <input class="form-control" type="text"  id="touchspin-vertical-btn1" name="touchspin-vertical-btn" value="0">
                        </div>
                    </div>
                </div>  
                
                <div class="col-lg-8" style="margin:0px 0px 5px 20px" >
                    <div class="card m-b-20"  >
                        <div class="card-header">
                            <h5 class="card-title">GS</h5>
                        </div>
                        <div class="card-body">
                            <input class="form-control" type="text"  id="touchspin-vertical-btn2" name="touchspin-vertical-btn" value="0">
                        </div>
                    </div>
                </div>              
            </div>
        

        </div>
        {{-- end kerja harian adonan gula --}}
    
        <!-- start kerja harian adonan gula + garam -->
        
        <div style="width:100%;height:auto ;border-style: solid; border-color:blue; margin :5px 0px 0px 0px">
            <h2 class="page-title text-left pl-5">Kerja harian Adonan Gula + garam</h2> 
            <div class="row">
                <div style="width:30%;border-style: solid; margin:0px 0px 5px 20px">
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal4" style="transform: translate(140px, 0px);" >Tambah bahan</button><br>
                <h5 style="text-align:center">Terima (Kg)</h5>
                <input class="form-control" type="text" name="terimakarung" id="terimakarung">
                </div>

                <div style="width:30%;border-style: solid; margin:0px 0px 5px 20px" >
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal5"  style="transform: translate(150px, 0px);">Sisa bahan</button><br>
                <h5 style="text-align:center">Sisa (Kg)</h5>
                <input class="form-control" type="text" name="terimakarung" id="terimakarung">
                </div>

                {{-- <div style="width:30%;border-style: solid; margin:0px 0px 5px 20px">
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal6" >Prive</button><br>
                <input class="form-control" type="text" name="terimakarung" id="terimakarung">
                </div> --}}

            </div>
            
            <h5 style="color:black ; text-align:center"  > Persediaan Adonan Gula + Garam </h5> 
            <div class="row">
                <div style="width:30%;border-style: solid; margin:0px 0px 5px 20px">
                    {{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal6" >Prive</button><br>
                    --}}
                    <h5 style="color:black ; text-align:center"  > HC </h5> 
                    <input class="form-control" type="text" name="terimakarung" id="terimakarung">
                </div>
                <div style="width:30%;border-style: solid; margin:0px 0px 5px 20px">
                    {{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal6" >Prive</button><br>
                    --}}
                    <h5 style="color:black ; text-align:center"  > SP </h5> 
                    <input class="form-control" type="text" name="terimakarung" id="terimakarung">
                </div>
                <div style="width:30%;border-style: solid; margin:0px 0px 5px 20px">
                    {{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal6" >Prive</button><br>
                    --}}
                    <h5 style="color:black ; text-align:center"  > GS </h5> 
                    <input class="form-control" type="text" name="terimakarung" id="terimakarung">
                </div>
            </div>


            <div >
                <h5 style="margin:5px 0px 5px 50px ">Hasil</h5>
                <div class="col-lg-8" style="margin:0px 0px 5px 20px" >
                    <div class="card m-b-20"  >
                        <div class="card-header">
                            <h5 class="card-title">HC</h5>
                        </div>
                        <div class="card-body">
                            <input class="form-control" type="text"  id="touchspin-vertical-btn3" name="touchspin-vertical-btn" value="0">
                        </div>
                    </div>
                </div>  

                <div class="col-lg-8" style="margin:0px 0px 5px 20px" >
                    <div class="card m-b-20"  >
                        <div class="card-header">
                            <h5 class="card-title">SP</h5>
                        </div>
                        <div class="card-body">
                            <input class="form-control" type="text"  id="touchspin-vertical-btn4" name="touchspin-vertical-btn" value="0">
                        </div>
                    </div>
                </div>  
                
                <div class="col-lg-8" style="margin:0px 0px 5px 20px" >
                    <div class="card m-b-20"  >
                        <div class="card-header">
                            <h5 class="card-title">GS</h5>
                        </div>
                        <div class="card-body">
                            <input class="form-control" type="text"  id="touchspin-vertical-btn5" name="touchspin-vertical-btn" value="0">
                        </div>
                    </div>
                </div>              
            </div>
            

        </div>
        {{-- end kerja harian adonan gula + garam --}}

        <!-- start kerja harian bumbu ready -->
        
        <div style="width:100%;height:auto ;border-style: solid; border-color:blue; margin :5px 0px 0px 0px">
            <h2 class="page-title text-left pl-5">Kerja harian Bumbu Ready</h2> 
            {{-- <div class="row">
                <div style="width:30%;border-style: solid; margin:0px 0px 5px 20px">
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal4" >Tambah bahan</button><br>
                <input class="form-control" type="text" name="terimakarung" id="terimakarung">
                </div>

                <div style="width:30%;border-style: solid; margin:0px 0px 5px 20px">
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal5" >Sisa bahan</button><br>
                <input class="form-control" type="text" name="terimakarung" id="terimakarung">
                </div>

                <div style="width:30%;border-style: solid; margin:0px 0px 5px 20px">
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal6" >Prive</button><br>
                <input class="form-control" type="text" name="terimakarung" id="terimakarung">
                </div>
                

            </div> --}}
            <h5 style="color:black ; text-align:center"  > Persediaan Adonan Gula + Garam </h5> 
            <div class="row">
                <div style="width:30%;border-style: solid; margin:0px 0px 5px 20px">
                    {{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal6" >Prive</button><br>
                    --}}
                    <h5 style="color:black ; text-align:center"  > HC </h5> 
                    <input class="form-control" type="text" name="terimakarung" id="terimakarung">
                </div>
                <div style="width:30%;border-style: solid; margin:0px 0px 5px 20px">
                    {{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal6" >Prive</button><br>
                    --}}
                    <h5 style="color:black ; text-align:center"  > SP </h5> 
                    <input class="form-control" type="text" name="terimakarung" id="terimakarung">
                </div>
                <div style="width:30%;border-style: solid; margin:0px 0px 5px 20px">
                    {{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal6" >Prive</button><br>
                    --}}
                    <h5 style="color:black ; text-align:center"  > GS </h5> 
                    <input class="form-control" type="text" name="terimakarung" id="terimakarung">
                </div>
            </div>

            <h5 style="color:black ; text-align:center"  > Persediaan Stock Bumbu Bahan </h5> 
            <div class="row">
                <div style="width:30%;border-style: solid; margin:0px 0px 5px 20px">
                    {{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal6" >Prive</button><br>
                    --}}
                    <h5 style="color:black ; text-align:center"  > HC </h5> 
                    <input class="form-control" type="text" name="terimakarung" id="terimakarung">
                </div>
                <div style="width:30%;border-style: solid; margin:0px 0px 5px 20px">
                    {{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal6" >Prive</button><br>
                    --}}
                    <h5 style="color:black ; text-align:center"  > SP </h5> 
                    <input class="form-control" type="text" name="terimakarung" id="terimakarung">
                </div>
                <div style="width:30%;border-style: solid; margin:0px 0px 5px 20px">
                    {{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal6" >Prive</button><br>
                    --}}
                    <h5 style="color:black ; text-align:center"  > GS </h5> 
                    <input class="form-control" type="text" name="terimakarung" id="terimakarung">
                </div>
            </div>
            
            <div class="row">
                {{--START HASIL --}}
                <div>
                    <h5 style="margin:5px 0px 5px 50px ">Hasil</h5>
                    <div class="col-lg-8" style="margin:0px 0px 5px 20px" >
                        <div class="card m-b-20"  >
                            <div class="card-header">
                                <h5 class="card-title">Jumlah Masakan HC</h5>
                            </div>
                            <div class="card-body">
                                <input class="form-control" type="text"  id="touchspin-vertical-btn6" name="touchspin-vertical-btn" value="0">
                            </div>
                        </div>
                    </div>  

                    <div class="col-lg-8" style="margin:0px 0px 5px 20px" >
                        <div class="card m-b-20"  >
                            <div class="card-header">
                                <h5 class="card-title">Jumlah Masakan SP</h5>
                            </div>
                            <div class="card-body">
                                <input class="form-control" type="text"  id="touchspin-vertical-btn7" name="touchspin-vertical-btn" value="0">
                            </div>
                        </div>
                    </div>  
                    
                    <div class="col-lg-8" style="margin:0px 0px 5px 20px" >
                        <div class="card m-b-20"  >
                            <div class="card-header">
                                <h5 class="card-title">Jumlah Masakan GS</h5>
                            </div>
                            <div class="card-body">
                                <input class="form-control" type="text"  id="touchspin-vertical-btn8" name="touchspin-vertical-btn" value="0">
                            </div>
                        </div>
                    </div> 
                </div>
                {{--END HASIL--}}
                {{--START TERAMBIL --}}
                <div>
                    <h5 style="margin:5px 0px 5px 50px ">Terambil</h5>
                    <div class="col-lg-8" style="margin:0px 0px 5px 20px" >
                        <div class="card m-b-20"  >
                            <div class="card-header">
                                <h5 class="card-title">Jumlah Masakan</h5>
                            </div>
                            <div class="card-body">
                                <input class="form-control" type="text"  id="touchspin-vertical-btn6" name="touchspin-vertical-btn" value="0">
                            </div>
                        </div>
                    </div>  
    
                    <div class="col-lg-8" style="margin:0px 0px 5px 20px" >
                        <div class="card m-b-20"  >
                            <div class="card-header">
                                <h5 class="card-title">Jumlah Masakan</h5>
                            </div>
                            <div class="card-body">
                                <input class="form-control" type="text"  id="touchspin-vertical-btn7" name="touchspin-vertical-btn" value="0">
                            </div>
                        </div>
                    </div>  
                    
                    <div class="col-lg-8" style="margin:0px 0px 5px 20px" >
                        <div class="card m-b-20"  >
                            <div class="card-header">
                                <h5 class="card-title">Jumlah Masakan</h5>
                            </div>
                            <div class="card-body">
                                <input class="form-control" type="text"  id="touchspin-vertical-btn8" name="touchspin-vertical-btn" value="0">
                            </div>
                        </div>
                    </div> 
                </div>
                {{-- END TERAMBIL --}}
                
            </div>
            

        </div>
        {{-- end kerja harian bumbu ready --}}
 
        {{-- modal1 --}}
            <div class="col-md-4 pl-5">
                <div class="modal fade" id="myModal1" role="dialog">
                    <div class="modal-dialog">
                    
                    <!-- Modal content-->
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah gula</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <form action="/action_page.php">
                        <div class="modal-body row">   
                            
                            <div>
                                <h5 style="width: 100px;margin: 0px 5px"> Stock</h5>
                                <input  class="form-control" type="number" name="stock" style="width: 100px;margin: 0px 5px">
                            </div>

                            <div>
                                <h5 style="width: 100px;margin: 0px 5px"> Karung</h5>
                                <input class="form-control"  type="number" name="karung" style="width: 100px ;margin: 0px 5px">
                                </div>

                            <div>
                                <h5 style="width: 100px;margin: 0px 5px"> Karung</h5>
                                <input class="form-control" type="number" name="jumlah" style="width: 100px ;margin: 0px 5px ">
                            </div>
                        </div>
                        
                        </form>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default"> Simpan</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                            
                    </div>
                </div>
            </div>
            {{-- end modal --}}
        

            {{-- modal2 --}}
            <div class="col-md-4 pl-5">
                <div class="modal fade" id="myModal2" role="dialog">
                    <div class="modal-dialog">
                    
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Sisa Bahan Gula</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        
                        </div>
                        <form action="/action_page.php">
                        <div class="modal-body row">   
                            
                            <div>
                                <h5 style="width: 100px;margin: 0px 5px"> Satuan</h5>
                                <select class="form-control" id="satuan">
                                    <option>kg</option>
                                    <option>karung</option>
                                  </select>
                            </div>

                            <div>
                                <h5 style="width: 100px;margin: 0px 5px"> Stock tersedia</h5>
                                <input class="form-control" type="number" name="karung" style="width: 100px ;margin: 0px 5px">
                            </div>

                            
                        </div>
                        
                        </form>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default"> Simpan</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    
                    </div>
                </div>
            </div>
            {{-- end modal --}}

        {{-- modal3 --}}
            <div class="col-md-4 pl-5">
                <div class="modal fade" id="myModal3" role="dialog">
                    <div class="modal-dialog">
                    
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Prive Gula</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        
                        </div>
                        <form action="/action_page.php">
                            <div class="modal-body row">   
                                
                                <div>
                                    <h5 style="width: 100px;margin: 0px 5px"> Jumlah(kg)</h5>
                                    <input class="form-control" type="number" name="jumlahPG" style="width: 100px ;margin: 0px 5px ">
                                </div>

                            </div>
                            
                            </form>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default"> Simpan</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    
                    </div>
                </div>
            </div>
        {{-- end modal --}}

        {{-- modal4 --}}
        <div class="col-md-4 pl-5">
            <div class="modal fade" id="myModal4" role="dialog">
                <div class="modal-dialog">
                
                <!-- Modal content-->
                <div class="modal-content ">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Bahan Garam</h4> 
                        
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                   
                    <form action="/action_page.php">
                    <div>
                        <h5 style="width: 100px;margin: 0px 5px">Jenis Stock</h5>
                        <select class="form-control" id="jenisstock">
                            <option>25kg</option>
                            <option>50kg</option>
                          </select>
                    </div>

                    <div class="modal-body row">   
                        
                        <div>
                            <h5 style="width: 100px;margin: 0px 5px"> Stock</h5>
                            <input class="form-control" type="number" name="stock" style="width: 100px;margin: 0px 5px">
                        </div>

                        <div>
                            <h5 style="width: 100px;margin: 0px 5px"> Karung</h5>
                            <input class="form-control" type="number" name="karung" style="width: 100px ;margin: 0px 5px">
                            </div>

                        <div>
                            <h5 style="width: 100px;margin: 0px 5px"> Karung</h5>
                            <input class="form-control" type="number" name="jumlah" style="width: 100px ;margin: 0px 5px ">
                        </div>
                    </div>
                    
                    </form>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default"> Simpan</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                        
                </div>
            </div>
        </div>
        {{-- end modal --}}
    

        {{-- modal5 --}}
        <div class="col-md-4 pl-5">
            <div class="modal fade" id="myModal5" role="dialog">
                <div class="modal-dialog">
                
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Header</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    
                    </div>
                    <form action="/action_page.php">
                    <div class="modal-body row">   
                        
                        <div>
                            <h5 style="width: 100px;margin: 0px 5px"> Stock</h5>
                            <input class="form-control" type="number" name="stock" style="width: 100px;margin: 0px 5px">
                        </div>

                        <div>
                            <h5 style="width: 100px;margin: 0px 5px"> Karung</h5>
                            <input class="form-control"  type="number" name="karung" style="width: 100px ;margin: 0px 5px">
                        </div>

                        <div>
                            <h5 style="width: 100px;margin: 0px 5px"> Karung</h5>
                            <input class="form-control" type="number" name="jumlah" style="width: 100px ;margin: 0px 5px ">
                        </div>
                    </div>
                    
                    </form>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default"> Simpan</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                
                </div>
            </div>
        </div>
        {{-- end modal --}}

    {{-- modal6 --}}
        <div class="col-md-4 pl-5">
            <div class="modal fade" id="myModal6" role="dialog">
                <div class="modal-dialog">
                
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Header</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    
                    </div>
                    <form action="/action_page.php">
                        <div class="modal-body row">   
                            
                            <div>
                                <h5 style="width: 100px;margin: 0px 5px"> Stock</h5>
                                <input  class="form-control" type="number" name="stock" style="width: 100px;margin: 0px 5px">
                            </div>
        
                            <div>
                                <h5 style="width: 100px;margin: 0px 5px"> Karung</h5>
                                <input class="form-control" type="number" name="karung" style="width: 100px ;margin: 0px 5px">
                            </div>
        
                            <div>
                                <h5 style="width: 100px;margin: 0px 5px"> Karung</h5>
                                <input class="form-control" type="number" name="jumlah" style="width: 100px ;margin: 0px 5px ">
                            </div>
                        </div>
                        
                    </form>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default"> Simpan</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                </div>
                
                </div>
            </div>
        </div>
    {{-- end modal --}}

    </div>
    <!-- End row -->
</div>
<!-- End Contentbar -->
@endsection 
@section('script')
<!-- Datatable js -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ asset('assets/js/custom/custom-form-touchspin.js') }}"></script>
<script>
    "use strict";
    $(document).ready(function() {
        /* -- Table - Datatable -- */
        $('#default-datatable1').DataTable( {
            "order": [[ 0, "asc" ]],
            responsive: true
        });
    });

    // "use strict";
    // $(document).ready(function() {
    //     /* -- Table - Datatable -- */
    //     $('#default-datatable2').DataTable( {
    //         "order": [[ 0, "asc" ]],
    //         responsive: true
    //     });
    // });

  
</script>
<script>
   $(document).ready(function() {
   $("#touchspin-vertical-btn1").TouchSpin({
      verticalbuttons: true
    });
   $("#touchspin-vertical-btn2").TouchSpin({
      verticalbuttons: true
    });
   $("#touchspin-vertical-btn3").TouchSpin({
      verticalbuttons: true
    });
   $("#touchspin-vertical-btn4").TouchSpin({
      verticalbuttons: true
    });
   $("#touchspin-vertical-btn5").TouchSpin({
      verticalbuttons: true
    });
   $("#touchspin-vertical-btn6").TouchSpin({
      verticalbuttons: true
    });
   $("#touchspin-vertical-btn7").TouchSpin({
      verticalbuttons: true
    });
   $("#touchspin-vertical-btn8").TouchSpin({
      verticalbuttons: true
    });
});
    </script>
@endsection 