<!DOCTYPE html>
<html>
<head>
    <title>Register | Safe Practice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="{{asset('assets/img/logo1.ico')}}"/>
    <!-- Global styles -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/components.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
    <!--End of Global styles -->
    <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}"/>
    <!--End of Plugin styles-->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/login3.css')}}"/>
    <!--End of Page level styles-->
</head>

<body   style="background-color: #111526;">
    <!-- class="login_backimg" -->
<div class="preloader" style=" position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  z-index: 100000;
  backface-visibility: hidden;
  background: #ffffff;">
    <div class="preloader_img" style="width: 200px;
  height: 200px;
  position: absolute;
  left: 48%;
  top: 48%;
  background-position: center;
z-index: 999999">
        <img src="{{asset('assets/img/loader.gif')}}" style=" width: 40px;" alt="loading...">
    </div> 
</div>
<div class="container">
    <div class="row">
        <div class="col-12 mx-auto login_section">
            <div class="row">
                
                <div class="col-lg-8 col-md-8 col-sm-12 mx-auto login_section login2_border register_section_top">
                    <div class="login_logo login_border_radius1">
                        <h3 class="text-center text-white">
                            <img src="{{asset('assets/img/logow2.png')}}" alt="logo" class="admire_logo"><br/>
                            <span class="m-t-15">SIGN UP</span>
                        </h3>
                    </div>
                    <div class="m-t-15">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}" id="register_valid">
                         {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name" class="col-form-label text-white">First name *</label>
                                <div class="input-group">
                                    <input type="text" class="form-control b_r_20" name="name" id="name" placeholder="first name" value="{{old('name')}}">
                                    <span class="input-group-addon">
                                        <i class="fa fa-user text-white"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name_ar" class="col-form-label text-white">Last name *</label>
                                <div class="input-group">
                                    <input type="text" class="form-control b_r_20" name="name_ar" id="name_ar" placeholder="last name" value="{{old('name_ar')}}">
                                    <span class="input-group-addon">
                                        <i class="fa fa-user text-white"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="empno" class="col-form-label text-white">Empliyee number *</label>
                                <div class="input-group">
                                    <input type="text" class="form-control b_r_20" name="empno" id="empno" placeholder="99999" value="{{old('empno')}}">
                                    <span class="input-group-addon">
                                        <i class="fa fa-barcode text-white"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="depno" class="col-form-label text-white">Department *</label>
                                <div class="input-group">
                                    <select class="form-control b_r_20" id="depno" name="depno"  >
                                        <option disabled selected department> -- select an option -- </option>
                                        @foreach($dept as $i)
                                            <option {{old('depno') == ($i->id)? 'selected' : ''}} value={{$i->id}} > {{$i->dept_nam}}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-addon">
                                        <i class="fa fa-th-large text-white"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="col-form-label text-white">Are you a medical staff?</label>
                                </div>
                                <div class="col-12">
                                    <label class="custom-control custom-radio">
                                        <input type="radio" name="usrtype" id= "usrtype" class="custom-control-input form-control"  value="M" {{old('usrtype') == "M"? 'active' : ''}}>
                                        <span class="custom-control-indicator"></span>
                                        <a class="custom-control-description">Yes</a>
                                    </label>
                                    <label class="custom-control custom-radio">
                                        <input type="radio" name="usrtype" id= "usrtype" class="custom-control-input form-control" value="B" {{old('usrtype') == 'B'? 'active' : ''}}>
                                        <span class="custom-control-indicator" ></span>
                                        <a class="custom-control-description">No</a>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-form-label text-white">Email *</label>
                                <div class="input-group">
                                    <input type="text" placeholder="Email Address" name="email" id="email" class="form-control b_r_20" value="{{old('email')}}">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope text-white"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-form-label text-white">Password *</label>
                                <div class="input-group">
                                    <input type="password" placeholder="Password" id="password" name="password" class="form-control b_r_20">
                                    <span class="input-group-addon">
                                        <i class="fa fa-key text-white"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="confirmpassword" class="col-form-label text-white">Confirm Password *</label>
                                <div class="input-group">
                                    <input type="password" placeholder="Confirm Password" name="confirmpassword" id="confirmpassword" class="form-control b_r_20">
                                    <span class="input-group-addon">
                                        <i class="fa fa-key text-white"></i>
                                    </span>
                                </div>
                            </div>
                            @if ($errors->any())
                            <div class="container">
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif 
                            <div class="form-group row">
                                <div class="col-6">
                                    <button  type="submit" class="btn btn-block btn-success login_button b_r_20">Submit</button>
                                </div>
                                <div class="col-6">
                                    <button type="reset" class="btn btn-block btn-danger b_r_20">Reset</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label class="col-form-label text-white">Already have an account?</label>
                                    <a href="{{ route('login') }}" class="text-primary login_hover"><b>Log In</b></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- global js -->
<script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<!-- end of global js-->
<!--Plugin js-->
<script type="text/javascript" src="{{asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>
 <script type="text/javascript" src="{{asset('assets/vendors/jquery.backstretch/js/jquery.backstretch.js')}}"></script>
 <!--End of plugin js-->
<script type="text/javascript" src="{{asset('assets/js/pages/login4.js')}}"></script>
</body>

</html>