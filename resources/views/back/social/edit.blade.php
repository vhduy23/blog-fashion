@extends('back.template.master')

@section('title', 'Quản lý trang')
@section('heading', 'Chỉnh sửa trang')
@section('social', 'active')
@section('content')
<div class="col-md-12">
    <div class="card-header">
      <a class="btn btn-danger" href="{{url('admin/social/list')}}" title="Thêm">Quay lại</a>
    </div>
  <!-- general form elements -->
  <div class="card card-primary">
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" action="{{url('admin/social/edit/'.$Social->id)}}" method="POST">
      <div class="card-body">
        {!! csrf_field() !!}
        <div class="form-group">
          <select class="form-control" name="Status">
            <option value="1" @if($Social->Status == 1) selected="" @endif>
              Trạng thái: Bật
            </option> 
            <option value="0" @if($Social->Status == 0) selected="" @endif>
              Trạng thái: Tắt
            </option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Tên mạng xã hội<span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="Name" value="{{$Social->Name}}">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Đường dẫn</label>
          <input type="text" class="form-control" name="Alias" value="{{$Social->Alias}}">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Font<span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="Font" value="{{$Social->Font}}">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Sắp xếp<span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="Sort" value="{{$Social->Sort}}">
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập nhật</button>
      </div>
    </form>
  </div>
  <!-- /.card -->
</div>
@stop