@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <h3>Register</h3>

        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">First name</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('name_ar') ? ' has-error' : '' }}">
                <label for="name_ar" class="col-md-4 control-label">Last name</label>

                <div class="col-md-6">
                    <input id="name_ar" type="text" class="form-control" name="name_ar" value="{{ old('name_ar') }}" required autofocus>

                    @if ($errors->has('name_ar'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name_ar') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            
            <div class="form-group{{ $errors->has('empno') ? ' has-error' : '' }}">
                <label for="empno" class="col-md-4 control-label">Employee number</label>

                <div class="col-md-6">
                    <input id="empno" type="text" class="form-control" name="empno" value="{{ old('empno') }}" required autofocus>

                    @if ($errors->has('empno'))
                        <span class="help-block">
                            <strong>{{ $errors->first('empno') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('usrtype') ? ' has-error' : '' }}">
                <label for="usrtype" class="col-md-4 control-label">Are you a medical staff?</label>

                <div class="col-md-6">
                    <label class="radio-inline"><input type="radio" name="usrtype" value="M" @if(old('usrtype')) checked @endif>Yes</label>
                    <label class="radio-inline"><input type="radio" name="usrtype" value="B" @if(old('usrtype')) checked @endif>No</label>
                    
                    @if ($errors->has('usrtype'))
                        <span class="help-block">
                            <strong>{{ $errors->first('usrtype') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('depno') ? ' has-error' : '' }}">
                <label for="depno" class="col-md-4 control-label">Department</label>

                <div class="col-md-6">
                    <select class="form-control" id="depno" name="depno" value="{{ old('depno') }}" required autofocus>
                        <option disabled selected value> -- select an option -- </option>
                        @foreach($dept as $i)
                            <option value={{$i->id}} > {{$i->dept_nam}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('depno'))
                        <span class="help-block">
                            <strong>{{ $errors->first('depno') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>
        
            <div class="form-group form-inline">
                    <div class="col-md-3 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <button type="cancel" class="btn btn-danger">
                                Cancel
                            </button>
                        </div>
                    </div>
            </div>
        </form>
    </div>
</div>


@endsection
