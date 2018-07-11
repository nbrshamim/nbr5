<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use Excel;

class ProductController extends Controller
{
    public function list() {
    	return view('products');
    }

    public function productsImport (Request $request) {
    	if ($request->hasFile('products')) {
    		$path = $request->file('products')->getRealPath();
    		$data = \Excel::load($path)->get();
    		if ($data->count()) {
    			foreach ($data as $key => $value) {
    				$product_list[] = ['product' => $value->product,
    									'unit' => $value->unit,
    									'price' => $value->price,
    									'vat' => $value->vat];
    			}
    			if (!empty($product_list)) {
    				Product::insert($product_list);
    				\Session::flash('Success', 'File Import Successfully.');
    			}
    		}

    		} else {
    			\Session::flash('Warning', 'There is no file to import');
    		}
    		return Redirect::back();
    	}


    public function productsExport ($type) {
    	$products = Product::select('product', 'unit', 'price', 'vat')->get()->array();
    	return \Excel::create('Products', function($excel) use ($products) {
    		$excel->sheet('Product Details', function($sheet) use ($products) {
    			$sheet->fromArray($products);
    		});
    	})->download($type);
    }
}


