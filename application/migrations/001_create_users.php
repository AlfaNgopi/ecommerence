<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_users extends CI_Migration {
    public function up() {
        $this->dbforge->add_field(array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'auto_increment' => TRUE),
            'name' => array('type' => 'VARCHAR', 'constraint' => '100'),
            'email' => array('type' => 'VARCHAR', 'constraint' => '100', 'unique' => TRUE),
            'password' => array('type' => 'VARCHAR', 'constraint' => '255'),
            'role' => array('type' => 'ENUM("admin", "seller", "customer")', 'default' => 'customer'),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users');
    }

    public function down() {
        $this->dbforge->drop_table('users');
    }
}