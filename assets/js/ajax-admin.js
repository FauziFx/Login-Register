$(document).ready(function(){
	$('#load-add-admin').hide();

  /* Add User */
	$('#btn-add-admin').click(function(){
		var n = $('#name').val();
    var u = $('#user').val();
    var p = $('#pass').val();
    var pv = $('#pass_verify').val();
    var m = $('#mail').val();
    
    if( n == '' || u == '' || p == '' ){
      swal("Oops...", "Form tidak boleh kosong!", "error");
    }else{
      if( p != pv ){
        swal("Oops...", "Password Verify salah!!", "error");
      } else {
        $('#load-add-admin').show();

        var data = new FormData();

        data.append('name', n);
        data.append('user', u);
        data.append('pass', p);
        data.append('mail', m);
        data.append('type', 'insert');

        $.ajax({
          url         : 'ajax/ajax-admin.php',
          type        : 'POST',
          data        : data,
          processData : false,
          contentType : false,
          dataType    : 'json',
          beforeSend  : function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success     : function(response){ 
            if(response.status == "success"){ 
              $("#admin-view").html(response.html);
              swal("Good job!", "Data berhasil disimpan", "success");
              $("#form-add-admin input").val(""); 
            }else if(response.status == "error_username"){ 
              swal("Oops...", "Username sudah terdaftar", "error");
            }
            $("#load-add-admin").hide(); 
          },
          error       : function (xhr, ajaxOptions, thrownError) {
            alert("ERROR : "+xhr.responseText); 
          }
        }); // End Ajax
      } // End Pass Verify
    } // End Form tidak boleh kosong
	}); // End Add user

  $('#load-edit-admin').hide();
  $('#wrong-pass').hide();

  $('#edit').on('hidden.bs.modal', function (e) {
    $('#form-edit-admin input').val('');
    $('#wrong-pass').hide();
  })

  /* Edit User */
  $('#btn-edit-admin').click(function(){
    var id = $('#_id').val();
    var n  = $('#_name').val();
    var u  = $('#_user').val();
    var pl = $('#pass_lama').val();
    var pb = $('#pass_baru').val();
    var pv = $('#pass_verif').val();
    var m  = $('#_mail').val();
    
    if( n == '' || u == '' || pl == '' || pb == '' || pv == '' || m == ''  ){
      swal("Oops...", "Form tidak boleh kosong!", "error");
    }else{
      if( pb != pv ){
        $('#wrong-pass').show();
        $('#wrong-pass').css('color', 'red');
      } else {
        var data = new FormData();

        data.append( 'id', id );
        data.append( 'name', n );
        data.append( 'user', u );
        data.append( 'pass_lama', pl );
        data.append( 'pass_baru', pb );
        data.append( 'mail', m );
        data.append('type', 'update');

        $('#load-edit-admin').show();

        $.ajax({
          url         : 'ajax/ajax-admin.php',
          type        : 'POST',
          data        : data,
          processData : false,
          contentType : false,
          dataType    : 'json',
          beforeSend  : function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success     : function(response){ 
            $("#load-edit-admin").hide(); 
            
            if(response.status == "success"){ 
              $("#admin-view").html(response.html);
              swal("Good job!", "Data berhasil diubah", "success");
              $("#formubah input").val("");
              $("#edit").modal('hide');
            }else if(response.status == "error_pass"){
              swal("Oops...", "Password lama salah!", "error");
            }
          },
          error       : function (xhr, ajaxOptions, thrownError) {
            alert("ERROR : "+xhr.responseText); 
          }
        }); // End Ajax
      } // End Pass Verify 
    } // End Form tidak boleh kosong
  }); // End Edit User


  $('#load-delete-admin').hide();
  /* Delete user */
  $('#btn-delete-admin').click(function(){

    var data = new FormData();
    data.append('id', $('#id_user').val());
    data.append('type', 'delete');
    
    $("#load-delete-admin").show(); 
    
    $.ajax({
      url: 'ajax/ajax-admin.php',
      type: 'POST',
      data: data, 
      processData: false,
      contentType: false,
      dataType: "json",
      beforeSend: function(e) {
        if(e && e.overrideMimeType) {
          e.overrideMimeType("application/json;charset=UTF-8");
        }
      },
      success: function(response){ 
        $("#load-delete-admin").hide();
        if(response.status == "success"){ 
          $("#admin-view").html(response.html);
          swal("Good job!", "Data berhasil dihapus", "success");
          $("#delete").modal('hide'); 
        }else{ 
          swal("Oops...", "Ada masalah saat menghapus data", "error");
        }
      },
      error: function (xhr, ajaxOptions, thrownError) { 
        alert("ERROR : "+xhr.responseText); 
      }
    }); // End Ajax
  }); // End Delete user

  // getUrlparameter()
  var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
      sURLVariables = sPageURL.split('&'),
      sParameterName,
      i;

    for (i = 0; i < sURLVariables.length; i++ ) {
      sParameterName = sURLVariables[i].split('=');

      if ( sParameterName[0] === sParam ) {
        return sParameterName[1] === undefined ? true : sParameterName[1];
      }
    }
  };

  page = getUrlParameter('p');
  if(page == 'data_siswa' || page == 'data_jurusan' || page == 'data_angkatan'){
    $('#data').addClass('active');
  } else {
    $('#dashboard').addClass('active');
  }

}); /*End*/