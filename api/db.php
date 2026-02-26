<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Taipei");
function dd($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    exit;
}
function to($url){
    header("location: $url");
}
function q($sql){
    $dsn = "mysql:host=localhost;charset=utf8;dbname=db04_1";
    $pdo =  new PDO(dsn,'root','');
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

}
class DB{
    private $dsn = "mysql:host=localhost;dbname=db04_1;charset=utf8;";
    private $pdo;
    private $table;

    function __construct($table){
        $this->table = $table;
        $this->pdo = new PDO($this->dsn,'root','');
    }

    private function array_to_sql($array){
        $tmp =[];
        foreach ($array as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }
        return $tmp;
    }

    function all(...$arg){
        $sql = "SELECT * FROM `{$this->table}` ";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->array_to_sql($arg[0]);
                $sql .= " WHERE " . join(" AND ", $tmp);
            }
            else {
                $sql .= $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql .= $arg[1];
        }

        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function find($id){
        $sql = "SELECT * FROM `{$this->table}` ";
        if (isset($id)) {
            if (is_array($id)) {
                $tmp = $this->array_to_sql($id);
                $sql .= " WHERE " . join(" AND ", $tmp);
            }else{
                $sql .= " WHERE `id` = '{$id}'" ;
            }

        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function del($id){
        $sql = "DELETE FROM `{$this->table}` ";
        if (isset($id)) {
            if (is_array($id)) {
                $tmp = $this->array_to_sql($id);
                $sql .= " WHERE " . join(" AND ", $tmp);
            }else{
                $sql .= " WHERE `id` = '{$id}'" ;
            }
        }
        return $this->pdo->exec($sql);
    }

    function save($array){
        if (isset($array['id'])) {
            $id = $array['id'];
            unset( $array['id']);
            $sql = "UPDATE `{$this->table}` SET ";
            $tmp = $this->array_to_sql($array);
            $sql .= join(",", $tmp) . " WHERE `id` = '{$id}'";

        }else{
            $cols = join("`,`", array_keys($array));
            $vals = join("','", $array);
            $sql = "INSERT INTO `{$this->table}` (`{$cols}`) VALUES ('{$vals}')";
        }
        return $this->pdo->exec($sql);
    }

    function count(...$arg){
        $sql = "SELECT COUNT(*) FROM `{$this->table}` ";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->array_to_sql($arg[0]);
                $sql .= " WHERE " . join(" AND ", $tmp);
            }
            else {
                $sql .= $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql .= $arg[1];
        }
        return $this->pdo->query($sql)->fetchColumn();
    }

    function sum($col,...$arg){
        $sql = "SELECT SUM(`$col`) FROM `{$this->table}` ";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->array_to_sql($arg[0]);
                $sql .= " WHERE " . join(" AND ", $tmp);
            }
            else {
                $sql .= $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql .= $arg[1];
        }
        return $this->pdo->query($sql)->fetchColumn();
    }

    function max($col,...$arg){
        $sql = "SELECT MAX(`$col`) FROM `{$this->table}` ";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->array_to_sql($arg[0]);
                $sql .= " WHERE " . join(" AND ", $tmp);
            }
            else {
                $sql .= $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql .= $arg[1];
        }
        return $this->pdo->query($sql)->fetchColumn();
    }

}
$Bot= new DB("bot");
$Mem= new DB("mem");
$Admin= new DB("admin");
$Type= new DB("type");
$Item= new DB("item");
$Orders = new DB("orders");
?>