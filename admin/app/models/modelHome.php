<?php
class modelHome{
    public function __construct(){
        $this->db = new Database;
    }

    public function pieChartJson(){
        $this->db->query("select kodeArea, sum(stok) as jumlah from stok group by kodeArea");
        $dataPieChart = $this->db->resultSet();

        $rows = array();
        $table = array();

        $table['cols'] = array(
            array('lable' => 'Area','type'=>'string'),
            array('lable' => 'Jumlah Barang', 'type' => 'number')
        );
        foreach($dataPieChart as $d):
            $temp = array();
            $temp[] = array('v'=> (string)$d['kodeArea']);
            $temp[] = array('v'=> (int)$d['jumlah']);
            $rows[] = array('c' => $temp);
        endforeach;

        $table['rows'] = $rows;

        return json_encode($table);
    }
    public function barChartJson(){
        $this->db->query("select gudang.kodeArea, ifnull(sum(stok.stok),0) as jumlah from gudang left join stok on gudang.kodeArea = stok.kodeArea group by gudang.kodeArea");
        $dataBarChart = $this->db->resultSet();
        $record = array();
        

        $table['cols'] = array(
            array('lable' => 'Section','type'=>'string'),
            array('lable' => 'SEC-A','type'=>'number'),
            array('lable' => 'SEC-B','type'=>'number'),
            array('lable' => 'SEC-C','type'=>'number')
        );
        foreach($dataBarChart as $d):
            $record[] = $d;
        endforeach;
        foreach($record as $key => $row){
            
            foreach($row as $field => $value){
                $recNew[$field][]=$value;   
            }
        }
        
        
            $temp = array();
            $temp[0] = array('stok' => 'jumlah');
            $temp[1] = array('A' => $recNew['jumlah'][0]);
            $temp[2] = array('B' => $recNew['jumlah'][1]);
            $temp[3] = array('C' => $recNew['jumlah'][2]);
        
        $rows = array('c' => $temp);

        $table['row'] = $rows;

        return json_encode($table);
    }
}

?>