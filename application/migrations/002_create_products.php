<?php
class Migration_Create_products extends CI_Migration {
    public function up() {
        $this->dbforge->add_field(array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'auto_increment' => TRUE),
            'name' => array('type' => 'VARCHAR', 'constraint' => '255'),
            'price' => array('type' => 'DECIMAL', 'constraint' => '10,2'),
            'stock_quantity' => array('type' => 'INT', 'constraint' => 11),
            'user_id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE), // The Seller
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('products');
        // Note: CI3 dbforge doesn't support FK constraints natively well; usually added via raw query or manual management.
    }

    public function down() { $this->dbforge->drop_table('products'); }
}