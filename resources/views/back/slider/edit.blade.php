@extends('back.template.master')

@section('title', 'Quản lý slideshow')
@section('heading', 'Thêm slideshow')
@section('slider', 'active')
@section('content')
<div class="col-md-12">
    <div class="card-header">
      <a class="btn btn-danger" href="{{url('admin/slider/list')}}" title="Quay lại">Quay lại</a>
    </div>
  <!-- general form elements -->
  <div class="card card-primary">
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" action="{{url('admin/slider/edit/'.$Slider->id)}}" method="POST" enctype="multipart/form-data">
      <div class="card-body">
        {!! csrf_field() !!}
        <div class="form-group">
          <select class="form-control" name="Status">
            <option value="1" @if($Slider->Status == 1) selected =="" @endif>
              Trạng thái: Bật
            </option> 
            <option value="0" @if($Slider->Status == 0 )selected ==""  @endif>
              Trạng thái: Tắt
            </option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Tên slider<span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="Name" id="title" value="{{$Slider->Name}}">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Đường dẫn<span class="text-danger">*</span></span></label>
          <input type="text" class="form-control" name="Alias" value="{{$Slider->Alias}}">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Sắp xếp</label>
          <input type="number" name="Sort" value="{{$Slider->Sort}}" class="form-control" />
        </div>
         <div class="form-group">
          <label for="exampleInputEmail1">Ảnh đại diện</label>
          <br>
          @if($Slider->Images != null)
          <img src="{{url('images/slider/'.$Slider->Images)}}" alt="Avatar" width="100">
          @endif
          <br/>
          <br/>
          <input type="file" name="Images">
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