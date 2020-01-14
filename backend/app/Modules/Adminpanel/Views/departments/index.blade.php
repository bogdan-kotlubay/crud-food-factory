@extends('Adminpanel::layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('messages.departments')
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i>@lang('messages.main')</a></li>
                <li class="active">@lang('messages.departments')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <div style="margin:2% 0 2% 0;"><a href="{{ route('adminpanel.departments.create') }}" class="btn-lg btn-success">@lang('messages.addDepartment')</a></div>
                    <div class="form-group">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>@lang('messages.id')</th>
                            <th>@lang('messages.name')</th>
                            <th>@lang('messages.branches')</th>
                            <th>@lang('messages.priority')</th>
                            <th>@lang('messages.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($departments as $department)
                            <tr>
                                <td>{{$department->id}}</td>
                                <td>{{$department->name}}</td>
                                @if($department->branch == null)
                                <td>No department</td>
                                @else
                                <td>{{$department->branch->name}}</td>
                                @endif
                                <td>{{$department->priority}}</td>
                                <td><a href="{{ route('adminpanel.departments.edit', $department->id) }}" class="fa fa-pencil"></a>
                                {{Form::open(['route'=>['adminpanel.departments.destroy', $department->id], 'method'=>'delete'])}}
                                <button onclick="return confirm('Вы уверены?')" type="submit" class="delete">
                                    <i class="fa fa-remove"></i>
                                </button>
                                {{Form::close()}}

                                </td>
                            </tr>
                        @endforeach

                        </tfoot>
                    </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
