<?php

namespace App\Http\Controllers;

use DB;
use File;
use Image;

use Illuminate\Http\Request;
use App\User;
use App\Model\UserLevel;
use App\Model\System;
use App\Model\Page;
use App\Model\Social;
use App\Model\Newsletter;
use App\Model\Contact;
use App\Model\NewsCategory;
use App\Model\News;
use App\Model\Slider;

class FrontController extends Controller
{
    public function __construct(){
    	@session_start();

        //logo
        $logo = System::select('Description')->where('Code','logo')->first();
        view()->share('logo',$logo);

        //favicon
        $favicon = System::select('Description')->where('Code','favicon')->first();
        view()->share('favicon',$favicon);

        //copyright
        $copyright = System::select('Description')->where('Code','copyright')->first();
        view()->share('copyright',$copyright);

        //social
        $Social = Social::where('Status',1)->selectRaw('Name, Font, Alias')->orderBy('Sort','ASC')->get();
        view()->share('Social',$Social);

        //page
        $Page = Page::where('Status',1)->selectRaw('Name, Font, Alias')->orderBy('Sort','ASC')->get();
        view()->share('Page',$Page);

        //slider

    }

    
    public function home(){

        $PageInfor = Page::where('Status', 1)->where('Alias','/')
        ->selectRaw('Name, Images, Alias, MetaTitle, MetaDescription, MetaKeyword ')->first();


        $News = DB::table('news as a')
        ->join('news_category as b', 'a.RowIDCat', '=', 'b.id')
        ->selectRaw('a.*, b.name as CategoryName')
        ->where('a.RowIDCat', 1)
        ->orderBy('a.id', 'DESC')
        ->limit(6)->get();

        $NewsSale = DB::table('news as a')
        ->join('news_category as b', 'a.RowIDCat', '=', 'b.id')
        ->selectRaw('a.*, b.name as CategoryName')
        ->where('a.RowIDCat', 2)
        ->orderBy('a.id', 'DESC')
        ->limit(4)->get();

        $NewsViews = DB::table('news as a')
        ->join('news_category as b', 'a.RowIDCat', '=', 'b.id')
        ->selectRaw('a.*, b.name as CategoryName')
        ->orderBy('a.Views', 'DESC')
        ->limit(4)->get();


        $Slider = Slider::where('Status',1)->selectRaw('Name, Alias,Images')->orderBy('Sort','ASC')->get();

    	return view('front.home.home', compact('PageInfor','News','NewsSale','NewsViews','Slider'));
    }

    public function about(){
        $PageInfor = Page::where('Status', 1)->where('Alias','ve-chung-toi')
        ->selectRaw('Name, Images, Alias, MetaTitle, MetaDescription, MetaKeyword,Description ')
        ->first();

        return view('front.about.about', compact('PageInfor'));
    }

    public function contact(){
        $PageInfor = Page::where('Status', 1)->where('Alias','lien-he')
        ->selectRaw('Name, Images, Alias, MetaTitle, MetaDescription, MetaKeyword,Description ')->first();

        $Map = System::where('Status', 1)
          ->where('Code', 'map')
          ->selectRaw('Description')->first();

        return view('front.contact.contact', compact('PageInfor', 'Map'));
    }

    public function search(Request $request){
        $PageInfor = Page::where('Status', 0)->where('Alias','tim-kiem')
        ->selectRaw('Name, Images, Alias, MetaTitle, MetaDescription, MetaKeyword,Description ')
        ->first();

        if (isset($request->tukhoa) && $request->tukhoa != NULL) {
            $searchList = News::where('Status',1)
            ->where('Name', 'like','%'.$request->tukhoa.'%')
            ->selectRaw('Name, Alias, Images, SmallDescription')
            ->paginate(12);
        }else{
            $searchList = NULL;
        }

        return view('front.search.search', compact('PageInfor','searchList'));
    }

    public function slug(Request $request ,$slug){
        $newsCat = Page::where('Status',1)->where('Alias',$slug)->first();

        if (isset($newsCat) && $newsCat != NULL ) {
            if (isset($request->sapxep) && $request->sapxep == 'luotxem') {
                 $listNews = DB::table('news as a')
                ->join('news_category as b', 'a.RowIDCat', '=', 'b.id')
                ->where('a.Status',1)
                ->where('b.Alias',$slug)
                ->selectRaw('a.Alias, a.Name, a.Images, a.SmallDescription')
                ->orderBy('a.Views','DESC')
                ->paginate(12);
                $sort = 'luotxem';
            }
            else{
                 $listNews = DB::table('news as a')
                ->join('news_category as b', 'a.RowIDCat', '=', 'b.id')
                ->where('a.Status',1)
                ->where('b.Alias',$slug)
                ->selectRaw('a.Alias, a.Name, a.Images, a.SmallDescription')
                ->orderBy('a.id','DESC')
                ->paginate(12);
                $sort = 'tinmoi';
            }
           
            return view('front.news.cat', compact('newsCat','listNews','sort'));
        }

        
    }

    public function slugHtml(Request $request ,$slug){
        $newsDetail = DB::table('news as a')
        ->join('news_category as b', 'a.RowIDCat', '=', 'b.id')
        ->where('a.Status',1)
        ->where('a.Alias',$slug)
        ->selectRaw('a.Alias, a.Name, a.Images, a.MetaTitle, a.MetaDescription, a.MetaKeyword, 
            a.Description, a.created_at, a.Views, b.Name as NewsCatName, b.Alias as NewsCatAlias')
        ->orderBy('a.Views','DESC')
        ->first();

        return view('front.news.detail', compact('newsDetail'));
    }

    public function contactSendEmail(Request $request){
        if ($request->txtName != '' && 
            $request->txtEmail != '' &&
            $request->txtPhone != '' &&
            $request->txtMessage != '') {

            $Contact = new Contact;
            $Contact->Name = $request->txtName;
            $Contact->Phone = $request->txtPhone;
            $Contact->Email = $request->txtEmail;
            $Contact->Message = $request->txtMessage;
            $Flag = $Contact->save();
            if ($Flag == true) {
                echo "finish";
            }
            else{
                echo "error";
            } 
        }else{
            echo "error_empty";
        }
    }

    public function subEmail(Request $request){
        if ($request->txtEmailSub != '') {
            $Newsletter = Newsletter::where('Email', $request->txtEmailSub)->get();
            if (isset($Newsletter) && count($Newsletter) > 0) {
                echo "error_exists_email";
            }else{
               $Newsletter = new Newsletter;
               $Newsletter->Email = $request->txtEmailSub;
               $Flag = $Newsletter->save();

                if ($Flag == true) {
                    echo "finish";
                }
                else{
                    echo "error";
                }
            }
        }else{
            echo "error_22";
        }
    }
}
