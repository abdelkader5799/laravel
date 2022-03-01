<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    //
    public function create()
        {
            return view('create');
        }
        public function store(Request $request)
        {
            $this->Validate($request,[

          "title"=>"required|string",
          "content"=>"required|min:50",
          "image"=>"required|image"

            ]);
        }
public function loadData()
{
    $request=new  Request ;
    $data= $request->only(['title', 'content','image']);
   session()->flash("Message","$data");


}
}

