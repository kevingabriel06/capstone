<?php

namespace App\Http\Controllers;

use App\Models\ScannedData;
use Illuminate\Http\Request;


class ScannedDataController extends Controller
{
    public function processScannedData(Request $request)
    {$scannedData = $request->get('scanned_data');

        
    }
}
