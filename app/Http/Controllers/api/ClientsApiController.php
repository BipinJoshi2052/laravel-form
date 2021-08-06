<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Clients;
use Illuminate\Http\Request;

class ClientsApiController extends Controller
{
    public function index()
    {
        $row = 1;
        $a=[];
        if (file_exists( public_path() . '/clients.csv')){
            if (($handle = fopen("clients.csv", "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $a[] = $data;
                }
                fclose($handle);
                return json_encode($a);
            }
        }else{
            return false;
        }
    }
    public function store(Request $request)
    {
        $data = $request->post;

        $fp = fopen('clients.csv', 'a');
        $no_rows = count(file("clients.csv"));

        $form_data = [
                'sn' => $no_rows,
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'nationality' => $data['nationality'],
                'gender' => $data['gender'],
                'education' => $data['education'],
                'contact' => $data['contact'],
                'dob' => $data['dob'],
        ];

        fputcsv($fp, $form_data);
        fclose($fp);
        return true;
    }
}
