@extends('back.template.master')

@section('title', 'Quản lý liên hệ')
@section('heading', 'Chỉnh sửa liên hệ')
@section('contact', 'active')
@section('content')
<div class="col-md-12">
    <div class="card-header">
      <a class="btn btn-danger" href="{{url('admin/contact/list')}}" title="Thêm">Quay lại</a>
    </div>
  <!-- general form elements -->
  <div class="card card-primary">
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" action="{{url('admin/contact/edit/'.$Contact->id)}}" method="POST">
      <div class="card-body">
        {!! csrf_field() !!}
        <div class="form-group">
          <select class="form-control" name="IsViews">
            <option value="1" @if($Contact->IsViews == 1) selected="" @endif>
              Trạng thái: Đã xem
            </option> 
            <option value="0" @if($Contact->IsViews == 0) selected="" @endif>
              Trạng thái: Chưa xem
            </option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Họ tên<span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="Name" value="{{$Contact->Name}}">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email<span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="Email" value="{{$Contact->Email}}">
        </div>
         <div class="form-group">
          <label for="exampleInputEmail1">Số điện thoại<span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="Phone" value="{{$Contact->Phone}}">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Lời nhắn <span class="text-danger">*</span></label>
          <textarea name="Message" class="form-control" rows="7">{{$Contact->Message}}</textarea>
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