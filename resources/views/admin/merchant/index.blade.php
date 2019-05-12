<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-file-text-o"></i> {!! trans('merchant::merchant.name') !!} <small> {!! trans('app.manage') !!} {!! trans('merchant::merchant.names') !!}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! guard_url('/') !!}"><i class="fa fa-dashboard"></i> {!! trans('app.home') !!} </a></li>
            <li class="active">{!! trans('merchant::merchant.names') !!}</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div id='merchant-merchant-entry'>
    </div>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                    <li class="{!!(request('status') == '')?'active':'';!!}"><a href="{!!guard_url('merchant/merchant')!!}">{!! trans('merchant::merchant.names') !!}</a></li>
                    <li class="{!!(request('status') == 'archive')?'active':'';!!}"><a href="{!!guard_url('merchant/merchant?status=archive')!!}">Archived</a></li>
                    <li class="{!!(request('status') == 'deleted')?'active':'';!!}"><a href="{!!guard_url('merchant/merchant?status=deleted')!!}">Trashed</a></li>
                    <li class="pull-right">
                    <span class="actions">
                    <!--   
                    <a  class="btn btn-xs btn-purple"  href="{!!guard_url('merchant/merchant/reports')!!}"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-sm hidden-xs"> Reports</span></a>
                    @include('merchant::admin.merchant.partial.actions')
                    -->
                    @include('merchant::admin.merchant.partial.filter')
                    @include('merchant::admin.merchant.partial.column')
                    </span> 
                </li>
            </ul>
            <div class="tab-content">
                <table id="merchant-merchant-list" class="table table-striped data-table">
                    <thead class="list_head">
                        <th style="text-align: right;" width="1%"><a class="btn-reset-filter" href="#Reset" style="display:none; color:#fff;"><i class="fa fa-filter"></i></a> <input type="checkbox" id="merchant-merchant-check-all"></th>
                        <th data-field="merchant_name">{!! trans('merchant::merchant.label.merchant_name')!!}</th>
                    <th data-field="username">{!! trans('merchant::merchant.label.username')!!}</th>
                    <th data-field="password">{!! trans('merchant::merchant.label.password')!!}</th>
                    <th data-field="email">{!! trans('merchant::merchant.label.email')!!}</th>
                    <th data-field="address">{!! trans('merchant::merchant.label.address')!!}</th>
                    <th data-field="information">{!! trans('merchant::merchant.label.information')!!}</th>
                    <th data-field="img">{!! trans('merchant::merchant.label.img')!!}</th>
                    <th data-field="phone">{!! trans('merchant::merchant.label.phone')!!}</th>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">

var oTable;
var oSearch;
$(document).ready(function(){
    app.load('#merchant-merchant-entry', '{!!guard_url('merchant/merchant/0')!!}');
    oTable = $('#merchant-merchant-list').dataTable( {
        'columnDefs': [{
            'targets': 0,
            'searchable': false,
            'orderable': false,
            'className': 'dt-body-center',
            'render': function (data, type, full, meta){
                return '<input type="checkbox" name="id[]" value="' + data.id + '">';
            }
        }], 
        
        "responsive" : true,
        "order": [[1, 'asc']],
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! guard_url('merchant/merchant') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $.each(oSearch, function(key, val){
                aoData.push( { 'name' : key, 'value' : val } );
            });
            app.dataTable(aoData);
            $.ajax({
                'dataType'  : 'json',
                'data'      : aoData,
                'type'      : 'GET',
                'url'       : sSource,
                'success'   : fnCallback
            });
        },

        "columns": [
            {data :'id'},
            {data :'merchant_name'},
            {data :'username'},
            {data :'password'},
            {data :'email'},
            {data :'address'},
            {data :'information'},
            {data :'img'},
            {data :'phone'},
        ],
        "pageLength": 25
    });

    $('#merchant-merchant-list tbody').on( 'click', 'tr td:not(:first-child)', function (e) {
        e.preventDefault();

        oTable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');
        var d = $('#merchant-merchant-list').DataTable().row( this ).data();
        $('#merchant-merchant-entry').load('{!!guard_url('merchant/merchant')!!}' + '/' + d.id);
    });

    $('#merchant-merchant-list tbody').on( 'change', "input[name^='id[]']", function (e) {
        e.preventDefault();

        aIds = [];
        $(".child").remove();
        $(this).parent().parent().removeClass('parent'); 
        $("input[name^='id[]']:checked").each(function(){
            aIds.push($(this).val());
        });
    });

    $("#merchant-merchant-check-all").on( 'change', function (e) {
        e.preventDefault();
        aIds = [];
        if ($(this).prop('checked')) {
            $("input[name^='id[]']").each(function(){
                $(this).prop('checked',true);
                aIds.push($(this).val());
            });

            return;
        }else{
            $("input[name^='id[]']").prop('checked',false);
        }
        
    });


    $(".reset_filter").click(function (e) {
        e.preventDefault();
        $("#form-search")[ 0 ].reset();
        $('#form-search input,#form-search select').each( function () {
          oTable.search( this.value ).draw();
        });
        $('#merchant-merchant-list .reset_filter').css('display', 'none');

    });


    // Add event listener for opening and closing details
    $('#merchant-merchant-list tbody').on('click', 'td.details-control', function (e) {
        e.preventDefault();
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    });

});
</script>