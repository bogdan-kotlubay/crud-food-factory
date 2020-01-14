@extends('Adminpanel::layouts.app')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>@lang('messages.main')</h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="row" style="margin-top: 20px;">
                    <!-- ./col -->
                    <div class="col-lg-4 col-xs-12">
                        <!-- small box -->
                        <a href="{{route('adminpanel.users.index')}}" class="small-box-footer">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <p>@lang('messages.USER')</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                        </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-xs-12">
                        <!-- small box -->
                        <a href="{{route('adminpanel.branches.index')}}" class="small-box-footer">
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <p>@lang('messages.BRANCHES')</p>
                                </div>
                                <div class="icon">
                                    <i class="ion-ios-world-outline"></i>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-xs-12">
                        <!-- small box -->
                        <a href="{{route('adminpanel.positions.index')}}" class="small-box-footer">
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <p>@lang('messages.POSITIONS')</p>
                                </div>
                                <div class="icon">
                                    <i class="ion-briefcase"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- ./col -->
                </div>

                <div class="row">
                    <!-- ./col -->
                    <div class="col-lg-4 col-xs-12">
                        <!-- small box -->
                        <a href="{{route('adminpanel.departments.index')}}" class="small-box-footer">
                            <div class="small-box bg-purple">
                                <div class="inner">
                                    <p>@lang('messages.DEPARTMENTS')</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-xs-12">
                        <!-- small box -->
                        <a href="{{route('adminpanel.comingproducts.index')}}" class="small-box-footer">
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <p>@lang('messages.DIRECTORY')</p>

                                </div>
                                <div class="icon">
                                    <i class="ion-social-buffer"></i>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-xs-12">
                        <!-- small box -->
                        <a href="{{route('adminpanel.uncomingproducts.index')}}" class="small-box-footer">
                            <div class="small-box bg-orange">
                                <div class="inner">
                                    <p>@lang('messages.WAREHOUSE')</p>
                                </div>
                                <div class="icon">
                                    <i class="ion-social-buffer"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                    <!-- ./col -->
                </div>
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
@endsection
