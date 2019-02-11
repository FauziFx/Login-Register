<?php
$no = 1;
$users = $user->get_users();

foreach ( $users as $data ) {
?>
<li>
	<a data-toggle="collapse" href="#<?=$no; ?>">
	  <img src="assets/img/avatar.png" class="menu-icon img-responsive">

	  <div class="menu-info">
	    <h4 class="control-sidebar-subheading" id="name-<?=$no; ?>"><?=$data['name']; ?></h4>

	    <p id="mail-<?=$no; ?>"><?=$data['email']; ?></p>
	    <input type="hidden" value="<?=$data['id']; ?>" id="id-<?=$no; ?>">
	    <input type="hidden" value="<?=$data['username']; ?>" id="user-<?=$no; ?>">
	  </div>
	</a>
</li>

<?php if($user->is_admin(Session::get('username'))){ ?>
<div class="collapse pull-right" id="<?=$no; ?>">
	<button class="btn btn-primary btn-flat btn-xs" data-toggle="modal" data-target="#edit" onclick="edit_user(<?=$no; ?>)">
		<i class="fa fa-edit"></i>&nbsp;Edit
	</button>
	<button class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#delete" onclick="delete_user(<?=$no; ?>)">
		<i class="fa fa-trash"></i>&nbsp;Hapus
	</button>
</div>
<?php } ?>

<?php $no++; } ?>

<?php if($user->is_admin(Session::get('username'))){ ?>
<script>
	
function edit_user(no) {
  var id   = $('#id-'+no).val();
  var nama = $('#name-'+no).html();
  var user = $('#user-'+no).val();
  var mail = $('#mail-'+no).html();

  $('#_id').val(id);
  $('#_name').val(nama);
  $('#_user').val(user);
  $('#_mail').val(mail);
}

function delete_user(no){
  var id = $('#id-'+no).val();
  $('#id_user').val(id);
}

</script>
<?php } ?>