<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DefaultTemplate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Session;
use Response;
use View;
use Carbon\Carbon;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('DisplayTemplates');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('template');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Template = new DefaultTemplate;
        $Template->Source = addslashes($request['templateString']);
        $Template->Title = $request['Title'];
        $Template->user_id = Auth::user()->id;
        $Template->save();
       // return Redirect::to('TSource');
        $request->session()->flash('alert-success', 'Template was successful added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $default_template = DB::table('default_template')->where('user_id',Auth::user()->id)->get();
        //echo $default_template->Title;
        //exit();

        foreach ($default_template as $content) {
            $slashedString = $content->Source;
            $slashedString = stripslashes($slashedString);
            $content->Source= $slashedString;
        }        
        return View::make('DisplayTemplates')->with('default_template',$default_template);

               // return View::make('MyLinks')->with('capture_contents',$capture_contents);
    }

    public function DownloadSource($id)
    {
        $default_template = DB::table('payments')->where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')->first();
        if (!empty($default_template)) {
            $creationDate  = $default_template->created_at ;
            $creationDate = Carbon::parse($creationDate);
            $now = Carbon::now();
            $difference = $creationDate->diffInDays($now);
            if ($difference <= 31) {
                $default_template = DB::table('default_template')->where('id',$id)->pluck('Source');
                $UnslashedString = stripslashes($default_template[0]);
                Storage::disk('local')->put( Auth::user()->id.date('YmdHis').'TemplateSource'.'.html',$UnslashedString);
                $filePath = storage_path().'\\app\\'.Auth::user()->id.date('YmdHis').'TemplateSource'.'.html';
                return Response::download($filePath);
            }
        }
        else{
           Session::flash('alert-class', 'alert-danger'); 
           return Redirect::to('TSource')->with('message', 'You didn\'t pay your subcription Charges. Please pay them in order to use all the features of Sales Page Ninja');
        }
        
    }

    public function DeleteSource($id)
    {
        $deletedRow = DB::table('default_template')->where('id',$id)->delete();
        if ($deletedRow == 1) {
           Session::flash('alert-class', 'alert-success'); 
           return Redirect::to('TSource')->with('message', 'Your Selected Source was deleted successfully');
        }
        else{
           Session::flash('alert-class', 'alert-danger');  
           return Redirect::to('TSource')->with('message', 'Something went wrong, Please try again');
        }
    }

}
