@extends('layouts.app')

@section('content')
    <div class = "container">
        <div class = "row justify-content-center">
            <div class = "col-md-12">
                <div class = "card">
                    <div class = "card-header">Clients List</div>
                    <div class = "card-body">
                        <a class = "btn btn-sm btn-warning" href = "/clients/csv_export">Export CSV</a>
                        <div class = "float-right"><a href = "/clients/post"><b>New Client</b></a></div>
                        @if(isset($response) && !empty($response))
                            {{--                            <div class="table-data"></div>--}}
                            <?php $response = json_decode($response,true); ?>
                            <table class = "table table-bordered mt-3">
                                <thead>
                                <tr>
                                    <th scope = "col">S.N</th>
                                    <th scope = "col">Name</th>
                                    <th scope = "col">Email</th>
                                    <th scope = "col">Phone</th>
                                    <th scope = "col">Address</th>
                                    <th scope = "col">Nationality</th>
                                    <th scope = "col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($response as $a => $b)
                                    @if($a != 0)
                                        <tr>
                                            <th scope = "row">{{$b['id']}}</th>
                                            <td>{{$b['name']}}</td>
                                            <td>{{$b['email']}}</td>
                                            <td>{{$b['phone']}}</td>
                                            <td>{{$b['address']}}</td>
                                            <td>{{$b['nationality']}}</td>
                                            <td>
                                                <a href = "/clients/show/{{$b['id']}}" class="btn btn-success">View</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>Data Empty</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection