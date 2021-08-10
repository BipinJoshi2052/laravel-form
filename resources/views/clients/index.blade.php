@extends('layouts.app')

@section('content')
    <div class = "container">
        <div class = "row justify-content-center">
            <div class = "col-md-12">
                <div class = "card">
                    <div class = "card-header">
                        Clients List
                        <div class = "float-right">
                            <a class = "btn btn-sm btn-warning" href = "/clients/csv_export"><b>Export CSV</b></a>
                            <a class = "btn btn-sm btn-success" href = "/clients/post"><b>Add New Client</b></a>
                        </div>
                    </div>
                    <div class = "card-body">
                        @if(isset($response) && !empty($response))
                            {{--                            <div class="table-data"></div>--}}

                            <table class = "table table-bordered mt-3">
                                <thead>
                                <tr>
                                    <th scope = "col">S.N</th>
                                    <th scope = "col">Name</th>
                                    <th scope = "col">Email</th>
                                    <th scope = "col">Phone</th>
                                    <th scope = "col">Address</th>
                                    <th scope = "col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($response) && !empty($response))
                                    @foreach($response as $a => $b)
                                        <tr>
                                            <th scope = "row">{{$b['id']}}</th>
                                            <td>{{$b['name']}}</td>
                                            <td>{{$b['email']}}</td>
                                            <td>{{$b['phone']}}</td>
                                            <td>{{$b['address']}}</td>
                                            <td>
                                                <a href = "/clients/show/{{$b['id']}}" class = "btn btn-success">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    {{-- No data--}}
                                @endif
                                </tbody>
                                {{ $response->links('pagination::bootstrap-4') }}
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