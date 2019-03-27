@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.rooms.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.rooms.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.rooms.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.rooms.partials.rooms-header-buttons')
            </div>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="rooms-table" class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.rooms.table.id') }}</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>{{ trans('labels.backend.pages.table.createdat') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                    <thead class="transparent-bg">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->
@endsection

@section('after-scripts')
    {{-- For DataTables --}}
    {{ Html::script(mix('js/dataTable.js')) }}

    <script>
        //Below written line is short form of writing $(document).ready(function() { })
        $(function() {
            var dataTable = $('#rooms-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.rooms.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: '{{config('module.rooms.table')}}.id'},
                    {data: 'room_name', name: '{{config('module.rooms.table')}}.room_name'},
                    {data: 'location_name', name: '{{config('module.rooms.table')}}.location_name'},
                    {data: 'price', name: '{{config('module.rooms.table')}}.price'},
                    {data: 'image_name', name: '{{config('module.rooms.table')}}.image_name'},
                    {data: 'created_at', name: '{{config('module.rooms.table')}}.created_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500,
                dom: 'lBfrtip',
                buttons: {
                    buttons: [
                        { extend: 'copy', className: 'copyButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'csv', className: 'csvButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'excel', className: 'excelButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'pdf', className: 'pdfButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'print', className: 'printButton',  exportOptions: {columns: [ 0, 1 ]  }}
                    ]
                }
            });

            Backend.DataTableSearch.init(dataTable);
        });
    </script>
@endsection
