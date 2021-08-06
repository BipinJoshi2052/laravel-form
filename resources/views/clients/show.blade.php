@extends('layouts.app')

@section('content')
    <div class = "container">
        <div class = "row justify-content-center">
            <div class = "col-md-8">
                <div class = "card">
                    <div class = "card-header">
                        <a class = "btn btn-sm btn-warning" href = "/">Back</a>
                        @if(isset($editable) && !empty($editable))
                            {{$editable['name']}}
                        @else
                            Error in finding client
                        @endif
                    </div>
                    <div class = "card-body">
                        <div class = "row">
                            <table class = "table">
                                <tr>
                                    <th>Name :</th>
                                    <td>{{$editable['name']}}</td>
                                </tr>
                                <tr>
                                    <th>Email :</th>
                                    <td>{{$editable['email']}}</td>
                                </tr>
                                <tr>
                                    <th>Phone :</th>
                                    <td>{{$editable['phone']}}</td>
                                </tr>
                                <tr>
                                    <th>Address :</th>
                                    <td>{{$editable['address']}}</td>
                                </tr>
                                <tr>
                                    <th>Nationality :</th>
                                    <td>{{$editable['nationality']}}</td>
                                </tr>
                                <tr>
                                    <th>Gender :</th>
                                    <td>{{$editable['gender']}}</td>
                                </tr>
                                <tr>
                                    <th>Education background :</th>
                                    <td>{{$editable['education']}}</td>
                                </tr>
                                <tr>
                                    <th>Preferred mode of contact :</th>
                                    <td>{{$editable['contact']}}</td>
                                </tr>
                                <tr>
                                    <th>Date of birth :</th>
                                    <td>
                                        {{date('d D Y' , strtotime($editable['dob']))}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Created On :</th>
                                    <td>
                                        {{date('d D Y' , strtotime($editable['created_at']))}}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection