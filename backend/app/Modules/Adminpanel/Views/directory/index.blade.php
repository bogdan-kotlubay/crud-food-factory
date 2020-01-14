@extends('Adminpanel::layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('messages.directory')
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i>@lang('messages.main')</a></li>
                <li class="active">@lang('messages.directory')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-md-12">
                    <div class="form-group">
                        <h3 align="center">@lang('messages.importGoodsToDatabase')</h3>
                        <br />
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @lang('messages.errorInLoading')<br><br>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                            {{ csrf_field() }}
                            <div class="form-group">
                                {{Form::open([
                            'route'	=> 'adminpanel.directory.store',
                            'files'	=>	true
                            ])}}
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <td width="40%" align="right"><label>@lang('messages.chooseFileForLoading')</label></td>
                                        <td width="30">
                                            <input type="file" name="select_file" />
                                        </td>
                                        <td width="30%" align="left">
                                            <input type="submit" name="upload" class="btn btn-primary" value="@lang('messages.loadGoodsFromFile')">
                                        </td>
                                    </tr>
                                </table>
                                {!! Form::close() !!}
                            </div>

                        <br />
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <table class="table table-bordered table-striped">
                                <tr>
                                    <td width="40%" align="right">@lang('messages.avialableFormats')</td>
                                    <td width="30"><span class="text-muted">.xls, .xslx</span></td>
                                    <td width="30%" align="left">
                                       
                                            
                                    {{-- <form action="/directorydestroyall" method="DELETE">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-primary" onclick="return alert('Функционал в разработке')" type="submit" class="delete">@lang('messages.deleteAllGoods')</button>
                                    </form> --}}

                                    {{Form::open(['route'=>'adminpanel.destroyAll', 'method'=>'delete'])}}
                                <button onclick="return confirm('Вы уверены?')" type="submit" class="btn btn-primary delete">
                                @lang('messages.deleteAllGoods')
                                </button>

                                {{Form::close()}}
                                    
                                    
                                </td>
                                    
                                </tr>
                                </table>
                                <h3 class="panel-title">@lang('messages.groupOfGoods')</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>@lang('messages.id')</th>
                                            <th>@lang('messages.name')</th>
                                            <th>@lang('messages.amount')</th>
                                            <th>Сумма б/н</th>
                                            <th>Ндс</th>
                                            <th>Сумма в/н</th>
                                            <th>@lang('messages.actions')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($directoryproducts as $directoryproduct)
                                            <tr>
                                                <td>{{ $directoryproduct->id }}</td>
                                                <td>{{ $directoryproduct->name }}</td>
                                                <td>{{ $directoryproduct->count }}</td>
                                                <td>{{ $directoryproduct->summa }}</td>
                                                <td>{{ $directoryproduct->nds }}</td>
                                                <td>{{ $directoryproduct->summa2 }}</td>
                                                <td><a href="{{ route('adminpanel.directory.edit', $directoryproduct->id) }}" class="fa fa-pencil"></a>
                                                    {{Form::open(['route'=>['adminpanel.directory.destroy', $directoryproduct->id], 'method'=>'delete'])}}
                                                    <button onclick="return confirm('Вы уверены?')" type="submit" class="delete">
                                                        <i class="fa fa-remove"></i>
                                                    </button>
                                            </tr>
                                        @endforeach
                                        </tfoot>
                                    </table>
                    </div>
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
