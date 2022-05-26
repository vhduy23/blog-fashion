@extends('back.template.master')

@section('title', 'Quản lý liên hệ')
@section('heading', 'Danh sách liên hệ')
@section('contact', 'active')
@section('content')
<div class="col-md-12">
  <!-- general form elements -->
   <div class="card">
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th class="text_align_center">STT</th>
          <th class=>Email</th>
          <th class=>Họ và tên</th>
          <th class="text_align_center">Trạng thái</th>
          <th class="text_align_center"><i class="fas fa-hammer"></i> </th>
        </tr>
        </thead>
        <tbody>
          @if(isset($Contact) && count($Contact) > 0)
          @foreach($Contact as $k => $v)
            <tr>
              <td class="text_align_center">{{$k+1}}</td>
              <td>{{$v->Name}}</td>
              <td>{{$v->Email}}</td>
              <td class="text_align_center">
                @if($v->IsViews == 1)
                  <span class="color_green">Đã xem</span>
                @else
                  <span class="color_red">Chưa xem</span>
                @endif
              </td>
              <td class="text_align_center">
                <a href="{{url('admin/contact/edit/'.$v->id)}}" title="Chỉnh sửa" class="ad_button">
                  <i class="fas fa-edit"></i>
                </a>
                <a href="{{url('admin/contact/delete/'.$v->id)}}" title="Xóa" class="ad_button ad_button_delete">
                  <i class="fas fa-trash-alt"></i>
                </a>
              </td>
            </tr>
          @endforeach
          @endif
        </tbody>
        <tfoot>
        </tfoot>
      </table>
    </div>
  </div>
</div>
  <!-- /.card -->
@stop