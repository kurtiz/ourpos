<?php


namespace App\Models;
use CodeIgniter\Model;


class StorefrontModel extends Model{

    public function sendSale(Array $sale){
        $builder = $this->db->table("sales");
        $builder->insert($sale);
        if ($this->db->affectedRows() == 1) {
            return $this->db->insertID();
        }else {
            return false;
        }
    }

    public function sendSaleDetails(Array $saleDetails){
        $builder = $this->db->table("sales_details");
        $builder->insert($saleDetails);
        if($this->db->affectedRows() == 1){

            $this->db->transStart();
            $this->db->query(
                'UPDATE `products` SET `quantity` = `quantity` - '.(float)$saleDetails['quantity'].' WHERE `product_id` = "'.$saleDetails['product_id'].'";'
            );
            $this->db->transComplete();
            return $this->db->transStatus();
        }else {
            return false;
        }
    }

    public function updateSale(Array $clause, Array $sale){
        $builder = $this->db->table("sales");
        $builder->where($clause);
        $builder->update($sale);
        if ($this->db->affectedRows() == 1) {
            return true;
        }else {
            return false;
        }
    }

    public function updateSaleDetails(Array $clause, Array $saleDetails, String $former_quantity){
        $builder = $this->db->table("sales_details");
        $builder->where($clause);
        $builder->update($saleDetails);
        if($this->db->affectedRows() == 1){
            $this->db->transStart();
            $this->db->query(
                'UPDATE `products` SET `quantity` = `quantity` + ' .(float)$former_quantity.' - '.(float)$saleDetails['quantity'].' WHERE `product_id` = "'.$saleDetails['product_id'].'";'
            );
            $this->db->transComplete();
            return $this->db->transStatus();
        }else {
            return false;
        }
    }

    public function sendCreditSale(Array $sale){
        $builder = $this->db->table("credit");
        $builder->insert($sale);
        if ($this->db->affectedRows() == 1) {
            return $this->db->insertID();
        }else {
            return false;
        }
    }

    public function sendCreditSaleDetails(Array $saleDetails){
        $builder = $this->db->table("credit_sales_details");
        $builder->insert($saleDetails);
        if($this->db->affectedRows() == 1){

            $this->db->transStart();
            $this->db->query(
                'UPDATE `products` SET `quantity` = `quantity` - '.(float)$saleDetails['quantity'].' WHERE `product_id` = "'.$saleDetails['product_id'].'";'
            );
            $this->db->transComplete();
            return $this->db->transStatus();
        }else {
            return false;
        }
    }

}