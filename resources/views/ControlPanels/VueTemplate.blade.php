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
    <div id="app">
    <div class="outer">
        <div class="inner bg-container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header bg-white">
                            Template information
                        </div>

                        <div class="card-body" >
                            
                             
                            
                            <button @click="addp();addtemp=true;"> add template</button> 
                         
                            <div v-show="addtemp">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                     templ no:
                                     <input type="text" v-model="tempid" name="tempid"></input> 
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                     templ Description:
                                     <input type="text" v-model="tempdesc" name="tempdesc"></input>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <button @click="add(app.tempid); "> add Group</button> 
                                    </div>

                                </div>

                            </div>

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
                             
                        </div>
                   
                </div>
            </div>
             
        </div>
    </div>
    </div>      
@stop
@section('footer_scripts')

       
<script type="text/javascript" src="{{asset('assets/js/vue.js')}}"></script>

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


 <script>
        var app = new Vue({
            el: '#app',
             data: function () {
                return {
                           //message: 'Hello Vue!',
                            abx:[],
                            addtemp:false,
                            tempid:null,
                            tempdesc:null,
                        }
            },
            methods:
            {
                psub_sub:function (pKey,subKey,subsubKet){
                    app.abx[pKey].subItems[subKey].subItems.splice(subsubKet,1);
                },
                psub:function (pKey,subKey){
                    app.abx[pKey].subItems.splice(subKey,1);
                },
                addSub:function (id,subid){
                    app.abx[id].subItems[subid].subItems.push({id:null,decs:null})
                },
                add:function (id){
                     //alert(app.tempid);
                    app.abx[id].subItems.push({id:null,decs:null,subItems:[]})
                }, 
                addp:function (){
                //    app.abx.push({subItems:[]})
                    app.abx.push({id:this.tempid,decs:this.tempdesc,subItems:[]})
                },
                abc:function  (){
                    //console.log(app.abx );
                },
                p:function (key){
                    app.abx.splice(key,1);
                },
        }
        });
    </script>
@stop

<!--  -->