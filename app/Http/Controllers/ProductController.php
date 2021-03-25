<?php

namespace App\Http\Controllers;

use Validator;
use App\Product;
use App\ProductVariant;
use App\Productcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProduct($id)
    {

      $result = Product::findOrFail($id);

      return json_encode($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator  = Validator::make($request->all(),  [
          'name' =>  'required',
          'description' =>  'required',
          'categories' =>  'required'
        ]);


        if ($validator->fails()) {
            return json_encode($validator->errors());
        }
        else{
          $add = new Product;
          $add->name = $request->input('name');
          $add->description = $request->input('description');

          if($add->save()){
            foreach ($request->input('categories') as $key => $value) {

              $addCat = new Productcategory;
              $addCat->product_id = $add->id;
              $addCat->category_id= $value;
              $addCat->save();
            }
            return json_encode($add);
          }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
          $validator  = Validator::make($request->all(),  [
            'id' =>  'required',
            'name' =>  'required',
            'description' =>  'required',
            'categories' =>  'required'
          ]);


          if ($validator->fails()) {
              return json_encode($validator->errors());
          }
          else{
            $add = Product::findOrFail($request->input('id'));
            $add->name = $request->input('name');
            $add->description = $request->input('description');

            if($add->save()){

            $delete = Productcategory::where('product_id', '=', $request->input('id'))->delete();
            foreach ($request->input('categories') as $key => $value) {

              $addCat = new Productcategory;
              $addCat->product_id = $add->id;
              $addCat->category_id= $value;
              $addCat->save();
              return json_encode($add);
            }
          }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
      $delete = Product::where('id', '=', $id)->delete();
      $delete = Productcategory::where('product_id', '=', $id)->delete();
      $result['code'] = 200;
      return json_encode($result);
    }
}
