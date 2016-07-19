

@extends('template')
@section('content')

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
			@include('layouts.partials.alert')
            @include('layouts.partials.validation')
            <br>
			<div class="row">
            <div class="col-md-12">
            <div class="portlet box green-haze">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i> {{ $title }}
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse">
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_2">
                <thead>
                <tr>
                <th>No.</th>
                <th>Receiving Date</th>
                <th>Faktur No.</th>
                <th>Person</th>
                <th>PO No.</th>
                <th>&nbsp;</th>
                </tr>
                </thead>
                </table>
                        </div>
                    </div>
                </div>  
            </div>

            
@endsection



<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script type="text/javascript">
   var TableAdvanced = function () {

    var initTable2 = function () {
        var table = $('#sample_2');
        
        /* Table tools samples: https://www.datatables.net/release-datatables/extras/TableTools/ */

        /* Set tabletools buttons and button container */

        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-btn-group pull-right",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            }
        });

        var oTable = table.dataTable({
        responsive: true,
        processing: true,
        serverSide: false,
        ajax: '{!! route('receiving.data') !!}',
        columns: [
          {data: 'rownum', name: 'rownum', width: '5%', searchable: false, "sClass": "text-center"},
          {data: 'receiving_date', name: 'receiving_date' },
          {data: 'faktur_no', name: 'faktur_no' },
          {data: 'person_charge', name: 'person_charge' },
          {data: 'po_no', name: 'po_no' },
          {data: 'action', name: 'action', orderable: false, searchable: false, width: '5%', "sClass": "text-center"}
        ],
            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },

            "order": [
                [0, 'asc']
            ],
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],

            // set the initial value
            "pageLength": 10,
            "dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

            "tableTools": {
                "sSwfPath": "http://localhost/laravos/assets/global/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
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

        var tableWrapper = $('#sample_2_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
    }

    return {

        //main function to initiate the module
        init: function () {

            if (!jQuery().dataTable) {
                return;
            }

            //console.log('me 1');
            initTable2();
            //console.log('me 2');
        }

    };

}



();

</script>

