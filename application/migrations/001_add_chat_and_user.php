<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_chat_and_user extends CI_Migration
{

	public function up()
	{
		$this->dbforge->add_field(array(
		'id' => array(
			'type' => 'INT',
			'constraint' => 5,
			'unsigned' => TRUE,
			'auto_increment' => TRUE
		),
		'user_id' => array(
			'type' => 'INT',
			'constraint' => 5,
		),
		'text' => array(
			'type' => 'VARCHAR',
			'constraint' => '255',
			'null' => TRUE,
		),
		'date' => array(
			'type' => 'DATETIME',
		),
	));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('chat');

		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'username' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE,
			),
			'date' => array(
				'type' => 'DATE',
			),
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('user');

	}

	public function down()
	{
		$this->dbforge->drop_table('chat');
		$this->dbforge->drop_table('user');
	}

}