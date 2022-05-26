@extends('back.template.master')

@section('title', 'Quản lý danh sách tin tức')
@section('heading', 'Chỉnh sửa tin tức')
@section('news', 'active')
@section('content')
<div class="col-md-12">
    <div class="card-header">
      <a class="btn btn-danger" href="{{url('admin/news/list')}}" title="Thêm">Quay lại</a>
    </div>
  <!-- general form elements -->
  <div class="card card-primary">
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" action="{{url('admin/news/edit/'.$News->id)}}" method="POST" enctype="multipart/form-data">
      <div class="card-body">
        {!! csrf_field() !!}
        <div class="form-group">
          <select class="form-control" name="Status">
            <option value="1" @if($News->Status == 1) selected="" @endif>
              Trạng thái: Bật
            </option> 
            <option value="0" @if($News->Status == 0) selected="" @endif>
              Trạng thái: Tắt
            </option>
          </select>
        </div>
        <div class="form-group">
          <select class="form-control" name="RowIDCat">
            @if(isset($NewsCategory) && count($NewsCategory) > 0)
            @foreach($NewsCategory as $k=>$v)
            <option value="{{$v->id}}" @if($News->RowIDCat == $v->id) selected="" @endif>
              Danh mục: {{$v->Name}}
            </option>
            @endforeach
            @endif 
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Tên tin tức<span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="Name" value="{{$News->Name}}" id="title" onkeyup="ChangeToSlug();">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Đường dẫn</span></label>
          <input type="text" class="form-control" name="Alias" id="slug" value="{{$News->Alias}}" >
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Thẻ meta title</label>
          <textarea name="MetaTitle" rows="2" class="form-control">{{$News->MetaTitle}}</textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Thẻ meta description</label>
          <textarea name="MetaDescription" rows="4" class="form-control">{{$News->MetaDescription}}</textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Thẻ meta keyword</label>
          <textarea name="MetaKeyword" rows="2" class="form-control">{{$News->MetaKeyword}}</textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Lượt xem</label>
          <input type="number" name="Views" value="{{$News->Views}}" class="form-control" />
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Giới thiệu ngắn</label>
          <textarea name="SmallDescription" rows="3" class="form-control">{{$News->SmallDescription}}</textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Ảnh đại diện</label>
          <br>
          @if($News->Images != null)
          <img src="{{url('images/news/'.$News->Images)}}" alt="Avatar">
          @endif
          <br/>
          <br/>
          <input type="file" name="Images">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Mô tả tin tức<span class="text-danger">*</span></label>
          <textarea name="Description" rows="8" class="form-control" id="ckeditor">{{$News->Description}}</textarea>
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
      </div>
    </form>
  </div>
  <!-- /.card -->
</div>
@stop