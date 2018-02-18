@extends('back_end.layout.app')
@section('title','Lấy Lại Mật Khẩu')
@section('content')
<div class="row justify-content-center">
    <div class="col-sm-5">
        <div class="card m-5">
            <h5 class="card-header text-center">ĐẶT LẠI MẬT KHẨU</h5>
            <div class="card-body">
                <form class="form-horizontal" method="POST" action="{{ route('password.all') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>


                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Mật khẩu</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>

                            
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password-confirm" class="col-md-4 control-label">Xác nhận</label>
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                            
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Lập lại mật khẩu
                            </button>
                        </div>
                    </div>
                </form>
                <div class="card-footer text-muted">
                    @if ($errors->has('email'))
                    <div class="alert alert-success">
                        <strong>{{ $errors->first('email') }}</strong>
                    </div>
                    @endif
                    @if ($errors->has('password_confirmation'))
                    <div class="alert alert-success">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </div>
                    @endif
                    @if ($errors->has('password'))
                    <div class="alert alert-success">
                        <strong>{{ $errors->first('password') }}</strong>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endsection
