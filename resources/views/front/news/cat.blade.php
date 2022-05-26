@extends('front.template.master')

@section('title', $newsCat->MetaTitle)
@section('description', $newsCat->MetaDescription)
@section('keywords', $newsCat->MetaKeyword)
@section('url', url('/'.$newsCat->Alias))

@section($newsCat->Alias, 'active')

@section('images', url('images/page/'.$newsCat->Images))
@section('content')
   <div class="contact_wrap">
    <div class="container"> 
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="contact_page">
            <div class="heading">
              {{$newsCat->Name}}
              <select id="newsSort" class="news_Cat_Sort">
                  <option value="timmoi" @if($sort == 'tinmoi') selected="" @endif>
                  Tin mới
                </option>
                  <option value="luotxem" @if($sort == 'luotxem') selected="" @endif>
                  Lượt xem
                </option>
              </select>
              <input type="hidden" id="newsCat" value="{{$newsCat->Alias}}">
            </div>
            <ul class="news_cat_wrap">
              @if(isset($listNews) && count($listNews) > 0)
              @foreach($listNews as $k=>$v)
              <li>
                <a href="{{url('/'.$v->Alias)}}.html" title="{{$v->Name}}">
                  <img src="{{url('images/news/'.$v->Images)}}" alt="{{$v->Name}}" />
                  <b>{{$v->Name}}</b>
                  <p>
                      {{ str_limit($v->SmallDescription, $limit = 90, $end = '...') }}
                      <span>[đọc thêm]</span>
                  </p>
                </a>
              </li>
              @endforeach
              @endif
            </ul>
            <div class="page_pagination">
              {{ $listNews->links() }}              
            </div>
          </div>
        </div>
        </div>
      </div>
   </div>

@stop