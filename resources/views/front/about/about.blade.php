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
              {!!$PageInfor->Description!!}
            </div>
           
          </div>
        </div>
        </div>
      </div>
   </div>

@stop