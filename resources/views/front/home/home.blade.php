@extends('front.template.master')

@section('title', $PageInfor->MetaTitle)
@section('description', $PageInfor->MetaDescription)
@section('keywords', $PageInfor->MetaKeyword)
@section('url', url('/'))
@section('home', 'active')
@section('images', url('images/page/'.$PageInfor->Images))
@section('content')
   <div class="home_page">
   		<div class="slider_wrap">
   			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			  	@if(isset($Slider) && count($Slider) > 0)
			  	@foreach($Slider as $k=>$v)
			    <div class="item @if($k==0) active @endif">
			    	<a href="$v->Alias" title="$v->Name">
			      		<img src="{{url('images/slider/'.$v->Images)}}" alt="{{$v->Name}}">
			      	</a>
			    </div>
			    @endforeach
			    @endif
			  </div>

			  <!-- Controls -->
			  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
   		</div>	
		<div class="container"> 
			<div class="col-xs-12 col-sm-12 col-md-12">
   				<div class="home_top">
   					<div class="home_top_left">
   						<div class="heading">
   							Blog mới nhất
   						</div>
   						<ul>
   							@if(isset($News) && count($News) > 0)
   							@foreach($News as $k=>$v)
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
   					</div>
   					<div class="home_top_right">
   						<div class="heading">
   							Về chúng tôi
   						</div>
   						<img src="{{url('public/images/about.png')}}" alt="About">
   						<b>Blogger Võ Hữu Duy</b>
   						<p><strong>HDnews</strong> là một blog tin tức chuyên viết về mảng thời trang, được thành lập và vận hành bởi Võ Hữu Duy.</p>
						<p>Duy hiện là sinh viên có đam mê về thời trang nên đã xây đựng môt blog thời trang, cập nhật những xu hướng thời trang mới nhất để chia sẻ đến mọi người...<a href="{{'ve-chung-toi'}}" title="Xem thêm">[đọc thêm]</a></p>
						<div class="home_social">
							@if(isset($Social) && count($Social) > 0)
			                @foreach($Social as $k => $v)
			                <a href="{{$v->Alias}}" title="{{$v->Name}}">
			                  {!!$v->Font!!}
			                </a>
			                @endforeach
			                @endif
						</div>
   					</div>
   				</div>
   			</div>
   		</div>

   		<div class="container"> 
   			<div class="row">
   				<div class="col-xs-12 col-sm-12 col-md-12" style="padding-left: 30px;">
   					<div class="heading" style="margin-top: 55px; color: #fff;"> 
   						Khuyến mãi mới nhất
   					</div>
   				</div>
				@if(isset($NewsSale) && count($NewsSale) > 0)
				@foreach($NewsSale as $k=>$v)
				<div class="col-xs-12 col-sm-6 col-md-3" id="home_sale">
					<div class="home_center">
						<a href="{{url('/'.$v->Alias)}}.html" title="{{$v->Name}}">
							<img src="{{url('images/news/'.$v->Images)}}" alt="{{$v->Name}}" />
								<b> 
									<p>
										{{ str_limit($v->Name, $limit = 45, $end = '...') }}
									 </p> 
								</b>
							<p>
								{{ str_limit($v->SmallDescription, $limit = 90, $end = '...') }}
								<span>[đọc thêm]</span>
							</p>
						</a>
					</div>
				</div>
				@endforeach
				@endif
   		   	</div>		
   		</div>

   		<div class="container"> 
   			<div class="row">
   				<div class="col-xs-12 col-sm-12 col-md-12">
   					<div class="home_bottom">
	   					<div class="heading"> 
	   						Blog mới nhất
	   					</div>
	   					<ul>
   						@if(isset($NewsViews) && count($NewsViews) > 0)
						@foreach($NewsViews as $k=>$v)
	   					<li>
							<a href="{{url('/'.$v->Alias)}}.html" title="{{$v->Name}}">
								<img src="{{url('images/news/'.$v->Images)}}" alt="{{$v->Name}}" />
								<b> 
										{{ str_limit($v->Name, $limit = 35, $end = '...') }}
								</b>
								<p>
									{{ str_limit($v->SmallDescription, $limit = 70, $end = '...') }}
									<span>[đọc thêm]</span>
								</p>
							</a>
	   					</li>
	   					@endforeach
						@endif
	   				</ul>
   				</div>
 			</div>
   		   	</div>		
   		</div>
   </div>
@stop