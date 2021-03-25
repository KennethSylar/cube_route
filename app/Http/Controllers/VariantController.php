<?php

namespace App\Http\Controllers;

use Validator;
use App\Variant;
use App\ProductVariant;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProductVariant($id)
    {

        $result = Variant::findOrFail($id);

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
          'product_id' =>  'required',
          'name' =>  'required'
        ]);


        if ($validator->fails()) {
            return json_encode($validator->errors());
        }
        else{
          $add = new Variant;
          $add->name = $request->input('name');

          if($add->save()){
            $new_variant = new ProductVariant;
            $new_variant->variant_id = $add->id;
            $new_variant->product_id = $request->input('product_id');
            $new_variant->save();


            return json_encode($add);
          }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Variant  $variant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Variant $variant)
    {
        $validator  = Validator::make($request->all(),  [
          'id' =>  'required',
          'name' =>  'required'
        ]);


        if ($validator->fails()) {
            return json_encode($validator->errors());
        }
        else{
          $add = Variant::findOrFail($request->input('id'));
          $add->name = $request->input('name');

          if($add->save()){
            return json_encode($add);
          }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Variant  $variant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Variant $variant, $id)
    {
      $delete = Variant::where('id', '=', $id)->delete();
      $delete = ProductVariant::where('variant_id', '=', $id)->delete();
      $result['code'] = 200;
      return json_encode($result);
    }
}
