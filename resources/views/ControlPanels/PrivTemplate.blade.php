@extends ('layouts/fixed_menu')

{{-- Page title --}}
@section('title')
    Privilege templates setup
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
    <link rel="stylesheet" href="{{asset('assets/vendors/multiselect/css/multi-select.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/chosen/css/chosen.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/jquery-tagsinput/css/jquery.tagsinput.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrap-switch/css/bootstrap-switch.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css')}}"/>
    <!-- end of plugin styles -->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/tables.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/form_elements.css')}}"/>
    <!--End of page level styles-->
@stop
    @section('content')
        <header class="head">
            <div class="main-bar">
                <div class="row">
                    <div class="col-sm-5 col-12">
                        <h4 class="nav_top_align">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                            Templates
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
                            <li class="breadcrumb-item active">Template</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>
        <div class="outer">
            <div class="inner bg-container">
                    <ul class="nav nav-inline view_user_nav_padding">
                        <li class="nav-item card_nav_hover">
                            <a class="nav-link active" href="#user" id="template"  data-toggle="tab" aria-expanded="true">Template</a>
                        </li>
                        <li class="nav-item card_nav_hover" >
                            <a class="nav-link disabled" href="#tab2" id="groups" data-toggle="tab">Groups</a>
                        </li>
                        <li class="nav-item card_nav_hover">
                            <a class="nav-link disabled" href="#tab3"  id="details" data-toggle="tab">Details</a>
                        </li>
                    </ul>
            <div id="clothing-nav-content" class="tab-content m-t-10">
                <div role="tabpanel" class="tab-pane fade show active" id="user">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card ">
                                <div class="card-header bg-mint">
                                    <span>
                                        <i class="fa fa-plus"></i>
                                    </span>
                                    Add a New Template
                                </div>
                                <div class="card-body m-t-25">
                                    <form action="{{route('saveTmplPriv')}}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-md-3" > 
                                                    <div class="form-group">
                                                        <label for="templno" class="control-label">Template No.*</label>
                                                        <input type="text" class="form-control" id="templno" name="templno">
                                                    </div>
                                                </div>
                                                <div class="col-md-9" > 
                                                    <div class="form-group">
                                                        <label for="templ_desc" class="control-label">Template Description*</label>
                                                        <input type="text" class="form-control" id="templ_desc" name="templ_desc">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" > 
                                                <div class="form-group">
                                                    <label for="specno" class="control-label">Speciality*</label>
                                                    <select class="form-control" id="specno" name="specno">
                                                        <option disabled selected value> -- select Speciality -- </option>
                                                        @foreach($Specs as $u) 
                                                        <option {{old('specno')==$u->specno? 'selected':''}}  value={{ $u->specno}} >{{$u->spec_desc}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4" > 
                                                <div class="form-group">
                                                    <label for="templ_desc_ar" class="control-label">Notes*</label>
                                                    <input type="text" class="form-control" id="templ_desc_ar" name="templ_desc_ar">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn  btn-mint">
                                                    <span><i class="fa fa-save"></i></span>
                                                 &nbsp; Save</button>
                                            </div>
                                        </div>
                                    </form>    
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-lg-4">
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
                                            @foreach($templates as $templmst)
                                                <li>
                                                    {{ $templmst->templ_desc }}
                                                    @if(count($templmst->childs))
                                                        @include('ControlPanels.manageGrpChild',['childs' => $templmst->childs])
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
                                   <i class="fa fa-table"></i>  List of templates
                                </div>
                                <div class="card-body m-t-25">
                                    <table   class="display table table-stripped table-bordered">
                                        <thead>
                                            <tr class="text-center"> 
                                                <th width="3%">#</th> 
                                                <th width="35%">Descrption</th> 
                                                <th width="22%">Notes</th>
                                                <th width="20%">Speciality</th>
                                                <th width="5%">Update</th>
                                                <th width="5%">Activate?</th>
                                                <th width="5%">Delete</th>
                                             </tr> 
                                        </thead>
                                        <tbody>
                                            @foreach($templates as $dd) 
                                                <tr 
                                                @if($dd->templ_actv=='N')
                                                 style="color:grey;"
                                                 @endif
                                                 > 
                                                    <form action="{{route('editTmplPriv',$dd->templno)}}" method="POST">
                                                                {{ csrf_field() }}
                                                        <td>
                                                            @if($dd->templ_actv=='N')
                                                            Inactive: 
                                                            @endif
                                                            {{$dd->templno}}
                                                        </td>
                                                        <td>
                                                            @if($dd->templ_actv=='N')
                                                            Inactive: 
                                                            @endif
                                                            {{$dd->templ_desc}}
                                                        </td>
                                                        <td>
                                                            <input  type="text " name="templ_desc_ar" value= "@if($dd->templ_actv=='N') Inactive: @endif {{$dd->templ_desc_ar? $dd->templ_desc_ar : ''}} "  @if($dd->templ_actv=='N') disabled @endif > 
                                                        </td>
                                                        <td>
                                                            <select class="form-control" id="specno" name="specno"
                                                            @if($dd->templ_actv=='N') disabled @endif>
                                                                <option disabled selected value> -- select speciality -- </option>
                                                                @foreach($Specs as $u) 
                                                                <option {{old('specno',$dd->specno)==$u->specno? 'selected':''}}  value={{ $u->specno}} >{{$u->spec_desc}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td class="text-center">
                                                            <button type="submit" class="btn btn-sx @if($dd->templ_actv=='N') btn-disabled @else btn-info @endif" 
                                                            @if($dd->templ_actv=='N') disabled @endif>update</button>
                                                        </td>
                                                    </form>
                                                        <td class="text-center">
                                                            <form action="{{route('activeTmplPriv',[$dd->templno,$dd->templ_actv])}}" method="POST">
                                                                {{ csrf_field() }}
                                                                <button class="btn btn-sx @if($dd->templ_actv=='N') btn-success @else btn-default @endif">
                                                                    <span class="fa fa-circle" aria-hidden="true"></span></button>
                                                            </form>
                                                        </td>
                                                        <td class="text-center">
                                                            <form action="{{route('delTmplPriv',$dd->templno)}}" method="POST">
                                                                {{ csrf_field() }}
                                                                {{ method_field('DELETE') }}
                                                                <button class="btn btn-sx @if($dd->templ_actv=='N') btn-disabled @else btn-danger @endif" @if($dd->templ_actv=='N') disabled @endif>
                                                                    <span class="fa fa-remove" aria-hidden="true"></span></button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                             <a href="#" onclick="addGroups();">add groups</a>
                                                        </td>
                                            @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab2">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card ">
                                <div class="card-header bg-mint">
                                    <span>
                                        <i class="fa fa-plus"></i>
                                    </span>
                                    Add a New Group
                                </div>
                                <div class="card-body m-t-25">
                                    <form action="{{route('saveTmplPrivG')}}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-md-3" > 
                                                    <div class="form-group">
                                                        <label for="grp_cod" class="control-label">Group No.*</label>
                                                        <input type="text" class="form-control" id="grp_cod" name="grp_cod">
                                                    </div>
                                                </div>
                                                <div class="col-md-6" > 
                                                    <div class="form-group">
                                                        <label for="grp_desc" class="control-label">Group Description*</label>
                                                        <input type="text" class="form-control" id="grp_desc" name="grp_desc">
                                                    </div>
                                                </div>
                                                <!-- {{old('depno')==$u->depno? 'selected':''}}  value={{ $u->depno}} >{{$u->dept_nam}} -->
                                                <div class="col-lg input_field_sections">
                                                    <h5> Departments </h5>
                                                    <select size="3" multiple class="form-control chzn-select" id="test_me_paddington"
                                                            name="depno" tabindex="8">
                                                        @foreach($depts as $u) 
                                                        <option value="{{$u->depno}}">{{$u->dept_nam}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" > 
                                                <div class="form-group">
                                                    <label for="templno" class="control-label">Template*</label>
                                                    <select class="form-control" id="templno" name="templno">
                                                        <option disabled selected value> -- select template -- </option>
                                                        @foreach($templates as $u) 
                                                        <option {{old('templno')==$u->templno? 'selected':''}}  value={{ $u->templno}} >{{$u->templ_desc}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4" > 
                                                <div class="form-group">
                                                    <label for="grp_desc_ar" class="control-label">Notes*</label>
                                                    <input type="text" class="form-control" id="grp_desc_ar" name="grp_desc_ar">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn  btn-mint">
                                                    <span><i class="fa fa-save"></i></span>
                                                 &nbsp; Save</button>
                                            </div>
                                        </div>
                                    </form>    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
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
                                            @foreach($templates as $templmst)
                                                <li>
                                                    {{ $templmst->templ_desc }}
                                                    @if(count($templmst->childs))
                                                        @include('ControlPanels.manageGrpChild',['childs' => $templmst->childs])
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
                                   <i class="fa fa-table"></i>  List of groups
                                </div>
                                <div class="card-body m-t-25">
                                    <table   class="display table table-stripped table-bordered">
                                        <thead>
                                            <tr class="text-center"> 
                                                <th width="3%">ID</th> 
                                                <th width="3%">templno</th> 
                                                <th width="4%">grp_cod</th> 
                                                <th width="35%">grp_desc</th>
                                                <th width="20%">grp_desc_ar</th>
                                                <th width="20%">dep_list</th>
                                                <th width="5%">Update</th>
                                                <th width="5%">Activate?</th>
                                                <th width="5%">Delete</th>
                                             </tr> 
                                        </thead>
                                        <tbody>
                                            @foreach($templgroups as $dd) 
                                                <tr 
                                                @if($dd->grp_actv=='N')
                                                 style="color:grey;"
                                                 @endif
                                                 > 
                                                    <form action="{{route('editTmplPrivG',$dd->templno)}}" method="POST">
                                                                {{ csrf_field() }}
                                                        <td>
                                                            @if($dd->grp_actv=='N')
                                                            Inactive: 
                                                            @endif
                                                            {{$dd->id}}
                                                       </td>
                                                       <td>
                                                            @if($dd->grp_actv=='N')
                                                            Inactive: 
                                                            @endif
                                                            {{$dd->grp_cod}}
                                                        </td>
                                                        <td>
                                                            @if($dd->grp_actv=='N')
                                                            Inactive: 
                                                            @endif
                                                            {{$dd->templno}}
                                                        </td>
                                                        <td>
                                                            @if($dd->grp_actv=='N')
                                                            Inactive: 
                                                            @endif
                                                            {{$dd->grp_desc}}
                                                        </td>
                                                        <td>
                                                            <input  type="text " name="grp_desc_ar" value= "@if($dd->grp_actv=='N') Inactive: @endif {{$dd->grp_desc_ar? $dd->grp_desc_ar : ''}} "  @if($dd->grp_actv=='N') disabled @endif > 
                                                        </td>
                                                        <td>
                                                            <select class="form-control" id="dep_list" name="dep_list"
                                                            @if($dd->grp_actv=='N') disabled @endif>
                                                                <option disabled selected value> -- select department -- </option>
                                                                @foreach($depts as $u) 
                                                                <option {{old('dep_list',$dd->dep_list)==$u->dep_list? 'selected':''}}  value={{ $u->dep_list}} >{{$u->dept_nam}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td class="text-center">
                                                            <button type="submit" class="btn btn-sx @if($dd->grp_actv=='N') btn-disabled @else btn-info @endif" 
                                                            @if($dd->grp_actv=='N') disabled @endif>update</button>
                                                        </td>
                                                    </form>
                                                        <td class="text-center">
                                                            <form action="{{route('activeTmplPrivG',[$dd->templno,$dd->grp_actv])}}" method="POST">
                                                                {{ csrf_field() }}
                                                                <button class="btn btn-sx @if($dd->grp_actv=='N') btn-success @else btn-default @endif">
                                                                    <span class="fa fa-circle" aria-hidden="true"></span></button>
                                                            </form>
                                                        </td>
                                                        <td class="text-center">
                                                            <form action="{{route('delTmplPrivG',$dd->templno)}}" method="POST">
                                                                {{ csrf_field() }}
                                                                {{ method_field('DELETE') }}
                                                                <button class="btn btn-sx @if($dd->grp_actv=='N') btn-disabled @else btn-danger @endif" @if($dd->grp_actv=='N') disabled @endif>
                                                                    <span class="fa fa-remove" aria-hidden="true"></span></button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                             <a href="#" onclick="addDetails();">add groups</a>
                                                        </td>
                                            @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <div role="tabpanel" class="tab-pane fade" id="tab3">
                      <div class="row">
                        <div class="col-lg-8">
                            <div class="card ">
                                <div class="card-header bg-mint">
                                    <span>
                                        <i class="fa fa-plus"></i>
                                    </span>
                                    Add a new detail group
                                </div>
                                <div class="card-body m-t-25">
                                    <form action="{{route('saveTmplPrivGD')}}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-md-3" > 
                                                    <div class="form-group">
                                                        <label for="templno" class="control-label">Template No.*</label>
                                                        <input type="text" class="form-control" id="templno" name="templno">
                                                    </div>
                                                </div>
                                                <div class="col-md-3" > 
                                                    <div class="form-group">
                                                        <label for="grp_cod" class="control-label">Group No.*</label>
                                                        <input type="text" class="form-control" id="grp_cod" name="grp_cod">
                                                    </div>
                                                </div>
                                                <div class="col-md-3" > 
                                                    <div class="form-group">
                                                        <label for="templdetno" class="control-label">Det No.*</label>
                                                        <input type="text" class="form-control" id="templdetno" name="templdetno">
                                                    </div>
                                                </div>
                                                <div class="col-md-6" > 
                                                    <div class="form-group">
                                                        <label for="templdet_desc" class="control-label">Detail Description*</label>
                                                        <input type="text" class="form-control" id="templdet_desc" name="templdet_desc">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3" >
                                                    <label for="catgno" class="control-label">Category*</label>
                                                    <select class="form-control" id="catgno" name="catgno">
                                                        <option disabled selected value> -- select category -- </option>
                                                        @foreach($depts as $u) 
                                                        <option {{old('catgno')==$u->catgno? 'selected':''}}  value={{ $u->catgno}} >{{$u->catg_desc}}</option>
                                                        @endforeach
                                                    </select>
                                                </div> 
                                            <div class="col-md-4" > 
                                                <div class="form-group">
                                                    <label for="templdet_desc_ar" class="control-label">Notes*</label>
                                                    <input type="text" class="form-control" id="templdet_desc_ar" name="templdet_desc_ar">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn  btn-mint">
                                                    <span><i class="fa fa-save"></i></span>
                                                 &nbsp; Save</button>
                                            </div>
                                        </div>
                                    </form>    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
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
                                            @foreach($templates as $templmst)
                                                <li>
                                                    {{ $templmst->templ_desc }}
                                                    @if(count($templmst->childs))
                                                        @include('ControlPanels.manageGrpChild',['childs' => $templmst->childs])
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
                                   <i class="fa fa-table"></i> Details of group
                                </div>
                                <div class="card-body m-t-25">
                                    <table   class="display table table-stripped table-bordered">
                                        <thead>
                                            <tr class="text-center"> 
                                                <th width="3%">ID</th> 
                                                <th width="3%">Template</th> 
                                                <th width="4%">Group Code</th> 
                                                <th width="35%">Description</th>
                                                <th width="20%">Notes</th>
                                                <th width="20%">Depts</th>
                                                <th width="5%">Update</th>
                                                <th width="5%">Activate?</th>
                                                <th width="5%">Delete</th>
                                             </tr> 
                                        </thead>
                                        <tbody>
                                            @foreach($templgroups as $dd) 
                                                <tr 
                                                @if($dd->grp_actv=='N')
                                                 style="color:grey;"
                                                 @endif
                                                 > 
                                                    <form action="{{route('editTmplPrivGD',$dd->templno)}}" method="POST">
                                                                {{ csrf_field() }}
                                                        <td>
                                                            @if($dd->grp_actv=='N')
                                                            Inactive: 
                                                            @endif
                                                            {{$dd->id}}
                                                       </td>
                                                       <td>
                                                            @if($dd->grp_actv=='N')
                                                            Inactive: 
                                                            @endif
                                                            {{$dd->grp_cod}}
                                                        </td>
                                                        <td>
                                                            @if($dd->grp_actv=='N')
                                                            Inactive: 
                                                            @endif
                                                            {{$dd->grp_cod}}
                                                        </td>
                                                        <td>
                                                            @if($dd->grp_actv=='N')
                                                            Inactive: 
                                                            @endif
                                                            {{$dd->grp_desc}}
                                                        </td>
                                                        <td>
                                                            <input  type="text " name="grp_desc_ar" value= "@if($dd->grp_actv=='N') Inactive: @endif {{$dd->grp_desc_ar? $dd->grp_desc_ar : ''}} "  @if($dd->grp_actv=='N') disabled @endif > 
                                                        </td>
                                                        <td>
                                                            <select class="form-control" id="dep_list" name="dep_list"
                                                            @if($dd->grp_actv=='N') disabled @endif>
                                                                <option disabled selected value> -- select department -- </option>
                                                                @foreach($depts as $u) 
                                                                <option {{old('dep_list',$dd->dep_list)==$u->dep_list? 'selected':''}}  value={{ $u->dep_list}} >{{$u->dept_nam}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td class="text-center">
                                                            <button type="submit" class="btn btn-sx @if($dd->grp_actv=='N') btn-disabled @else btn-info @endif" 
                                                            @if($dd->grp_actv=='N') disabled @endif>update</button>
                                                        </td>
                                                    </form>
                                                        <td class="text-center">
                                                            <form action="{{route('activeTmplPrivGD',[$dd->templno,$dd->grp_actv])}}" method="POST">
                                                                {{ csrf_field() }}
                                                                <button class="btn btn-sx @if($dd->grp_actv=='N') btn-success @else btn-default @endif">
                                                                    <span class="fa fa-circle" aria-hidden="true"></span></button>
                                                            </form>
                                                        </td>
                                                        <td class="text-center">
                                                            <form action="{{route('delTmplPrivGD',$dd->templno)}}" method="POST">
                                                                {{ csrf_field() }}
                                                                {{ method_field('DELETE') }}
                                                                <button class="btn btn-sx @if($dd->grp_actv=='N') btn-disabled @else btn-danger @endif" @if($dd->grp_actv=='N') disabled @endif>
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
                    </div>
                </div>                                        
            </div>                                        
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
<script src="{{asset('assets/vendors/multiselect/js/jquery.multi-select.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/vendors/jquery.uniform/js/jquery.uniform.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/inputlimiter/js/jquery.inputlimiter.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/chosen/js/chosen.jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/jquery-tagsinput/js/jquery.tagsinput.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pluginjs/jquery.validVal.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/moment/js/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/autosize/js/jquery.autosize.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/inputmask/js/inputmask.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/inputmask/js/jquery.inputmask.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/inputmask/js/inputmask.date.extensions.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/inputmask/js/inputmask.extensions.js')}}"></script>
    <script src="{{asset('assets/vendors/multiselect/js/jquery.multi-select.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.min.js"></script>

<!-- end of plugin scripts -->
<!--Page level scripts-->
<script type="text/javascript" src="{{asset('assets/js/pages/simple_datatables.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/pages/form_elements.js')}}"></script>
<script>
 addGroups = function () {
     $("#groups").removeClass("disabled") ;
     $('#groups').trigger('click')
    }
</script>
<script>
 addDetails = function () {
     $("#detailsdetails").removeClass("disabled") ;
     $('#details').trigger('click')
    }
</script>
@stop