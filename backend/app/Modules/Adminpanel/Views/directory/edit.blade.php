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
                @lang('messages.editDirectory')
            </h1>
        </section>
        
        <!-- Main content -->
        <section class="content">
        {{Form::open([
            'route'	=>	['adminpanel.directory.update', $directoryproduct->id],
            'files'	=>	true,
            'method'	=>	'put'
        ])}}
        
        <!-- Default box -->
            <div class="box">
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('messages.nameOfGood')</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="name" value="{{$directoryproduct->name}}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('messages.amount')</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="" name="count" value="{{$directoryproduct->count}}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('messages.sum')</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="" name="summa" value="{{$directoryproduct->summa}}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('messages.nds')</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="" name="nds" value="{{$directoryproduct->nds}}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('messages.sum')2</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="" name="summa2" value="{{$directoryproduct->summa2}}">
                        </div>
                    </div>
                    
                </div>
                <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('adminpanel.directory.index') }}">@lang('messages.back')</a>
                        <button class="btn btn-warning pull-right">@lang('messages.save')</button>
                    </div>
                    <!-- /.box-footer-->
                    {{Form::close()}}
                </div>
                <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
