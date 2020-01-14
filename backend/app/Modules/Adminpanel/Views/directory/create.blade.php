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
                Добавить филиал
            </h1>
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
                            <label for="exampleInputEmail1">Название филиала</label>
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
                    <a href="{{ route('adminpanel.branches.index') }}">Назад</a>
                    <button class="btn btn-success pull-right">Создать</button>
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
