@extends('Adminpanel::layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ПРОТОКОЛЫ ПЕРЕДАЧ
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i>Главная</a></li>
            <li class="active">Протоколы передач</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
        <div class="form-group" >
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#comingproposals">ЗАЯВКИ НА ПРИХОД</a></li>
                <li><a data-toggle="tab" href="#uncomingproposals">ЗАЯВКИ НА РАСХОД</a></li>
            </ul>
            <div class="tab-content">
                <div id="comingproposals" class="tab-pane fade in active">
                    <h2>ЗАЯВКИ НА ПРИХОД</h2>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Тип заявки</th>
                                <th>Статус заявки</th>
                                <th>Наименование</th>
                                <th>Дата</th>
                                <th>Из подразделения</th>
                                <th>В подразделение</th>
                            </thead>
                            <tbody class="evos_proposals">
                            @foreach($comingproposal_logs as $proposal_log)
                            <tr>
                                <td><?php if ($proposal_log->type == 0) {echo 'Внешняя';}else{echo 'Внутренняя';} ?></td>
                                <td><?php if ($proposal_log->status == 0) {echo 'Неактивная';}else{echo 'Активная';} ?></td>
                                <td>{{$proposal_log->name}}</td>
                                <td>{{$proposal_log->created_at}}</td>
                                <td>{{$proposal_log->department}}</td>
                                <td>{{$proposal_log->exdepartment}}</td>
                            </tr>
                        @endforeach
                            </tfoot>
                        </table>
                </div>

                <div id="uncomingproposals" class="tab-pane fade">
                <h2>ЗАЯВКИ НА РАСХОД</h2>
                <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Тип заявки</th>
                                <th>Статус заявки</th>
                                <th>Наименование</th>
                                <th>Дата</th>
                                <th>Из подразделения</th>
                                <th>В подразделение</th>
                            </thead>
                            <tbody class="evos_proposals">
                            @foreach($uncomingproposal_logs as $proposal_log)
                            <tr>
                                <td><?php if ($proposal_log->type == 0) {echo 'Внешняя';}else{echo 'Внутренняя';} ?></td>
                                <td><?php if ($proposal_log->status == 0) {echo 'Неактивная';}else{echo 'Активная';} ?></td>
                                <td>{{$proposal_log->name}}</td>
                                <td>{{$proposal_log->created_at}}</td>
                                <td>{{$proposal_log->department}}</td>
                                <td>{{$proposal_log->exdepartment}}</td>
                            </tr>
                        @endforeach
                            </tfoot>
                        </table>
                </div>
            </div>
        </div>

        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
@endsection
