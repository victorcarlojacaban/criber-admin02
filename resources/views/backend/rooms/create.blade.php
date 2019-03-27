@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.rooms.management') . ' | ' . trans('labels.backend.rooms.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.rooms.management') }}
        <small>{{ trans('labels.backend.rooms.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.rooms.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-room', 'files' => true]) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.rooms.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.rooms.partials.rooms-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.rooms.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.rooms.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!-- form-group -->
            </div><!--box-body-->
        </div><!--box box-success-->
    {{ Form::close() }}
@endsection
