<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requests;
use App\Http\Requests\CaptureContentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\CaptureContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use Response;
use View;
use DOMDOCUMENT;
use Carbon\Carbon;
require_once 'html/simple_html_dom.php';


class CaptureController extends Controller
{
    public function Index()
    {
        return View('Index');
    }

    public function LoadCSS(CaptureContentRequest $request)
    {
         $website = file_get_html($request['site_url']);
         $numberOfLinks=0;
         $arrayOfLinks[] = array();
         $siteParentURL = parse_url($request['site_url']);
         $siteScheme = $siteParentURL['scheme'];
         $siteParentURL = $siteParentURL['host'];
         set_time_limit ( 300);
         foreach ($website->find('link[rel="stylesheet"]') as $stylesheet)
           {
               if (substr( $stylesheet->href, 0, 4 ) != "http" && !(preg_match('/google/',$stylesheet->href)) ) {
                   $stylesheet_url = $stylesheet->href;
                   $completeCssUrl = $siteScheme. "://" .$siteParentURL. $stylesheet_url;
                   $csslinkURL= '<link rel="stylesheet"  href="'.$completeCssUrl.'">';
                   $arrayOfLinks[$numberOfLinks] = $csslinkURL;
                   $numberOfLinks++;
               }
           }      
            return $arrayOfLinks;
     }

    public function LoadJS(CaptureContentRequest $request)
    {
         $website = file_get_html($request['site_url']);
         $numberOfLinks=0;
         $arrayOfLinks[] = array();
         $siteParentURL = parse_url($request['site_url']);
         $siteScheme = $siteParentURL['scheme'];
         $siteParentURL = $siteParentURL['host'];
         set_time_limit ( 300);
         //You should use an if statement here to handle the find boolean error
         foreach ($website->find('script') as $jScripts)
           {
              if (substr( $jScripts->src, 0, 4 ) != "http" && $jScripts->src!="") 
              { 
                   $jScripts_url = $jScripts->src;
                   $completeJsUrl = $siteScheme. "://" .$siteParentURL. $jScripts_url;
                   $jSLinkURL ='<script type="text/javascript" src="'.$completeJsUrl.'"></script>';
                   $arrayOfLinks[$numberOfLinks] = $jSLinkURL;

                   $numberOfLinks++;     
              }
           }    
         return $arrayOfLinks;  
    }

    public function CaptureContent(CaptureContentRequest $request)
    {
        if((Auth::user()))
        {
            $allJsLinks = $this->LoadJS($request);
            $allCssLinks = $this->LoadCSS($request);
            $jsLinksString ="";
            $cssLinksString ="";
            If(!empty($allJsLinks) && !(is_array($allJsLinks[0]))){
                $jsLinksString =implode(" ",$allJsLinks);
            }
            elseif (is_array($allJsLinks[0])) {
            $jsLinksString =implode(" ",$allJsLinks[0]);
            }

            If(!empty($allCssLinks)&& !(is_array($allCssLinks[0]))){
                $cssLinksString =implode(" ",$allCssLinks);
            }
            elseif (is_array($allCssLinks[0])) {
                $cssLinksString =implode(" ",$allCssLinks[0]);
            }
                        
            $allURLs =  $jsLinksString . $cssLinksString;
            $headElement;
            $bodyElement;

            $grabbedWebsite = file_get_html($request['site_url']);

            
            if (!empty($grabbedWebsite)) {
                foreach ( $grabbedWebsite->find('head') as $head) {

                    $headElement = $head->outertext = $allURLs.$head->outertext;
                }
                foreach ( $grabbedWebsite->find('body') as $body) {

                    $bodyElement = $body->outertext;
                }

            }
        $fileName = Auth::user()->id;
        Storage::disk('local')->put( Auth::user()->id.'.html', "<!DOCTYPE html><html><head>".$headElement.$bodyElement."</html>");
        return response()->json(['head' => $headElement,'body' =>$bodyElement]);
    }
    else
    {
            $allJsLinks = $this->LoadJS($request);
            $allCssLinks = $this->LoadCSS($request);
            $jsLinksString ="";
            $cssLinksString ="";
            If(!empty($allJsLinks) && !(is_array($allJsLinks[0]))){
                $jsLinksString =implode(" ",$allJsLinks);
            }
            elseif (is_array($allJsLinks[0])) {
                $jsLinksString =implode(" ",$allJsLinks[0]);
            }

            If(!empty($allCssLinks)&& !(is_array($allCssLinks[0]))){
                $cssLinksString =implode(" ",$allCssLinks);
            }
            elseif (is_array($allCssLinks[0])) {
                $cssLinksString =implode(" ",$allCssLinks[0]);
            }
                        
            $allURLs =  $jsLinksString . $cssLinksString;
            $headElement;
            $bodyElement;

            $grabbedWebsite = file_get_html($request['site_url']);

            
            if (!empty($grabbedWebsite)) {
                foreach ( $grabbedWebsite->find('head') as $head) {

                    $headElement = $head->outertext = $allURLs.$head->outertext;
                }
                foreach ( $grabbedWebsite->find('body') as $body) {

                    $bodyElement = $body->outertext;
                    }
            }
        return response()->json(['head' => $headElement,'body' =>$bodyElement]);
        }
    }
    public function SaveSource(Request $request)
    {
        $Content = new CaptureContent;
        $Content->URL= $request['site_url2'];
        $Content->Source = addslashes(Storage::get(Auth::user()->id.'.html'));
        $Content->user_id = Auth::user()->id;
        $Content->save();
        Session::flash('alert-class', 'alert-success'); 
        return Redirect::to('Links')->with('message', 'Your Source was saved Successfully');
        //$request->session()->flash('alert-success', 'Data was successful added!');
    }
    public function GetSource()
    {
        $capture_contents = DB::table('capture_contents')->where('user_id',Auth::user()->id)->get();
        foreach ($capture_contents as $content) {
            $slashedString = $content->Source;
            $slashedString = stripslashes($slashedString);
            $content->Source= $slashedString;
        }        
        return View::make('MyLinks')->with('capture_contents',$capture_contents);
        //return View::make('MyLinks', compact('capture_contents'));
    }

    public function DownloadSource($id)
    {
        $default_template = DB::table('payments')->where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')->first();
        
        if (!empty($default_template)) {
            $creationDate  = $default_template->created_at;
            $creationDate = Carbon::parse($creationDate);
            $now = Carbon::now();
            $difference = $creationDate->diffInDays($now);
            if ($difference <= 31) {
                $capture_contents = DB::table('capture_contents')->where('id',$id)->pluck('Source');
                $slashedString = stripslashes($capture_contents[0]);
                Storage::disk('local')->put( Auth::user()->id.'Source'.'.html',$slashedString);
                $filePath = storage_path().'\\app\\'.Auth::user()->id.'Source'.'.html';
                return Response::download($filePath);
            }
        }
        else{
           Session::flash('alert-class', 'alert-danger'); 
           return Redirect::to('Links')->with('message', 'You didn\'t pay your subcription Charges. Please pay them in order to use all the features of Sales Page Ninja');
        }
    }

    public function DeleteSource($id)
    {
        $deletedRow = DB::table('capture_contents')->where('id',$id)->delete();
        if ($deletedRow == 1) {
           Session::flash('alert-class', 'alert-success'); 
           return Redirect::to('Links')->with('message', 'Your Selected Source was deleted successfully');
        }
        else{
           Session::flash('alert-class', 'alert-danger');  
           return Redirect::to('Links')->with('message', 'Something went wrong, Please try again');
        }
    }
}

