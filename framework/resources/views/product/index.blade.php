@extends('template')
@section('content')
<style type="text/css">
    .ui-autocomplete {
    
    z-index:2147483647;
    
}
</style>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="#">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">{{ $title }}</a>
        </li>
    </ul>
</div>
<h3 class="page-title">
{{ $title }}
</h3>
<a href="{{ url('product/create') }}" class="btn blue btn-sm"><i class="fa fa-plus-circle"></i> Add</a>
<a href="{{ route('product.upload') }}" class="btn green btn-sm"><i class="fa fa-upload"></i> Import Product</a>
<br/><br/>
<div class="row">
  <div class="col-md-12">
    @include('layouts.partials.alert')
    <div class="portlet box green-haze">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>{{ $title }}
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse">
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="table">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Stock</th>
                        <th>Cost Price</th>
                        <th>Sell Price</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                </table>
            </div>
        </div>
  </div>
</div>

@endsection

{!! Html::script("/assets/global/plugins/jquery.min.js") !!} 
<script>
$(function() {
    $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-btn-group pull-right",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            }
    });

    $('#table').DataTable({
        processing: true,
        serverSide: true,
        "pageLength": 10,
        "dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",


        ajax: '{!! route('product.data') !!}',
        columns: [
            { data: 'productcode', name: 'product.productcode' },
            { data: 'name', name: 'product.name' },
            { data: 'category.name', name: 'category.name' },
            { data: 'stock', name: 'product.stock' },
            { data: 'cost_price', name: 'product.cost_price' },
            { data: 'sell_price', name: 'product.sell_price' },
            { data: 'action', name: 'action', orderable: false, searchable: false, sWidth: '15%', sClass: "center"}
        ],

        "tableTools": {
                "sSwfPath": "../assets/global/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
                "aButtons": [{
                    "sExtends": "pdf",
                    "sButtonText": "PDF"
                }, {
                    "sExtends": "csv",
                    "sButtonText": "CSV"
                }, {
                    "sExtends": "xls",
                    "sButtonText": "Excel"
                }, {
                    "sExtends": "print",
                    "sButtonText": "Print",
                    "sInfo": 'Please press "CTRL+P" to print or "ESC" to quit',
                    "sMessage": "Generated by DataTables"
                }, {
                    "sExtends": "copy",
                    "sButtonText": "Copy"
                }]
        }
    });

    var tableWrapper = $('#sample_2_wrapper');
        tableWrapper.find('.dataTables_length select').select2();
});
</script>