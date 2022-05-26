//đăng kí nhân tin khuyến mãi footer
$('#btnSendSub').click(function(){

	var txtEmailSub = $('#txtEmailSub').val();
	var _token = $('#_token').val();

	//check email có trống hay không
	var reg =  /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	if (reg.test(txtEmailSub) == false) {
		alert('Email này không hợp lệ, vui lòng kiểm tra lại !');
		return false;
	}
	  $.ajax({
      type: 'POST',
      url: url + "/dang-ky-nhan-tin-khuyen-mai",
      data: { 
        txtEmailSub : txtEmailSub, 
        _token : _token 
      },
      success: function(data) {
        if (data == 'error_exists_email') {
          alert('Email này đã tồn tại, xin vui lòng kiểm tra lại !');
        } else if(data == 'error'){
          alert('Có lỗi trong quá trình thêm email, xin vui lòng kiểm tra lại !');
        }else{
          alert('Đăng khí nhận tin khuyến mãi thành công !');
        }
      }
  });
});

//gửi email liên hệ
$('#btnSendContact').click(function(){

  var _token = $('#_token').val();  
  var txtEmail = $('#txtEmail').val();
  var txtName = $('#txtName').val();
  var txtPhone = $('#txtPhone').val();
  var txtMessage = $('#txtMessage').val();

  if (txtEmail =='' || txtName =='' || txtPhone =='' || txtMessage == '') {
     alert('Vui lòng điền đầy đủ thông tin !');
    return false;
  }
  //check email có trống hay không
 var reg =  /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

  // if (reg.test(txtEmailSub) == false) {
  //   alert('Email này không hợp lệ, vui lòng kiểm tra lại !');
  //   return false;
  // }
    $.ajax({
      type: 'POST',
      url: url + "/gui-email-lien-he",
      data: { 
        txtEmail:txtEmail, 
        txtName:txtName,
        txtPhone:txtPhone,
        txtMessage:txtMessage,
        _token : _token 
      },
      success: function(data) {
        alert(data);
          if(data == 'error_empty'){
          alert('Vui lòng điền đầy đủ thông tin !');
        }else if(data == 'error'){
          alert('Có lỗi trong quá trình gửi liên hệ, xin vui lòng kiểm tra lại !');
        }
        else{
          alert('Chúng tôi đã nhận được email liên hệ và sẽ sớm trả lời đến bạn !');
        }
      }
  });

});


//sắp xếp news

$('#newsSort').on('change', function() {
  var cat = $('#newsCat').val();
  var sort = this.value;
  if (sort != '') {
    window.location.href= url+"/"+cat+"/?sapxep="+sort;
  }
});