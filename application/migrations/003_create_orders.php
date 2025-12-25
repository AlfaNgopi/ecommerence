<?php
class Migration_Create_orders extends CI_Migration {
    public function up() {
        $this->dbforge->add_field(array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'auto_increment' => TRUE),
            'user_id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE),
            'order_date' => array('type' => 'DATETIME'),
            'total_price' => array('type' => 'DECIMAL', 'constraint' => '10,2'),
            'status' => array('type' => 'VARCHAR', 'constraint' => '50'),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('order');
    }

    public function down() { $this->dbforge->drop_table('order'); }
}