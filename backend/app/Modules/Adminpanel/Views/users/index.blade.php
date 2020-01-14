@extends('Adminpanel::layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('messages.users')
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i>@lang('messages.main')</a></li>
                <li class="active">@lang('messages.users')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <div style="margin:2% 0 2% 0;"><a href="{{ route('adminpanel.users.create') }}" class="btn-lg btn-success">@lang('messages.addUser')</a></div>
                    <div class="form-group">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>@lang('messages.id')</th>
                            <th>@lang('messages.name')</th>
                            <th>@lang('messages.login')</th>
                            <th>@lang('messages.group')</th>
                            <th>@lang('messages.branches')</th>
                            <th>@lang('messages.departments')</th>
                            <th>@lang('messages.positions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->login}}</td>
                                <td>{{$user->role}}</td>
                                @if($user->branch == null)
                                <td>Нет филиалов</td>
                                @else
                                <td>{{$user->branch->name}}</td>
                                @endif
                                
                                @if($user->department == null)
                                <td>Нет отделов</td>
                                @else
                                <td>{{$user->department->name}}</td>
                                @endif
                                
                                @if($user->position == null)
                                <td>Нет должностей</td>
                                @else
                                <td>{{$user->position->name}}</td>
                                @endif
                                

                                <td><a href="{{ route('adminpanel.users.edit', $user->id) }}" class="fa fa-pencil"></a>
                                {{Form::open(['route'=>['adminpanel.users.destroy', $user->id], 'method'=>'delete'])}}
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
