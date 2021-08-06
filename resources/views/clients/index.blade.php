@extends('layouts.app')

@section('content')
    <div class = "container">
        <div class = "row justify-content-center">
            <div class = "col-md-12">
                <div class = "card">
                    <div class = "card-header">Clients List</div>
                    <div class = "card-body">
                        <a class = "btn btn-sm btn-warning" href = "/clients/csv_export">Export CSV</a>
                        <div class = "float-right"><a href = "/"><b>New Client</b></a></div>
                        @if(isset($response) && !empty($response))
                            {{--                            <div class="table-data"></div>--}}
                            <?php
                            $response = json_decode($response);
                            echo '<table>';
                            foreach ($response as $r => $e) {

                                if($r==0) { ?>
                                    <thead>
                                    <tr>
                                        <?php
                                        foreach ($e as $f => $g) {
                                            echo '<th scope="col">' . $g . '</th>';
                                        }
                                        ?>
                                    </tr>
                                    </thead>
                                <?php }else{

                                echo '<tbody><tr>';
                                foreach ($e as $f => $g) {
                                    echo '<td>' . $g . '</td>';
                                }
                                echo '</tr></tbody>';
                                }

                            }
                            echo '</table>';
                            ?>
                        @else
                            <p>Data Empty</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection