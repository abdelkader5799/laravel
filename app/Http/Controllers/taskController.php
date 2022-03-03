<?php

namespace App\Http\Controllers;
use App\task;

use Illuminate\Http\Request;

class taskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    $data = task::join('users', 'users.id', '=', 'tasks.user_id')->select('tasks.*', 'users.name as userName')->get();
        ;

        return view('blog.index',["data"=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('blog.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data =  $this->validate($request,[
            "title"=>"required|string",
            "content"=>"required|min:50",
            "start_date"=>"required|Date Format",
            "start_end"=>"required|Date Format",
            "image"   => "required|image|mimes:png,jpg"

        ]);
        $FinalName = time() . rand() . '.' . $request->image->extension();

        if ($request->image->move(public_path('blogImages'), $FinalName)) {


            $data['image'] = $FinalName;
            $data['user_id'] = auth()->user()->id;

            $op = task::create($data);

            if ($op) {
                $message = 'data inserted';
            } else {
                $message =  'error try again';
            }
        } else {
            $message = "Error In Uploading File ,  Try Again ";
        }
        session()->flash('Message', $message);

        return redirect(url('/task'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = task::find($id);

        return view('blog.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data =  $this->validate($request,[
            "title"=>"required|string",
            "content"=>"required|min:50",
            "start_date"=>"required|Date Format",
            "start_end"=>"required|Date Format",
            "image"   => "required|image|mimes:png,jpg"

        ]);
        $objData = task::find($id);


        if ($request->hasFile('image')) {

            $FinalName = time() . rand() . '.' . $request->image->extension();

            if ($request->image->move(public_path('blogImages'), $FinalName)) {

                unlink(public_path('blogImages/' . $objData->image));
            }
        } else {
            $FinalName = $objData->image;
        }


        $data['image'] = $FinalName;



           $op =  task :: where('id',$id)->update($data);




        if ($op) {
            $message = 'Raw Updated';
        } else {
            $message =  'error try again';
        }

        session()->flash('Message', $message);

        return redirect(url('/task'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $op =  task::find($id)->delete();
      if($op){
         $message = "Raw Removed";
      }else{
         $message = 'Error Try Again';
      }
      return redirect(url('/task/'));

    }
}
