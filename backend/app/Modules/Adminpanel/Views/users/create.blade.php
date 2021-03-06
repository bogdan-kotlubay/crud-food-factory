@extends('Adminpanel::layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <ul class="list-group">
                        <li >{{ $error }}</li>
                    </ul>
                        
                    @endforeach
                </ul>
            </div>
    @endif
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('messages.addUser')
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i>@lang('messages.main')</a></li>
                <li><a href="/admin/users">@lang('messages.users')</a></li>
                <li class="active">@lang('messages.addUser')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{Form::open([
            'route'	=> 'adminpanel.users.store',
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
                            <label for="exampleInputEmail1">@lang('messages.login')</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="login">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('messages.password')</label>
                            <input type="password" class="form-control" id="exampleInputEmail1" placeholder="" name="password">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>@lang('messages.group')</label>
                            {!! Form::select('role', $roles, 0, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>@lang('messages.departments')</label>
                            <select name="department" class="form-control">
                            @foreach($departments as $department)
                            <option value="{{$department->id}}">{{$department->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>@lang('messages.branches')</label>
                            <select name="branch" class="form-control">
                            @foreach($branches as $branch)
                            <option value="{{$branch->id}}">{{$branch->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>@lang('messages.positions')</label>
                            <select name="position" class="form-control">
                            @foreach($positions as $position)
                            <option value="{{$position->id}}">{{$position->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ route('adminpanel.users.index') }}">@lang('messages.back')</a>
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
