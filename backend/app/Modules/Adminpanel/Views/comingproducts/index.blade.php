@extends('Adminpanel::layouts.app')
@section('content')

<style>
    .modal {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
        background:#fff;
        max-width:100%;
        overflow-y: auto;
        height:685px;
        flex:auto;
    }

.modal a.close-modal[class*="icon-"] {
  top: -10px;
  right: -10px;
  width: 20px;
  height: 20px;
  color: #fff;
  line-height: 1.25;
  text-align: center;
  text-decoration: none;
  text-indent: 0;
  background: #900;
  border: 2px solid #fff;
  -webkit-border-radius:  26px;
  -moz-border-radius:     26px;
  -o-border-radius:       26px;
  -ms-border-radius:      26px;
  -moz-box-shadow:    1px 1px 5px rgba(0,0,0,0.5);
  -webkit-box-shadow: 1px 1px 5px rgba(0,0,0,0.5);
  box-shadow:         1px 1px 5px rgba(0,0,0,0.5);
}

    .modal button {
        width:250px;
    }

    .table-modal {
        width: 0;
        left: 50%;
        top: 50%;
    }

    .modal a.close-modal {
        top:5px;
        right:5px;
    }

    .btn-lg {
        font-size: 15px;
    }

    .form-group select {
        height:50px;
    }
    .form-group input {
        height:50px;
    }

    .datepicker.dropdown-menu th, .datepicker.dropdown-menu td {
        padding:15px 20px;
    }
    .modal-add {
    position: absolute;
    top: -12.5px;
    right: -12.5px;
    display: block;
    width: 30px;
    height: 30px;
    text-indent: -9999px;
    }
</style>

<!-- JAVASCRIPT ADD PRODUCTS -->
<script src="/js/addProducts.js" charset="utf-8"></script>

<script>

</script>

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
            ПОДАТЬ ЗАЯВКУ НА ПРИХОД
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i>Главная</a></li>
            <li class="active">Заявки на приход</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
        <div class="form-group" >
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <h2>СПИСОК ЗАЯВОК</h2>
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
                            @foreach($comingproducts as $comingproduct)
                            <tr>
                                <td><?php if ($comingproduct->type == 0) {echo 'Внешняя';}else{echo 'Внутренняя';} ?></td>
                                <td><?php if ($comingproduct->status == 0) {echo 'Неактивная';}else{echo 'Активная';} ?></td>
                                <td>{{$comingproduct->name}}</td>
                                <td>{{$comingproduct->created_at}}</td>
                                <td>{{$comingproduct->department}}</td>
                                <td>{{$comingproduct->exdepartment}}</td>
                                <td><a href="{{ route('adminpanel.comingproducts.edit', $comingproduct->id) }}" class="fa fa-pencil"></a>
                                <form action="{{ route('adminpanel.comingproducts.destroy', $comingproduct->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger">УДАЛИТЬ</button>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                            </tfoot>
                        </table>
                    <a data-toggle="tab" href="#menu1"><button style="margin:2% 0 2% 0;" class="btn btn-success btn-lg pull-right" id="add_request_evos" >ДОБАВИТЬ ЗАЯВКУ</button></a>
                </div>

                <div id="menu1" class="tab-pane fade">

                            <div class="form-group col-md-6">
                                <h2>Наименование заявки</h2>
                                <input type="text" name="name-proposal" class="form-control" placeholder="Введите имя">

                                <h2>Период дня</h2>
                                <select class="form-control" name="hour-proposal">
                                    <option value="0"></option>
                                    <option value="1">Весь день</option>
                                </select>

                                <h2>Подразделение</h2>
                                <a href="#departments" data-toggle="offcanvas"><input type="text" name="department-proposal" class="form-control nmpd-target" onclick="getDepartments();" placeholder="Выберите подразделение" data-numpad="nmpd2"></a>
                            </div>
                            <div class="form-group col-md-6">
                                <h2>Тип заявки</h2>
                                <select class="form-control" name="type-proposal">
                                    <option value="0">Внешняя</option>
                                    <option value="1">Внутренняя</option>
                                </select>

                                <h2>Место реализации</h2>
                                <a href="#exdepartments" data-toggle="offcanvas"><input type="text" name="exdepartment-proposal" class="form-control nmpd-target" onclick="getExDepartments();" placeholder="Выберите место реализации" data-numpad="nmpd1"></a>


                                <h2>Статус заявки</h2>
                                <select class="form-control" name="status-proposal">
                                    <option value="0">Неактивная</option>
                                    <option value="1">Активная</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <a data-toggle="tab" href="#home"><button style="margin:2% 0 2% 0;" class="btn btn-danger btn-lg pull-left" id="add_request_evos" >НАЗАД</button></a>
                                <a data-toggle="tab" href="#menu2"><button style="margin:2% 0 2% 0;" class="btn btn-success btn-lg pull-right" id="add_request_evos" >ДАЛЕЕ</button></a>
                            </div>
                </div>

                <div id="menu2" class="tab-pane fade">
                <div id="danger_alert">
                </div>
                    <h2>Товары</h2>
                    <a href="#ex_one" rel="modal:open;" data-toggle="offcanvas" onclick="getCategories()"><button class="btn btn-lg btn-info pull-right">ДОБАВИТЬ ТОВАР</button></a>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Код товара</th>
                                <th>Наименование</th>
                                <th>Количество</th>
                                <th>Тип товара</th>
                                <th>Действия</th>
                            </thead>
                            <tbody class="evos_list">
                            </tfoot>
                        </table>
                    <a data-toggle="tab" href="#menu1"><button style="margin:2% 0 2% 0;" class="btn btn-danger btn-lg pull-left" id="add_request_evos" >НАЗАД</button></a>
                    <button onclick="sendDataProposal()"  style="margin:2% 0 2% 0;" class="btn btn-success btn-valid btn-lg pull-right" id="buttonSubmitProduct" disabled = "true">СОХРАНИТЬ</button>
                </div>
            </div>
        </div>

        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>

