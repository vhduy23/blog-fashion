@extends('back.template.master')

@section('title', 'Quản lý thông tin tài khoản')
@section('heading', 'Thông tin tài khoản')
@section('content')
<div class="col-md-12">
  <!-- general form elements -->
  <div class="card card-primary">
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" action="{{url('admin/staff/profile')}}" method="POST">
      <div class="card-body">
        <div class="form-group">
        {!! csrf_field() !!}
          <input type="hidden" name="id" value="{{Auth::user()->id}}">
          <label for="exampleInputEmail1">Họ và tên<span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="fullname" value="{{Auth::user()->fullname}}">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Email<span class="text-danger">*</span></label>
          <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Số điện thoại<span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Địa chỉ</label>
          <input type="text" class="form-control" name="address" value="{{Auth::user()->address}}">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Tài khoản</label>
          <input type="text" class="form-control" name="username" value="{{Auth::user()->username}}" disabled="">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Mật khẩu</label>
           <input type="text" class="form-control" name="password"> <!--value="{{Auth::user()->password}}"-->
           <p class="text-danger">Không nhập trường này nếu không đổi mật khẩu</p>
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