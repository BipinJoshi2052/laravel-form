<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\CsvExport;
use Illuminate\Support\Facades\Http;
use Ixudra\Curl\Facades\Curl;
use Maatwebsite\Excel\Excel;
//use MaatWebsite\Excel\Facades\Excel;
//use Maatwebsite\Excel\Excel;

class ClientsController extends Controller
{
    public function index()
    {
        $response = Curl::to('http://laravel-form.test/api/clients-api/list')
                        ->get();
        if($response != false) {
            return view('clients/index')->with('response',$response);
        }
    }

    public function csv_export()
    {
        $file = "clients.csv";

        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/csv');
            header('Content-Disposition: attachment; filename='.basename($file));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();

            //read the file from disk and output the content.
            readfile($file);
            exit;
        }else{
            echo 'File does not exist.';
        }

    }

    public function post()
    {
        return view('clients.form');
    }

    public function store(Request $request)
    {
        $submit = $_POST;
        $response = Curl::to('http://laravel-form.test/api/clients-api/store')
                        ->withData(($submit))
                        ->post();

        if($response == true) {
            return redirect()->route('clients.post')->with('msg','Client Added Successfully');
        }
    }

    public function show($id)
    {
        $editable = Clients::find($id)->toArray();
        return view('clients/show', compact(['editable']));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
