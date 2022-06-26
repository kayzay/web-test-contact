@extends("frontend.layout.empty")
@section('content')
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h1>Login</h1>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                @endif
                @if(Session::has('status'))
                    <div class="alert alert-success" role="alert">
                        {!!Session::get('status')!!}
                    </div>
                @endif
                <form action="{{route('sign-me-in')}}" method="post">
                    @csrf
                    <div class="form-group  mb-3">
                        <input
                            type="email"
                            name="email"
                            value="{{old('email', '')}}"
                            class="form-control"
                            placeholder="Email">
                    </div>
                    <div class="form-group  mb-3">
                        <input
                            type="password"
                            name="password"
                            value="{{old('email', '')}}"
                            class="form-control"
                            placeholder="Password">
                    </div>
                    <div class="row">
                        <div class="col-8">
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mb-0">
                    <a href="{{route('registration')}}" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
