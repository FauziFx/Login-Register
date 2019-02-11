<?php  

class User{

	private $_db;

	public function __construct()
	{
		$this->_db = Database::getInstance();
	}

	public function register_user($fields = array())
	{
			if ( $this->_db->insert('users', $fields) ) return true;
			else return false;
	}

	public function login_user($username, $password)
	{
		$data = $this->_db->get_info('users', 'username', $username);
		
		if( password_verify($password, $data['password']) )return true;
		else return false;
	}

	public function get_users()
	{
		return $this->_db->get_info('users');
	}

	public function get_user($column, $nilai)
	{
		return $this->_db->get_info('users', $column, $nilai);
	}

	public function cek_nama($username)
	{
		$data = $this->_db->get_info('users', 'username', $username);
		if( empty($data) ) return false;
		else return true;
	}

	public function is_admin($username)
	{
		$data = $this->_db->get_info('users', 'username', $username);
		if( $data['role'] == 1 ) return true;
		else return false;
	}

	public function update_user($fields = array(), $id)
	{
		if( $this->_db->update('users', $fields, $id) ) return true;
		else return false;
	}

	public function delete_user($id)
	{
		if( $this->_db->delete('users', 'id', $id) ) return true;
		else return false;
	}

}

?>