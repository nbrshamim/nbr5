<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use Excel;
use Auth;

class ImportController extends Controller
{

    public function showForm() {
      return view('form');
    }

    public function dataImport (Request $request) {
    	if ($request->hasFile('file')) {
    		$path = $request->file('file')->getRealPath();
    		$data = Excel::load($path, function($reader){})->get();

    		if (!empty($data) && $data->count()) {
    			foreach ($data as $key => $value) {
    				$product = new Product();
            $product->description = Auth::user()->name;
    				$product->product = $value->product;
    				$product->unit = $value->unit;
    				$product->price = $value->price;
    				$product->vat = $value->vat;
    				$product->save();
    			}
          return redirect('/home')->with('flash_message_success', 'File Upload Successful, Thank You.');
    		}

    		}
    		return back();
    	}
}
