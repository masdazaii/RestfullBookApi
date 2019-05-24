<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Book;
use App\Category;
use App\User;
use App\Publisher;



class BookController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        //  return response()->json(['success' => $user], $this->successStatus);
         return Response()->json(['result'=> 'success','Book'=> Book::with('category','publisher')->get()]);
    }
    // public function index()
    // {
        
    //     //where table yg sesuai token

    // //     $user = Auth::user();
    // //     if(!empty($user))
    // //    {
    //     return Response()->json(['result'=> 'success','Book'=> Book::with('category','publisher')->get()]);
    // // }else{
    // //     return Response()->json(['result'=> 'error']);
    // // }

    //     //return Response()->json(['result'=> 'success','Book'=> Catregory::with('book')->get()]);
    //     // return response()->json([User::where('remember_token',$token)->get()->all()]);
    //     //return response()->json(User::all());

    // }

    public function create (Request $request){

        $user = Auth::user();

        $id_category = $request->input('id_category');
        $id_publisher = $request->input('id_publisher');
        $title = $request->input('title');
        $author = $request->input('author');
        $isbn = $request->input('isbn');
        $year = $request->input('year');
        $file = $request->input('file');
        $thumbnail = $request->input('thumbnail');


        $data = new Book();
        $data->id_category = $id_category;
        $data->id_publisher = $id_publisher;
        $data->title = $title;
        $data->author = $author;
        $data->isbn = $isbn;
        $data->year = $year;
        $data->file = $file;
        $data->thumbnail = $thumbnail;

        if($data->save()){

            return Response()->json(['result'=> 'success insert data','book'=> $data]);
        }else{
            return Response()->json(['result'=> 'failed insert data']);
        }
    }

    public function update(Request $request, $id)
    {
    //

    $user = Auth::user();
    $id_category = $request->input('id_category');
    $id_publisher = $request->input('id_publisher');
    $title = $request->input('title');
    $author = $request->input('author');
    $isbn = $request->input('isbn');
    $year = $request->input('year');
    $file = $request->input('file');
    $thumbnail = $request->input('thumbnail');


    $data = Book::where('id',$id)->first();
    $data->id_category = $id_category;
    $data->id_publisher = $id_publisher;
    $data->title = $title;
    $data->author = $author;
    $data->isbn = $isbn;
    $data->year = $year;
    $data->file = $file;
    $data->thumbnail = $thumbnail;

        if($data->save()){
            $res['message'] = "Success!";
            $res['value'] = "$data";
            return response($res);
        }
        
        else{
            $res['message'] = "Failed!";
            return response($res);
        }
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $data = Book::where('id',$id)->first();

        if($data->delete()){
            $res['message'] = "Success!";
            $res['value'] = "$data";
            return response($res);
        }
        else{
            $res['message'] = "Failed!";
            return response($res);
        }
    }
}
