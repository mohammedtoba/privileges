@extends ('layouts/fixed_menu')

{{-- Page title --}}
@section('title')
    Department setup
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <!--Plugin styles -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/jstree/css/style.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/select2/css/select2.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datatables/css/scroller.bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datatables/css/colReorder.bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/datatables/css/dataTables.bootstrap.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/dataTables.bootstrap.css')}}" />
    <!-- end of plugin styles -->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/tables.css')}}" />
    <!--End of page level styles-->
@stop
    @section('content')
        <header class="head">
            <div class="main-bar">
                <div class="row">
                    <div class="col-sm-5 col-12">
                        <h4 class="nav_top_align">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                            Departments
                        </h4>
                    </div>
                    <div class="col-sm-7 col-12">
                        <ol class="breadcrumb float-right nav_breadcrumb_top_align">
                            <li class="breadcrumb-item">
                                <a href="index">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Control Panel</a>
                            </li>
                            <li class="breadcrumb-item active">Department</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>
        <div class="outer">
            <div class="inner bg-container">
                <div class="row">
                    <div class="col-lg">
                        <div class="card ">
                            <div class="card-header bg-mint">
                                <span>
                                    <i class="fa fa-plus"></i>
                                </span>
                                Add a New department
                            </div>
                            <div class="card-body m-t-25">
                                
                                <form action="{{route('saveDept')}}" method="POST">
                                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="dept_nam" class="control-label">Department name*</label>
                                        <input type="text" class="form-control" id="dept_nam" name="dept_nam">
                                    </div>
                                    <div class="form-group">
                                        <label for="head_userid" class="control-label">Head of department*</label>
                                        <select class="form-control" id="head_userid" name="head_userid">
                                            <option disabled selected value> -- select department head -- </option>
                                            @foreach($user as $u) 
                                            <option {{old('head_userid')==$u->id? 'selected':''}}  value={{ $u->id}} >Dr. {{$u->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="parent_depno" class="control-label">Parent department*</label>
                                        <select class="form-control" id="parent_depno" name="parent_depno">
                                            <option disabled selected value> -- select parent daprtment -- </option>
                                            @foreach($depts as $de) 
                                            <option {{old('parent_depno')==$de->id? 'selected':''}}  value={{ $de->id}} >{{$de->dept_nam}}</option>
                                                    @endforeach
                                        </select>
                                    </div>
                                    
                                    <div>
                                        <button type="submit" class="btn  btn-mint">
                                            <span><i class="fa fa-save"></i></span>
                                         &nbsp; save</button>
                                    </div>
                                </form>    
                            </div>
                        </div>
                    </div>
                
                    <div class="col-lg">
                        <div class="card ">
                            <div class="card-header bg-mint">
                                <span>
                                    <i class="fa fa-sitemap"></i>
                                </span>
                                Tree view
                            </div>
                            <div class="card-body m-t-35">
                                <form id="search">
                                    <input type="search" id="input_search" />
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </form>
                                <div id="jstree6" class="m-t-25">
                                    <ul>
                                        @foreach($departments as $department)
                                            <li>
                                                {{ $department->dept_nam }}
                                                @if(count($department->childs))
                                                    @include('ControlPanels.manageChild',['childs' => $department->childs])
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg">
                        <div class="card m-t-35">
                            <div class="card-header bg-success">
                               <i class="fa fa-table"></i>  List of department
                            </div>
                            <div class="card-body m-t-25">
                                <table id="example1" class="display table table-stripped table-bordered">
                                    <thead>
                                        <tr class="text-center"> 
                                            <th width="20%">Department name</th> 
                                            <th width="30%">Head of department</th>
                                            <th width="20%">Parent department</th>
                                            <th width="5%">Update</th>
                                            <th width="5%">Activate/</br>Deactivate</th>
                                            <th width="5%">Delete</th>
                                         </tr> 
                                    </thead>
                                    <tbody>
                                        @foreach($deptDetail as $dd) 
                                            <tr 
                                            @if($dd->dept_actv=='N')
                                             style="color:grey;"
                                             @endif
                                             > 
                                                <form action="{{route('editDept',$dd->id)}}" method="POST">
                                                            {{ csrf_field() }}
                                                    <td>
                                                        @if($dd->dept_actv=='N')
                                                        Inactive: 
                                                        @endif
                                                        {{$dd->dept_nam}}</td>
                                                    <td>
                                                        <select class="form-control" id="head_userid" name="head_userid"
                                                        @if($dd->dept_actv=='N') disabled @endif>
                                                            <option disabled selected value> -- select department head -- </option>
                                                            @foreach($user as $u) 
                                                            <option {{old('head_userid',$dd->head_userid)==$u->id? 'selected':''}}  value={{ $u->id}} > Dr. {{$u->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-control" id="parent_depno" name="parent_depno" 
                                                        @if($dd->dept_actv=='N') disabled @endif>
                                                            <option disabled selected value> -- select parent daprtment -- </option>
                                                            @foreach($depts as $de) 
                                                            <option {{old('parent_depno',$dd->parent_depno)==$de->id? 'selected':''}}  value={{ $de->id}} > {{$de->dept_nam}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="submit" class="btn btn-sx @if($dd->dept_actv=='N') btn-disabled @else btn-info @endif" 
                                                        @if($dd->dept_actv=='N') disabled @endif>update</button>
                                                        
                                                    </td>
                                                </form>
                                                    <td class="text-center">
                                                        <form action="{{route('activeDept',[$dd->id,$dd->dept_actv])}}" method="POST">
                                                            {{ csrf_field() }}
                                                            <button class="btn btn-sx @if($dd->dept_actv=='N') btn-success @else btn-default @endif">
                                                                <span class="fa fa-circle" aria-hidden="true"></span></button>
                                                        </form>
                                                    </td>
                                                    <td class="text-center">
                                                        <form action="{{route('delDept',$dd->id)}}" method="POST">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button class="btn btn-sx @if($dd->dept_actv=='N') btn-disabled @else btn-danger @endif" @if($dd->dept_actv=='N') disabled @endif>
                                                                <span class="fa fa-remove" aria-hidden="true"></span></button>
                                                        </form>
                                                    </td>
                                        @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <!-- /.outer -->
            </div>
        </div>
@stop
@section('footer_scripts')
<script type="text/javascript" src="{{asset('assets/vendors/jstree/js/jstree.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/pages/jstree.js')}}"></script>
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
<!-- end of plugin scripts -->
<!--Page level scripts-->
<script type="text/javascript" src="{{asset('assets/js/pages/simple_datatables.js')}}"></script>
@stop