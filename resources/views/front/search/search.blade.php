@extends('front.template.master')

@section('title', $PageInfor->MetaTitle)
@section('description', $PageInfor->MetaDescription)
@section('keywords', $PageInfor->MetaKeyword)
@section('url', url('/'.$PageInfor->Alias))

@section($PageInfor->Alias, 'active')

@section('images', url('images/page/'.$PageInfor->Images))
@section('content')
   <div class="contact_wrap">
    <div class="container"> 
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="contact_page">
            <div class="heading">
              {{$PageInfor->Name}}
            </div>
            <div class="contact_descripton">
              @if(isset($searchList) && $searchList != NULL)
                <ul class="news_cat_wrap">
                  @foreach($searchList as $k => $v)
                  <li>
                    <a href="{{url('/'.$v->Alias)}}.html" title="{{$v->Name}}">
                      <img src="{{url('images/news/'.$v->Images)}}" alt="{{$v->Name}}"/>
                      <b>{{$v->Name}}</b>
                      <p>
                        {{ str_limit($v->SmallDescription, $limit = 90, $end = '...') }}
                        <span>[đọc thêm]</span>
                      </p>
                    </a>
                  </li>
                   @endforeach
                </ul>
              @else
              <p>Không tìm thấy kết quả nào!</p>
              @endif
            </div>

            <div class="clearfix"></div>
          </div>
        </div>
        </div>
      </div>
   </div>

@stop