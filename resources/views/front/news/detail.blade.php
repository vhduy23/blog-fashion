@extends('front.template.master')

@section('title', $newsDetail->MetaTitle)
@section('description', $newsDetail->MetaDescription)
@section('keywords', $newsDetail->MetaKeyword)
@section('url', url('/'.$newsDetail->Alias))

@section($newsDetail->Alias, 'active')

@section('images', url('images/page/'.$newsDetail->Images))
@section('content')
   <div class="contact_wrap">
    <div class="container"> 
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="contact_page">
            <div class="heading">
              {{$newsDetail->Name}}
            </div>
            <div class="news_detail_statistic">
              <i class="far fa-calendar-alt fa-fw"></i>
              {{ date('d/m/Y H:i:s', strtotime($newsDetail->created_at))}}
              &nbsp;&nbsp;
              <i class="fas fa-eye fa-fw"></i>
               {{number_format($newsDetail->Views)}}
            </div>
            <div class="contact_descripton news_detail_editor">
              {!!$newsDetail->Description!!}
            </div>
          </div>
        </div>
        </div>
      </div>
   </div>

@stop