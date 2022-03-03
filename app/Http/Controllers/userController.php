<?php

namespace App\Http\Controllers;
use app\student;

use Illuminate\Http\Request;

class userController extends Controller
{
    //
    public function create()
        {
            return view('students.create');
        }
        public function store(Request $request)
        {
            $this->Validate($request,[

          "title"=>"required|string",
          "content"=>"required|min:50",

            ]);
            $data= $request->only(['title', 'content']);
        }

}

