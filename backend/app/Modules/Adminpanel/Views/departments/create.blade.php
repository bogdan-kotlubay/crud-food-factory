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
                @lang('messages.addDepartment')
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i>@lang('messages.main')</a></li>
                <li><a href="/admin/departments">@lang('messages.departments')</a></li>
                <li class="active">@lang('messages.addDepartment')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{Form::open([
            'route'	=> 'adminpanel.departments.store',
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
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>@lang('messages.branches')</label>
                            <select name="branch_id" class="form-control">
                                
                                @if($branches == null)
                                    <option value="disabled">please create branch</option>
                                @endif
                            @foreach($branches as $branch)
                            <option value="{{$branch->id}}">{{$branch->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('messages.priority')</label>
                            <?php echo Form::selectRange('priority', 0, 10, null, ['class' => 'form-control']);?>

                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ route('adminpanel.departments.index') }}">@lang('messages.back')</a>
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
