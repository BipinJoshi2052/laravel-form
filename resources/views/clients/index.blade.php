@extends('layouts.app')

@section('content')
    <div class = "container">
        <div class = "row justify-content-center">
            <div class = "col-md-12" id = "table-data">
{{--                <div class = "card" id="table-data">--}}
{{--                    <div class = "card-header">--}}
{{--                        Clients List--}}
{{--                        <div class = "float-right">--}}
{{--                            <a class = "btn btn-sm btn-warning" href = "/clients/csv_export"><b>Export CSV</b></a>--}}
{{--                            <a class = "btn btn-sm btn-success" href = "/clients/post"><b>Add New Client</b></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class = "card-body">--}}
                        <front-page-table></front-page-table>
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
@endsection