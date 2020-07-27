@section('title') 
Soyuz - Datatable
@endsection 
@extends('dashboardkanji.layouts.main')
@section('style')
<!-- DataTables css -->
<link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar" style="height : 75px"></div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->    
<div class="container-fluid">                
    <!-- Start row -->
    <div class="row">
        <!-- Start col --> 
            <div class="col d-flex justify-content-end">
                <a href="{{ url('/gudang-bawang/') }}" type="button" class="btn btn-primary font-weight-bold"><img src="{{asset('assets/images/onion.png')}}" class="img-fluid"> Gudang Bawang</a>
            </div>
            <div class="col d-flex justify-content-center">
                <a href="{{ url('/gudang-tepung-tapioka/') }}" type="button" class="btn btn-primary font-weight-bold"><img src="{{asset('assets/images/powder.png')}}" class="img-fluid"> Gudang Tepung Tapioka</a>
            </div>
            <div class="col d-flex justify-content-start">
                <a href="{{ url('/gudang-bumbu/') }}" type="button" class="btn btn-primary font-weight-bold"><img src="{{asset('assets/images/sugar.png')}}" class="img-fluid"> Gudang Bumbu</a>
            </div>   
        <!-- End col -->
    </div>
    <!-- End row -->
</div>
<!-- End Contentbar -->
@endsection 
@section('script')
<!-- Datatable js -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>

</script>
@endsection 