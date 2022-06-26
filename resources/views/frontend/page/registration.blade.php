@extends("frontend.layout.empty")
@section('title_page', "Registration")
@section('content')
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
               <h1>Registration</h1>
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
                        <div class="alert alert-danger" role="alert">
                            {!!Session::get('status')!!}
                        </div>
                    @endif

                <form action="{{route('signUp')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{old('name', '')}}"
                            placeholder="Name">
                    </div>
                    <div class="input-group mb-3">
                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{old('email', '')}}"
                            placeholder="Email">
                    </div>
                    <div class="input-group mb-3">
                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            value="{{old('password', '')}}"
                            placeholder="Password">
                    </div>
                    <div class="input-group mb-3">
                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control"
                            value="{{old('password_confirmation', '')}}"
                            placeholder="Retype password">
                    </div>
                    <div class="row">
                        <div class="col-8">
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <a href="{{route('login')}}" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
@endsection

