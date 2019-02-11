<?php 	 

require_once '../core/init.php';

if( Input::get('type') == 'insert' ){
	
	if($user->cek_nama(Input::get('user'))){
		$response = array('status'=>'error_username');
	} else {
		$user->register_user(array(
			'name'     => (Input::get('name')),
			'username' => trim(Input::get('user')),
			'password' => password_hash(Input::get('pass'), PASSWORD_DEFAULT),
			'email' 	 => trim(Input::get('mail'))
		));

		ob_start();
	  include "ajax-admin-view.php";
	  $html = ob_get_contents();
	  ob_end_clean();

		$response = array( 'status'=>'success', 'html'=>$html );
	}
		
} else if( Input::get('type') == 'update' ){

 	$user_data = $user->get_user('id', Input::get('id')); 

	if( password_verify(Input::get('pass_lama'), $user_data['password']) ){
		$user->update_user(array(
			'name'     => (Input::get('name')),
			'username' => trim(Input::get('user')),
			'password' => password_hash(trim(Input::get('pass_baru')), PASSWORD_DEFAULT),
			'email' 	 => trim(Input::get('mail'))
		), Input::get('id'));

		ob_start();
	  include "ajax-admin-view.php";
	  $html = ob_get_contents();
	  ob_end_clean();
		  
	$response = array( 'status'=>'success', 'html'=>$html );
	}else{
	  $response = array( 'status'=>'error_pass' );
	}

} else if ( Input::get('type') == 'delete' ) {

	$id = Input::get('id');

	if ($user->delete_user($id)) {
	  ob_start();
	  include "ajax-admin-view.php";
	  $html = ob_get_contents();
	  ob_end_clean();
	  
	  $response = array( 'status'=>'success', 'html'=>$html );
	}else{
		$response = array( 'status'=>'gagal' );
	}

}

echo json_encode($response);
?>