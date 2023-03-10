<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductImport;

class ProductImportController extends Controller
{
    public function import(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new ProductImport, $file);

        return redirect()->back()->with('success', 'Data imported successfully.');
    }
    public function showImportForm()
{
    return view('import');
}
}
