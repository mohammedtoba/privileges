@extends('layouts/fixed_menu')

{{-- Page title --}}
@section('title')
    Users
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/select2/css/select2.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/dataTables.bootstrap.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/select2/css/select2.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datatables/css/scroller.bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datatables/css/colReorder.bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datatables/css/dataTables.bootstrap.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/dataTables.bootstrap.css')}}" />
    <script type="text/javascript" src="{{asset('assets/vendors/select2/js/select2.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pluginjs/dataTables.tableTools.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.colReorder.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.buttons.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.responsive.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.rowReorder.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/buttons.colVis.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/buttons.html5.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/buttons.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/buttons.print.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.scroller.min.js')}}"></script>
    <!--End of plugin styles-->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/tables.css')}}"/>
    <!-- end of page level styles -->
@stop


{{-- Page content --}}
@section('content')
    <header class="head">
        <div class="main-bar">
            <div class="row">
                <div class="col-lg-6 col-sm-4">
                    <h4 class="nav_top_align">
                        <i class="fa fa-user"></i>
                        User Grid
                    </h4>
                </div>
                <div class="col-lg-6 col-sm-8 col-12">
                    <ol class="breadcrumb float-right  nav_breadcrumb_top_align">
                        <li class="breadcrumb-item">
                            <a href="index">
                                <i class="fa fa-home" data-pack="default" data-tags=""></i> Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Users</a>
                        </li>
                        <li class="active breadcrumb-item">User Grid</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
    <div class="outer">
        <div class="inner bg-container">
            <div class="card" id="currentUsers">
                <div class="card-header bg-primary">
                    Active Users Grid
                </div>
                <div class="card-body m-t-35" id="user_body">
                    <div class="table-toolbar">
                        <div class="btn-group">
                            <a href="add_user" id="editable_table_new" class=" btn btn-default">
                                Add User  <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <div class="btn-group float-right users_grid_tools">
                            <div class="tools"></div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <table class="table  table-striped table-bordered table-hover dataTable no-footer" id="editable_table" role="grid">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc wid-20 " tabindex="0" rowspan="1" colspan="1">Username</th>
                                    <th class="sorting wid-25 text-center" tabindex="0" rowspan="1" colspan="1">E-Mail</th>
                                    <th class="sorting wid-10 text-center" tabindex="0" rowspan="1" colspan="1">Department</th>
                                    <th class="sorting wid-20 text-center" tabindex="0" rowspan="1" colspan="1">Emplyee number</th>
                                    <th class="sorting wid-20 text-center" tabindex="0" rowspan="1" colspan="1">Role</th>
                                    <th class="sorting wid-15 text-center" tabindex="0" rowspan="1" colspan="1">User type</th> 
                                    <th class="sorting wid-10 text-center" tabindex="0" rowspan="1" colspan="1">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    @if($user->usractv == 'Y')
                                    <tr role="row" class="even">
                                        <td class="sorting_1">{{$user->name.' '.$user->name_ar}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            {{$user->Department->dept_nam}}
                                        </td>
                                        <td class="text-center">{{$user->empno}}</td>
                                        <td class="text-center">
                                            @if($user->role)
                                            {{$user->role->name}}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="btn {{$user->usrtype=='M'?'btn-success':'btn-secondary'}} fa {{$user->usrtype=='M'?'fa-stethoscope':'fa-user'}}" data-toggle="tooltip" data-placement="top" title="{{$user->usrtype=='M'?'Medical staff':'Non medical staff'}}"></div>
                                        </td>
                                        <td class="text-center">
                                            <a href="view_user" data-toggle="tooltip" data-placement="top" title="View User">
                                                <i class="fa fa-eye text-success"></i></a>
                                                &nbsp; &nbsp;
                                            <a class="edit" data-toggle="tooltip" data-placement="top" title="edit" href="{{route('addUsers',$user->id)}}">
                                                <i class="fa fa-pencil text-warning"></i></a>
                                                &nbsp; &nbsp;
                                            <a class="delete hidden-xs hidden-sm" data-toggle="tooltip" data-placement="top" title="Delete" href="{{route('activeUser',[$user->id,'N'])}}">
                                                <i class="fa fa-trash text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            <div class="card m-t-35" id="deletedUsers">
                <div class="card-header bg-primary">
                    Deleted Users Grid
                </div>
                    <div class="card-body m-t-35" id="user_body2">
                        <div>

                            <table id="example1" class="display table table-stripped table-bordered">
                                <thead>
                                <tr role="row ">
                                    <th class="sorting_asc wid-20 text-center" tabindex="0" rowspan="1" colspan="1">Username</th>
                                    <th class="sorting wid-25 text-center" tabindex="0" rowspan="1" colspan="1">E-Mail</th>
                                    <th class="sorting wid-10 text-center" tabindex="0" rowspan="1" colspan="1">Department</th>
                                    <th class="sorting wid-20 text-center" tabindex="0" rowspan="1" colspan="1">Emplyee number</th>
                                    <th class="sorting wid-20 text-center" tabindex="0" rowspan="1" colspan="1">Role</th>
                                    <th class="sorting wid-15 text-center" tabindex="0" rowspan="1" colspan="1">User type</th>
                                    <th class="sorting wid-10 text-center" tabindex="0" rowspan="1" colspan="1">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    @if($user->usractv != 'Y')
                                    <tr role="row" class="even">
                                        <td class="sorting_1">{{$user->name.' '.$user->name_ar}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            {{$user->Department->dept_nam}}
                                        </td>
                                        <td class="text-center">{{$user->empno}}</td>
                                        <td class="text-center">
                                            @if($user->role)
                                            {{$user->role->name}}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="btn {{$user->usrtype=='M'?'btn-success':'btn-secondary'}} fa {{$user->usrtype=='M'?'fa-stethoscope':'fa-user'}}" data-toggle="tooltip" data-placement="top" title="{{$user->usrtype=='M'?'Medical staff':'Non medical staff'}}"></div>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('activeUser',[$user->id,'Y'])}}" data-toggle="tooltip" data-placement="top" title="Restore">
                                                <i class="fa fa-users text-success"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
            </div>
            
        </div>
        <!-- /.inner -->
    </div>
    <!-- /.outer -->
@stop
{{-- page level scripts --}}
@section('footer_scripts')
    <!--Plugin scripts-->
    <script type="text/javascript" src="{{asset('assets/vendors/select2/js/select2.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.responsive.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.buttons.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/buttons.colVis.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/buttons.html5.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/buttons.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/buttons.print.min.js')}}"></script>
     <script type="text/javascript" src="{{asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/holderjs/js/holder.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/jquery.backstretch/js/jquery.backstretch.js')}}"></script>
    <!--end of plugin scripts-->
    <!--Page level scripts-->
    <script type="text/javascript" src="{{asset('assets/js/pages/users.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/validation.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/simple_datatables.js')}}"></script>
    <!-- end page level scripts -->

 <!--End of plugin js-->
<script type="text/javascript" src="{{asset('assets/js/pages/login4.js')}}"></script>
@stop