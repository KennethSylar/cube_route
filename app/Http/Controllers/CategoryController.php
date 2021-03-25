<?php

namespace App\Http\Controllers;

use Validator;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $result = Category::all();

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
            'name' =>  'required'
          ]);


          if ($validator->fails()) {
              return json_encode($validator->errors());
          }
          else{
            $add = new Category;
            $add->name = $request->input('name');

            if($add->save()){
              return json_encode($add);
            }
          }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
          $validator  = Validator::make($request->all(),  [
            'id' =>  'required',
            'name' =>  'required'
          ]);


          if ($validator->fails()) {
              return json_encode($validator->errors());
          }
          else{
            $add = Category::findOrFail($request->input('id'));
            $add->name = $request->input('name');

            if($add->save()){
              return json_encode($add);
            }
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, $id)
    {

        $delete = Category::where('id', '=', $id)->delete();

        $result = Category::all();
        return json_encode($result);
    }
}
