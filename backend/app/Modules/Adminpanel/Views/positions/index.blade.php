@extends('Adminpanel::layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('messages.positions')
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i>@lang('messages.main')</a></li>
                <li class="active">@lang('messages.positions')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <div style="margin:2% 0 2% 0;"><a href="{{ route('adminpanel.positions.create') }}" class="btn-lg btn-success">@lang('messages.addPosition')</a></div>
                    <div class="form-group">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>@lang('messages.id')</th>
                            <th>@lang('messages.positions')</th>
                            <th>@lang('messages.departments')</th>
                            <th>@lang('messages.actions')</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($positions as $position)
                            <tr>
                                <td>{{$position->id}}</td>
                                <td>{{$position->name}}</td>
                                <td>{{$position->department->name}}</td>
                                <td><a href="{{ route('adminpanel.positions.edit', $position->id) }}" class="fa fa-pencil"></a>
                                {{Form::open(['route'=>['adminpanel.positions.destroy', $position->id], 'method'=>'delete'])}}
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
