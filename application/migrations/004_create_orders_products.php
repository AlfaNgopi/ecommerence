<?php
class Migration_Create_orders_products extends CI_Migration {
    public function up() {
        $this->dbforge->add_field(array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'auto_increment' => TRUE),
            'order_id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE),
            'product_id' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE),
            'quantity' => array('type' => 'INT', 'constraint' => 11),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('order_products');
    }

    public function down() { $this->dbforge->drop_table('order_products'); }
}