@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.testimonials.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.testimonials.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.testimonials.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.testimonials.partials.testimonials-header-buttons')
            </div>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="testimonials-table" class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.testimonials.table.id') }}</th>
                            <th>Name</th>
                            <th>Message</th>
                            <th>Image</th>
                            <th>Video</th>
                            <th>{{ trans('labels.backend.testimonials.table.createdat') }}</th>
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
            var dataTable = $('#testimonials-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.testimonials.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: '{{config('module.testimonials.table')}}.id'},
                    {data: 'tenant_name', name: '{{config('module.testimonials.table')}}.tenant_name'},
                    {data: 'message', name: '{{config('module.testimonials.table')}}.message'},
                    {data: 'image_url', name: '{{config('module.testimonials.table')}}.image_url'},
                    {data: 'video_url', name: '{{config('module.testimonials.table')}}.video_url'},
                    {data: 'created_at', name: '{{config('module.testimonials.table')}}.created_at'},
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
