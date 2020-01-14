@extends('Adminpanel::layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('messages.addBranch')
            </h1>

            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i>@lang('messages.main')</a></li>
                <li><a href="/admin/branches">@lang('messages.branches')</a></li>
                <li class="active">@lang('messages.addBranch')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{Form::open([
            'route'	=> 'adminpanel.branches.store',
            'files'	=>	true
        ])}}
        <!-- Default box -->
            <div class="box">
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('messages.name')</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="name">
                        </div>
                    </div>
                    <!-- <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Приоритет филиала</label>
                            // echo Form::selectRange('priority', 0, 10, null, ['class' => 'form-control']);?>

                        </div>
                    </div> -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ route('adminpanel.branches.index') }}">@lang('messages.back')</a>
                    <button class="btn btn-success pull-right">@lang('messages.create')</button>
                </div>
                <!-- /.box-footer-->
                {!! Form::close() !!}
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
