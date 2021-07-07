<?php

namespace App\Http\Controllers\Fronted;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Auth,Artisan,Hash,File,Crypt;
use App\Models\Sections;
use App\Http\Controllers\Manage\EmailsController;


class ProductController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function products($id)
    {

        $Products = Products::where('cat_id',$id)->get();
        if (!is_null($Products)) {
            return view('Fronted.Products.ProductsC',compact('Products'));
        }
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function allProducts(){
        $Products = Products::all();
        return view('Fronted.Products.allProducts',compact('Products'));
    }

    public function singleProduct($id)
    {
        $Products = Products::where('id',$id)->first();
        if (!is_null($Products)) {
            $cat = Categories::all();
            return view('Fronted.Products.singleProduct',compact('Products','cat'));
        }
    }
}
