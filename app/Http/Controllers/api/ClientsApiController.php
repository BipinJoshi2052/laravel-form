<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ClientsApiController extends Controller {
    public function index() {
        $row = 1;
        $formatted_data = [];
        $final_data = [];
        if (file_exists(public_path() . '/clients.csv')) {
            if (($handle = fopen("clients.csv", "r")) !== false) {
                while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                    //                    $a[] = $data;
                    $formatted_data[] = $this->getFormatted($data);
                }
                fclose($handle);
                //to remove the first item in the array that contains headers
                foreach($formatted_data as $b => $c){
                    if($b != 0) {
                        array_push($final_data,$c);
                    }
                }
                //pass the data to resource to get desired array of data
                return ClientResource::collection($final_data);
            }
        }
        else {
            return false;
        }
    }

    public function store(Request $request) {
        $data = $request->post;

        $fp = fopen('clients.csv', 'a');
        $no_rows = count(file("clients.csv"));

        $form_data = [
                'sn'          => $no_rows,
                'name'        => $data['name'],
                'email'       => $data['email'],
                'phone'       => $data['phone'],
                'address'     => $data['address'],
                'nationality' => $data['nationality'],
                'gender'      => $data['gender'],
                'education'   => $data['education'],
                'contact'     => $data['contact'],
                'dob'         => $data['dob'],
                'created_at'  => date('Y-m-d'),
        ];

        fputcsv($fp, $form_data);
        fclose($fp);
        return true;
    }

    public function show(Request $request) {
        $id = $request->id;
        $fp = fopen('clients.csv', 'r');
        while (($data = fgetcsv($fp, 1000, ",")) !== false) {
            if ($data[0] === $id) {
                return $this->getFormatted($data);
            }
        }
        return $data;
    }

    private function getFormatted($data): array {
        return [
                "id"          => $data[0],
                "name"        => $data[1],
                "email"       => $data[2],
                "phone"       => $data[3],
                "address"     => $data[4],
                "nationality" => $data[5],
                "gender"      => Str::ucfirst($data[6]),
                "education"   => $data[7],
                "contact"     => Str::ucfirst($data[8]),
                "dob"         => $data[9],
                "created_at"  => $data[10],
        ];
    }
}
