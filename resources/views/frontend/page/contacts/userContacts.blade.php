@extends("frontend.layout.base")
@section('title_page', "User contact")
@section('content')
    @if(Session::has('status'))
        <div class="alert alert-success" role="alert">
            {!!Session::get('status')!!}
        </div>
    @endif
    <form id="multiple_select" class="card" action="{{route('deleteMyContact')}}" method="post">
        @csrf
        @method('DELETE')
        <div class="card-body">
            <button type="button" class="btn btn-success" data-active="1" onclick="showElem(event)">Use multiple select</button>
            <button id="form-add" type="submit" class="btn btn-success ">Delete contacts</button>
        </div>
    </form>
        <div class="table-responsive">
            <table class="table">
            <thead>
            <tr>
                <th scope="col" style="min-width: 60px;">ID</th>
                <th scope="col">Full name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col" style="min-width: 135px;">Action</th>
            </tr>
            </thead>
            <tbody>
            @if(!empty($data))
                @foreach($data as $item)
                    <tr>
                        <td scope="row">
                            <div class="custom-control custom-checkbox">
                                <input
                                    name="used[]"
                                    type="checkbox"
                                    class="custom-control-input"
                                    form="multiple_select"
                                    value="{{$item['id']}}"
                                    id="u_ {{$item['id']}}">
                                <label
                                    class="custom-control-label"
                                    for="u_ {{$item['id']}}">
                                        {{$item['id']}}
                                </label>
                            </div>
                        </td>
                        <td>{{$item['name']}}</td>
                        <td>{{$item['email']}}</td>
                        <td>{{$item['phone']}}</td>
                        <td>{{$item['address']}}</td>
                        <td>
                            <form action="{{route('deleteMyContact')}}" method="post" >
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="contact_id" value="{{$item['id']}}">
                                <button type="submit"  class="btn btn-success">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" style="text-align: center">....</td>
                </tr>
            @endif
            </tbody>
        </table>
            @if(isset($paginate))
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        @foreach($paginate['links'] as $item)
                            <li class="page-item" {{($item['active']) ? '' : 'disabled'}}>
                                <a class="page-link" href="{{$item['url']}}">{{html_entity_decode($item['label'])}}</a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            @endif
        </div>
    <style>
        #form-add, .custom-control-input{display: none;}
    </style>
    <script>
        function showElem(e) {
            var el = e.currentTarget;
            var elem = document.getElementsByClassName('custom-control-input');
            var block = (el.getAttribute('data-active') === '1') ? 'inline' : 'none';


            if(block === "inline") {
                el.textContent = "Hied multiple select";
                document.getElementById('form-add').style.display = block;
                el.setAttribute('data-active', '0');
            } else {
                el.textContent =  "Use multiple select";
                document.getElementById('form-add').style.display = block;
                el.setAttribute('data-active', '1');
            }

            Object.keys(elem).map(function (p1, p2) {
                elem[p1].style.display = block;
            })
        }
    </script>
@endsection
