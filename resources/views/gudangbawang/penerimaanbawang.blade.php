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
@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-8">
            <h2 class="page-title text-left pl-5">Penerimaan Bawang</h2>
        </div>
        <div class="col-4">
            <div class="widgetbar">
                <h5 class="page-subtitle text-left pl-5">10 Juni 2020</h5>
            </div>                        
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-8 pl-5">
            <form>
                <div class="form-group mb-0">
                  <label for="validationCustom01">Berat Bawang Kupas Diterima (Kg)</label>
                  <input type="text" class="form-control" name="berat" id="berat" required placeholder="0">
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
            </form>
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
                        <table id="datatable" class="display table table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Terima Bawang (Kg)</th>
                                    <th>Bawang Kupas (Kg)</th>
                                    <th>Kulit (Kg)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>12</td>
                                    <td data-toggle="modal" data-target="#hasilKupasTiger">11.6</td>
                                    <td>0.4</td>
                                </tr>
                                <tr>
                                    <td class="redclass">Garrett Winters</td>
                                    <td class="redclass">12</td>
                                    <td class="redclass">11</td>
                                    <td class="redclass">0.5</td>
                                </tr>
                                <tr>
                                    <td class="redclass">Ashton Cox</td>
                                    <td class="redclass">12</td>
                                    <td class="redclass">11.1</td>
                                    <td class="redclass">0.5</td>
                                </tr>
                                <tr>
                                    <td>Cedric Kelly</td>
                                    <td>12</td>
                                    <td>11.3</td>
                                    <td>0.7</td>
                                </tr>
                                <tr>
                                    <td>Airi Satou</td>
                                    <td>12</td>
                                    <td>11.5</td>
                                    <td>0.5</td>
                                </tr>
                                <tr>
                                    <td>Brielle Williamson</td>
                                    <td>12</td>
                                    <td>11.7</td>
                                    <td>0.3</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>
<!-- End Contentbar -->
<!-- Modal -->
<div class="modal fade" id="hasilKupasTiger" tabindex="-1" role="dialog" aria-labelledby="hasilKupasTitleTiger" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hasilKupasTitleTiger">Hasil Kupas Tiger</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('/gudang-bawang/tenaga-kupas')}}">
                <div class="modal-body">
                        <div class="form-group mb-0">
                          <label for="validationCustom01">Berat Bawang Kupas (Kg)</label>
                          <input type="text" class="form-control" name="beratbawang" id="beratbawang" required placeholder="11.4">
                          <div class="valid-feedback">
                            Looks good!
                          </div>
                        </div>
                        <div class="form-group mb-0">
                          <label for="validationCustom01">Berat Kulit (Kg)</label>
                          <input type="text" class="form-control" name="beratkulit" id="beratkulit" required placeholder="0.6">
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
<!-- End Modal -->
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
@endsection 