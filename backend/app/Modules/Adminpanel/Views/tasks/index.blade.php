@extends('Adminpanel::layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Задачи
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li class="active">Задачи</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <a href="{{route('adminpanel.tasks.create') }}" class="btn btn-success">Добавить задачу</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Заголовок</th>
                  <th>Сотрудник</th>
                  <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                <tr>
                  <td>{{$task->id}}</td>
                  <td>{{$task->name}}</td>
                  <td>
                  <a href="{{route('tasks.edit', $task->id)}}" class="fa fa-pencil"></a>

                  {{Form::open(['route'=>['tasks.destroy', $task->id], 'method'=>'delete'])}}
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
            <!-- /.box-body -->
          </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
