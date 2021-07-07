<?php

namespace App\Http\Controllers\Fronted;

use App\Interfaces\UserInterface;
use App\Models\Massages;
use App\Models\NewsLetter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Auth,Artisan,Hash,File,Crypt;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\Contact_us;
use App\Http\Controllers\Manage\EmailsController;

class GeneralController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about(){
        return view('Fronted.GeneralPages.about');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact_us(){
        return view('Fronted.GeneralPages.contact_us');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function News(Request $request){
        $News=NewsLetter::where('email',$request->email)->first();
        if(!is_null($News)){
            $msg=getLang() =='ar' ? 'البريد مسجل لدينا بالفعل' : 'already subscribed!';
            return response()->json(['status'=>0,'message'=>$msg]);
        }
        $News = new NewsLetter();
        $News->email=$request->email;
        $News->name=$request->name;
        $News->save();
        $msg=getLang() =='ar' ? 'شكرا لك' : 'Thank you!';
        return response()->json(['status'=>1,'message'=>$msg]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function massage(Request $request){
        $massage=NewsLetter::where('email',$request->email)->first();
        if(!is_null($massage)){
            $msg=getLang() =='ar' ? 'تم ارسال الرساله بالفعل' : 'a massage has been already submitted!';
            return response()->json(['status'=>0,'message'=>$msg]);
        }
        $massage = new Massages();
        $massage->email=$request->email;
        $massage->name=$request->name;
        $massage->subject=$request->subject;
        $massage->massage=$request->massage;
        $massage->save();
        $msg=getLang() =='ar' ? 'شكرا لك' : 'Thank you!';
        return response()->json(['status'=>1,'message'=>$msg]);
    }

}
