@extends('back_end.layout.app')
@section('title','Lấy Lại Mật Khẩu')
@section('content')
<div class="row justify-content-center">
    <div class="col-sm-5">
        <div class="card m-5">
            <h5 class="card-header text-center">ĐẶT LẠI MẬT KHẨU</h5>
            <div class="card-body">
                <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Gửi link Cấp lại mật khẩu
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer text-muted">
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
            </div>
            @if ($errors->has('email'))
            <div class="alert alert-danger m-3">
                <strong>{{ $errors->first('email') }}</strong>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