<!-- Modal START HTML embedded directly into document -->

<div id="ex_one" class="modal">
    <div name="groups" class="groups">
    </div>
    <a href="#close-modal" data-toggle="offcanvas" rel="modal:close" class="close-modal "><button style="margin:2% 0 2% 0;" class="btn btn-danger btn-lg pull-right" id="add_request_evos" >ЗАКРЫТЬ</button></a>
</div>

<div id="ex2" class="modal">
</div>

<div id="departments" class="modal">
    <div class="departments" name="departments">
    </div>
    <a href="#close-modal" data-toggle="offcanvas" rel="modal:close" class="close-modal "><button style="margin:2% 0 2% 0;" class="btn btn-danger btn-lg pull-right" id="add_request_evos" >ЗАКРЫТЬ</button></a>
</div>

<div id="exdepartments" class="modal">
    <div class="exdepartments" name="exdepartments">
    </div>
    <a href="#close-modal" data-toggle="offcanvas" rel="modal:close" class="close-modal "><button style="margin:2% 0 2% 0;" class="btn btn-danger btn-lg pull-right" id="add_request_evos" >ЗАКРЫТЬ</button></a>
</div>
<!-- MODAL END -->

<!-- /.content-wrapper -->

<script type="text/javascript" charset="utf-8">
  $(function() {


    $('a[href="#ex_one"]').click(function(event) {
      event.preventDefault();
      $(this).modal({
        escapeClose: false,
        clickClose: false,
        showClose: false,
      });
    });

    $('a[href="#ex2"]').click(function(event) {
        console.log('success');
      event.preventDefault();

    });

    $('a[href="#ex3"]').click(function(event) {
      event.preventDefault();
      $(this).modal({
        escapeClose: false,
        clickClose: false,
        showClose: false
      });
    });

    $('a[href="#departments"]').click(function(event) {
      event.preventDefault();
      $(this).modal({
        escapeClose: false,
        clickClose: false,
        showClose: false
      });
    });

    $('a[href="#exdepartments"]').click(function(event) {
      event.preventDefault();
      $(this).modal({
        escapeClose: false,
        clickClose: false,
        showClose: false
      });
    });

    

  });
</script>
@endsection
