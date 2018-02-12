@extends('back_end.layout.app')
@section('title','Đăng Nhập')
@section('content')
<div class="row justify-content-center">
    <div class="col-sm-5">
        <div class="card m-5">
            <h5 class="card-header text-center">ĐĂNG NHẬP</h5>
            <div class="card-body">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}" novalidate>
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">EMAIL</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-md-4 control-label">MẬT KHẨU</label>
                        <input id="password" type="password" class="form-control" name="password">
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ghi Nhớ
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                ĐĂNG NHẬP
                            </button>

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Quên Mật Khẩu ?
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer text-muted">
                @if (count($errors)>0)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              @endif
          </div>
      </div>
  </div>
</div>
@endsection
