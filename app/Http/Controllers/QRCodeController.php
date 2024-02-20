<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class QRCodeController extends Controller
{
    public function processQRCode(Request $request)
    {
        // //dd($request->all());

        // // Read the scanned data from the request
        // $scannedData = $request->input('scanned_data');

        // // Split the scanned data into individual components using the pipe character as the delimiter
        // $components = explode('&', $scannedData);

        // // Extract individual pieces of information
        // $idNumber = $components[0];
        // $name = $components[1];
        // $department = $components[2];

        // // Now you can use the extracted data as needed, for example, you can store it in the database
        // // Make sure to handle potential errors such as if the scanned data does not contain the expected number of components

        // // Example: Storing the data in the database
        // // Assuming you have a model named Employee and a corresponding table with columns 'id_number', 'name', 'department'
        // Users::create([
        //     'user_id' => $idNumber,
        //     'name' => $name,
        //     'department_id' => $department
        // ]);

        // // Optionally, return a response or redirect somewhere
        // return redirect()->route('qr-scanner')->with('success','Student Successfully Added!');


        
        
    }

    public function addingDataQRCode(Request $request){
        $users = Users::all();

        return view('attendance', compact('users'));
    }
}
