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
            <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col-6 m-t-15">
                <button class="btn btn-primary" @click="addNewTemplateForm(templates.length +1)">New template</button>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card mb-3" v-for="(template, index) in templates">
                        <div class="card-body" >
                            <span class="float-right" style="cursor: pointer" @click="deleteTemplateForm(index)">X</span>
                            <h4 class="card-title"> Add template (index: @{{index}})</h4>
                            <h6 class="card-subtitle mb-5 text-muted"></h6>
                                <div class="template-form">
                                    <div class="row">
                                        <div class="col-md-3" > 
                                            Template No.: <input type="text" class="form-control mb-2" placeholder="templno" v-model="template.templno"> 
                                        </div>
                                        <div class="col-md-9" > 
                                            Template Desc.: <input type="text" class="form-control mb-2" placeholder="templdesc" v-model="template.templdesc">
                                        </div>
                                        <div class="col-md-3" > 
                                            Speciality:<input type="text" class="form-control mb-2" placeholder="specno" v-model="template.specno">
                                        </div>
                                        <div class="col-md-9" > 
                                            Notes:<input type="text" class="form-control mb-2" placeholder="templdescar" v-model="template.templdescar">
                                        </div>
                                        <button class="btn btn-primary" @click="addNewGroupForm(index)">New group</button>
                                    </div>
                            </div>
                        </div>
                        <div class="card mb-3" v-for="(group, indexG) in template.templatesgroups">
                            <div class="card-body" >
                                <span class="float-right" style="cursor: pointer" @click="deleteGroupForm(index,indexG)">XX</span>
                                <h4 class="card-title"> Add group (index: @{{index}} indexG: @{{indexG}})</h4>
                                <h6 class="card-subtitle mb-5 text-muted"></h6>
                                    <div class="group-form">
                                        <div class="row">
                                            <div class="col-md-3" > 
                                                Templ No.: <input type="text" class="form-control mb-2" placeholder="templno" v-model="group.templno"> 
                                            </div>
                                            <div class="col-md-3" > 
                                                Group Code.: <input type="text" class="form-control mb-2" placeholder="grp_cod" v-model="group.grp_cod">
                                            </div>
                                            <div class="col-md-6" > 
                                                Group Desc.: <input type="text" class="form-control mb-2" placeholder="grp_desc" v-model="group.grp_desc">
                                            </div>
                                            <div class="col-md-3" > 
                                                Notes: <input type="text" class="form-control mb-2" placeholder="grp_desc_ar" v-model="group.grp_desc_ar">
                                            </div>
                                            <div class="col-md-3" > 
                                                Status: <input type="text" class="form-control mb-2" placeholder="grp_actv" v-model="group.grp_actv">
                                            </div>
                                            <div class="col-md-6" > 
                                                Departments: <input type="text" class="form-control mb-2" placeholder="dep_list" v-model="group.dep_list">
                                            </div>    
                                            <button class="btn btn-primary" @click="addNewGroupDetailForm(index,indexG)">New Details for group </button>
                                        </div>
                                    </div>
                            </div>
                            <div class="card mb-3" v-for="(groupdetail,indexD) in group.templatesgroupsdetails">
                                <div class="card-body" >
                                    <span class="float-right" style="cursor: pointer" @click="deleteGroupDetailForm(index,indexG,indexD)">XXX</span>
                                    <h4 class="card-title"> Add detail group (index: @{{index}} indexG: @{{indexG}} detNo: @{{indexD}})</h4>
                                    <h6 class="card-subtitle mb-5 text-muted"></h6>
                                        <div class="groupdetail-form">
                                            <div class="row">
                                                <div class="col-md-2" > 
                                                    Templ No.: <input type="text" class="form-control mb-2" placeholder="templno" v-model="groupdetail.templno"> 
                                                </div>
                                                 <div class="col-md-2" > 
                                                    Templ No.: <input type="text" class="form-control mb-2" placeholder="group_desc" v-model="groupdetail.group_desc"> 
                                                </div>
                                                <div class="col-md-2" > 
                                                    Detail No.: <input type="text" class="form-control mb-2" placeholder="templdetno" v-model="groupdetail.templdetno">
                                                </div>
                                                <div class="col-md-6" > 
                                                    Desc.: <input type="text" class="form-control mb-2" placeholder="templdet_desc" v-model="groupdetail.templdet_desc">
                                                </div>
                                                <div class="col-md-5" > 
                                                    Notes: <input type="text" class="form-control mb-2" placeholder="templdet_desc_ar" v-model="groupdetail.templdet_desc_ar">
                                                </div>
                                                <div class="col-md-5" > 
                                                    Category: <input type="text" class="form-control mb-2" placeholder="catgno" v-model="groupdetail.catgno">
                                                </div>
                                                <div class="col-md-2" > 
                                                    Status: <input type="text" class="form-control mb-2" placeholder="templdet_actv" v-model="groupdetail.templdet_actv">
                                                </div>
                                                <div class="col-md-6" > 
                                                    Procedure Code: <input type="text" class="form-control mb-2" placeholder="proced_code" v-model="groupdetail.proced_code">
                                                </div> 
                                                 <div class="col-md-6" > 
                                                    Procedure Desc: <input type="text" class="form-control mb-2" placeholder="proced_desc" v-model="groupdetail.proced_desc">
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
             data: {
                templates: [{  templno: '1' , templdesc: '' , specno: '' , templdescar: '' , templatesgroups:[]}],
            },
            methods:
            {
                addNewTemplateForm (index)
                {
                    this.templates.push({  templno: index, templdesc: '' , specno: '' , templdescar: '' ,templatesgroups:[] });
                    this.$forceUpdate()
                },
                deleteTemplateForm (index)
                {
                    this.templates.splice(index , 1)
                },
                addNewGroupForm(parentID)
                {
                    this.templates[parentID].templatesgroups.push({templno: parentID , grp_cod: '' , grp_desc: '' , grp_desc_ar: '' , grp_actv: '' , dep_list: '' ,templatesgroupsdetails:[]});
                    this.$forceUpdate()
                },
                deleteGroupForm (index,indexG)
                {
                    this.templates[index].templatesgroups.splice(indexG , 1)
                },
                 addNewGroupDetailForm(parentID , indexG)
                {
                    this.templates[parentID].templatesgroups[indexG].templatesgroupsdetails.push({ 
                     templno: parentID , templdetno: this.templates[parentID].templatesgroups[indexG].templatesgroupsdetails.length + 1 ,  templdet_desc: '' , templdet_desc_ar: '' , catgno: '' ,group_desc: indexG ,proced_code: '' ,proced_desc: '' ,templdet_actv: '' ,  });
                    this.$forceUpdate()
                },
                deleteGroupDetailForm (index,indexG,indexD)
                {
                    this.templates[index].templatesgroups[indexG].templatesgroupsdetails.splice(indexD , 1)
                }
            }
        });
    </script>
@stop

<!--  -->