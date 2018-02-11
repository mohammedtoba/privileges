@extends ('layouts/fixed_menu')

{{-- Page title --}}
@section('title')
    Vue templates setup
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
                <div class="col-lg col-sm-4 skin_txt">
                    <h4 class="nav_top_align">
                        <i class="fa fa-file"></i> Template Management
                    </h4>
                </div>
                <div class="col-lg col-sm-8">
                    <ol  class="breadcrumb float-right nav_breadcrumb_top_align">
                        <li class="breadcrumb-item">
                            <a href="index">
                                <i class="fa fa-home" data-pack="default" data-tags=""></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Control Panel</a>
                        </li>
                        <li class="active breadcrumb-item">Template Management</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
    <div id="app" class="outer">
        <div id="app" class="inner bg-container">

            <div id="app" class="row">
                <div  id="app" class="col">
                    <div id="app" class="card">
                        <div class="card-header bg-white" >
                            Template information
                        </div>
                        <div class="card-body" id="app" >
                            
                            <button class="btn btn-primary" @click.prevent="addp()"
                                id="name" name="name">
                                <span class="glyphicon glyphicon-plus"></span> ADD
                            </button>

                            <a href="javascript:" class="btn btn-block btn-success"  v-on:click="addp()">
                                <span class="fa fa-heart"></span> add template
                            </a>

                                <div class="row">
                                    <div class="col">
                                        <div class="card m-t-35">
                                            <div class="card-header bg-info">
                                                Group1
                                            </div>
                                            <div class="card-body"  >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="card m-t-35">
                                            <div class="card-header bg-info">
                                                Group2
                                            </div>
                                            <div class="card-body" >
                                            </div>
                                        </div>
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
<!-- end of plugin scripts -->
<!--Page level scripts-->
<script type="text/javascript" src="{{asset('assets/js/pages/simple_datatables.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script>
        var app = new Vue({
            el: '#app',
            data: {
                message: 'Hello Vue!',
                abx:[]
            }
            })

        $( document ).ready(function() {
            
        });
        function psub_sub(pKey,subKey,subsubKet){
            app.abx[pKey].subItems[subKey].subItems.splice(subsubKet,1);
        }
        function psub(pKey,subKey){
            app.abx[pKey].subItems.splice(subKey,1);
        }
        function addSub(id,subid){
            app.abx[id].subItems[subid].subItems.push({id:null,decs:null})
        }
        function add(id){
            app.abx[id].subItems.push({id:null,decs:null,subItems:[]})
        }  
        function addp(){
            app.abx.push({subItems:[]})
        }
        function  abc(){
            console.log(app.abx );
        }
        function p(key){
            app.abx.splice(key,1);
        }
    </script>
@stop