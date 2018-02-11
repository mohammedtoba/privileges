@extends('layouts/fixed_menu')

{{-- Page title --}}
@section('title')
    Your profile
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <!--Plugin css-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/fullcalendar/css/fullcalendar.min.css')}}"/>
    <!--End off plugin css-->
    <!--Page level css-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/timeline2.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/calendar_custom.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/profile.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/gallery.css')}}"/>
    <!--end of page level css-->
@stop
{{-- Page content --}}
@section('content')
    <header class="head">
        <div class="main-bar">
            <div class="row">
                <div class="col-lg-6 col-sm-5 col-12">
                    <h4 class="nav_top_align skin_txt">
                        <i class="fa fa-user"></i>
                        Medical Staff Profile
                    </h4>
                </div>
                <div class="col-lg-6 col-sm-7 col-12">
                    <ol class="breadcrumb float-right nav_breadcrumb_top_align">
                        <li class="breadcrumb-item">
                            <a href="index">
                                <i class="fa fa-home" data-pack="default" data-tags=""></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Medical staff</a>
                        </li>
                        <li class="active breadcrumb-item">Medical staff profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
    <div class="outer">
        <div class="inner bg-container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 m-t-35">
                            <div class="text-center">
                                <div class="form-group">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumb_zoom zoom admin_img_width">
                                            <img src="{{Storage::url($Images[0])}}" alt="admin" class="admin_img_width">
                                            </div>
                                        <div class="fileinput-preview fileinput-exists thumb_zoom zoom admin_img_width"></div>
                                        <div class="btn_file_position">
                                                    <span class="btn btn-primary btn-file">
                                                        <span class="fileinput-new">Change image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="Changefile">
                                                    </span>
                                            <a href="#" class="btn btn-warning fileinput-exists"
                                               data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="view_friends_imgs"><br/>
                                        <p>
                                            <strong>Files Browser</strong>
                                        </p>
                                        <div class="friends_img_left">
                                            @foreach($Images as $img)
                                                <div class="thumb_zoom zoom">
                                                 <img src="{{Storage::url($img)}}" class="img-rounded" alt="friend">
                                                </div>
                                            @endforeach   
                                        <!-- <img src="{{Storage::url($Images[0])}}" class="img-rounded" alt="friend"> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 m-t-25">
                            <div>
                                <ul class="nav nav-inline view_user_nav_padding">
                                    <li class="nav-item card_nav_hover">
                                        <a class="nav-link active" href="#user" id="home-tab"
                                           data-toggle="tab" aria-expanded="true">Personal information</a>
                                    </li>
                                    <li class="nav-item card_nav_hover">
                                        <a class="nav-link" href="#tab2" id="hats-tab" data-toggle="tab">Adminstrative Information</a>
                                    </li>
                                    <li class="nav-item card_nav_hover">
                                        <a class="nav-link" href="#tab3"  id="followers" data-toggle="tab">Others</a>
                                    </li>
                                   
                                </ul>
                                <div id="clothing-nav-content" class="tab-content m-t-10">
                                    <div role="tabpanel" class="tab-pane fade show active" id="user">
                                        <table class="table" id="users">
                                            <tr>
                                                <td>Name</td>
                                                <td class="inline_edit">
                                                        <span class="editable"
                                                              data-title="Edit Name">{{$MedS[0]->full_name}}</span>
                                                </td>
                                            </tr>
                                           <tr>
                                                <td>Date of birth</td>
                                                <td class="inline_edit">
                                                        <span class="editable"
                                                              data-title="Edit Date of birth">{{$MedS[0]->dob}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nationality</td>
                                                <td class="inline_edit">
                                                        <span class="editable"
                                                              data-title="Edit Gender">{{$MedS[0]->nat_desc}}</span>
                                                </td>
                                            </tr>
                                           <tr>
                                                <td>Gender</td>
                                                <td class="inline_edit">
                                                        <span class="editable"
                                                              data-title="Edit Gender">{{$MedS[0]->gender}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>E-mail</td>
                                                <td>
                                                    <span class="editable" data-title="Edit E-mail">{{Auth::user()->email}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Phone Number</td>
                                                <td>
                                                    <span class="editable" data-title="Edit Phone Number">{{$MedS[0]->phone}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Mobile Number</td>
                                                <td>
                                                    <span class="editable" data-title="Edit Mobile Number">{{$MedS[0]->mobile}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td>
                                                    <span class="editable" data-title="Edit Address">{{$MedS[0]->address}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Created At</td>
                                                <td>  {{$MedS[0]->created_at}}  </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab2">
                                        <div class="card_nav_body_padding">
                                            <p>
                                                Hi, ..
                                            </p>
                                            <p class="text-justify">
                                                Type any text here.
                                            </p>
                                        </div>
                                            <table class="table" id="users">
                                            <tr>
                                                <td>Employee No</td>
                                                <td class="inline_edit">
                                                        <span class="editable"
                                                              data-title="Edit Employee No">{{$MedS[0]->empno}}</span>
                                                </td>
                                            </tr>
                                           <tr>
                                                <td>Joining Date</td>
                                                <td class="inline_edit">
                                                        <span class="editable"
                                                              data-title="Edit Joining Date">{{$MedS[0]->join_date}}</span>
                                                </td>
                                            </tr>
                                           <tr>
                                                <td>Department</td>
                                                <td class="inline_edit">
                                                        <span class="editable"
                                                              data-title="Edit Department">{{$MedS[0]->dept_nam}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Job Description</td>
                                                <td>
                                                    <span class="editable" data-title="Edit Job Description">{{$MedS[0]->job_desc}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Category</td>
                                                <td>
                                                    <span class="editable" data-title="Edit Category">{{$MedS[0]->catg_desc}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Speciality</td>
                                                <td>
                                                    <span class="editable" data-title="Edit Speciality">{{$MedS[0]->spec_desc}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Discipline</td>
                                                <td>
                                                    <span class="editable" data-title="Edit Discipline">{{$MedS[0]->disp_desc }}</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab3">
                                        <div class="card_nav_body_padding follower_images">
                                            <div class="row m-t-15">
                                                <div class="col-xl-2 col-sm-3">
                                                    <div class="img">
                                                        <a href="#">
                                                            <img src="{{asset('assets/img/mailbox_imgs/8.jpg')}}" class="rounded-circle" alt="friend">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-xl-10 col-sm-9">
                                                    <div class="details">
                                                        <div class="name">
                                                            <a href="#">George Clooney</a>
                                                        </div>
                                                        <div class="time">
                                                            <i class="fa fa-clock-o"></i> Last seen: 1 hour ago
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
            <div class="row">
                <div class="col-lg-6">
                    <div class="card m-t-35">
                        <div class="card-header bg-white">
                                 <i class="fa fa-pencil"></i>Education
                        </div>
                        <div class="card-body m-t-35 padding-body view_user_cal">
                            <div class="list-group">

                                <table id="user" class="display table table-stripped table-bordered table-hover text-center">
                                <thead>
                                    <tr class="text-white" style="background: grey;"> 
                                        <th style="width: 15%;">Type</th> 
                                        <th style="width: 15%;">Year</th>
                                        <th style="width: 30%;">Description</th>
                                        <th style="width: 20%;">Country</th>
                                        <th style="width: 20%;">University</th>
                                    </tr> 
                                </thead>
                                @foreach($Educate as $ed)
                                    <tr>
                                        <td>{{$ed->qual_typ_desc}}</td>
                                        <td>{{$ed->qualif_year}}</td>
                                        <td>{{$ed->qualif_desc}}</td>
                                        <td>{{$ed->qualif_country}}</td>
                                        <td>{{$ed->qualif_univ}}</td>
                                    </tr>
                                @endforeach   
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card m-t-35">
                        <div class="card-header bg-white">
                            <div>
                                <i class="fa fa-pencil"></i>
                                Experiences
                            </div>
                        </div>
                        <div class="card-body m-t-35 padding">
                            <div class="feed">
                                  <table id="user" class="display table table-stripped table-bordered table-hover text-center">
                                    <thead>
                                        <tr class="text-white" style="background: grey;"> 
                                            <th style="width: 15%;">Start Date</th> 
                                            <th style="width: 15%;">End Date</th>
                                            <th style="width: 30%;">Position</th>
                                            <th style="width: 20%;">Country</th>
                                            <th style="width: 20%;">Workplace</th>
                                        </tr> 
                                    </thead>
                                    @foreach($Exper as $exp)
                                        <tr>
                                            <td>{{$exp->exper_startdt}}</td>
                                            <td>{{$exp->exper_enddt}}</td>
                                            <td>{{$exp->exper_position}}</td>
                                            <td>{{$exp->exper_country}}</td>
                                            <td>{{$exp->exper_workplace}}</td>
                                        </tr>
                                    @endforeach   
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card m-t-35">
                        <div class="card-header bg-white">
                            <div>
                                <i class="fa fa-pencil"></i>
                                Training Courses
                            </div>
                        </div>
                        <div class="card-body m-t-35 padding">
                            <div class="feed">
                                  <table id="user" class="display table table-stripped table-bordered table-hover text-center">
                                    <thead>
                                        <tr class="text-white" style="background: grey;"> 
                                            <th style="width: 15%;">Start Date</th> 
                                            <th style="width: 15%;">End Date</th>
                                            <th style="width: 30%;">Description</th>
                                            <th style="width: 20%;">Country</th>
                                            <th style="width: 20%;">Workplace</th>
                                        </tr> 
                                    </thead>
                                    @foreach($Tracour as $exp)
                                        <tr>
                                            <td>{{$exp->train_startdt}}</td>
                                            <td>{{$exp->train_enddt}}</td>
                                            <td>{{$exp->train_desc}}</td>
                                            <td>{{$exp->train_country}}</td>
                                            <td>{{$exp->train_workplace}}</td>
                                        </tr>
                                    @endforeach   
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>

                              <div class="col-lg-6">
                    <div class="card m-t-35">
                        <div class="card-header bg-white">
                            <div>
                                <i class="fa fa-pencil"></i>
                                Liecinesr
                            </div>
                        </div>
                        <div class="card-body m-t-35 padding">
                            <div class="feed">
                                  
                            </div>
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>
    <!-- /.outer -->
@stop
{{-- page level scripts --}}
@section('footer_scripts')
    <!--Plugin scripts-->
    <script type="text/javascript" src="{{asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/bootstrap_calendar/js/bootstrap_calendar.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/moment/js/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/fullcalendar/js/fullcalendar.min.js')}}"></script>
    <!--End of Plugin scripts-->
    <!--Page level scripts-->
    <script type="text/javascript" src="{{asset('assets/js/pages/mini_calendar.js')}}"></script>
    <!--End of Page level scripts-->
@stop