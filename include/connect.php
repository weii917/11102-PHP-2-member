<?php
date_default_timezone_set("Asia/Taipei");
$dsn = "mysql:host=localhost;charset=utf8;dbname=member";
$pdo = new PDO($dsn,'root','');
session_start();

// all function
function all($table = null, $where = '')
{
    global $pdo;
    $sql = "select * from `$table`";
    //如果有table且不是空的
    if (isset($table) && !empty($table)) {

        if (is_array($where)) {
            //檢查不是空陣列，foreach取出欄位=value的寫法放在$tmp，方便取用
            if (!empty($where)) {
                foreach ($where as $col => $value) {
                    $tmp[] = "`$col`='$value'";
                }
                $sql .= " where " . join(" && ", $tmp);
            }
        } else {

            $sql .= " $where";
        }
        echo 'all=> ' . $sql;

        $rows = $pdo->query($sql)->fetchAll();
        return $rows;
    } else {
        echo "錯誤:沒有指定的資料表名稱";
    }
}

// find function
function find($table, $id)
{
    global $pdo;
    $sql = "select * from `$table`";

    if (is_array($id)) {
        foreach ($id as $col => $value) {
            $tmp[] = "`$col`='$value'";
        }
        $sql .= " where " . join(" && ", $tmp);
    } else if (is_numeric($id)) {
        $sql .= " where `id`='$id'";
    } else {
        echo "錯誤:參數的資料必須是數字或陣列";
    }
    echo 'find=> ' . $sql;
    //取一筆用fetch，PDO::FETCH_ASSOC只顯示欄位，預設BOTH都顯示，NUM顯示索引
    $row = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    return $row;
}


// update function

function update($table,$cols,$id){
    global $pdo;
    $sql = "update `$table` set ";
    //如果不是空的就依序將陣列的資料換成sql語法，存入$tmp陣列
    if(!empty($cols)){
        foreach ($cols as $col => $value) {
            $tmp[] = "`$col`='$value'";
        }
    }else{
        "錯誤:缺少要編輯的欄位名稱";
    }
    //讓陣列以 , 分隔，組成一條字串
    $sql .=join(",",$tmp);
    //因前面有$tmp存資料，所以這裡要宣告空陣列清空，
    //下面才不會取用到前面欄位用來暫存欄位資料的陣列
    $tmp = [];

    if (is_array($id)) {
        foreach ($id as $col => $value) {
            $tmp[] = "`$col`='$value'";
        }
        $sql .= " where " . join(" && ", $tmp);
    } else if (is_numeric($id)) {
        $sql .= " where `id`='$id'";
    } else {
        echo "錯誤:參數的資料必須是數字或陣列";
    }
    echo 'update=> ' . $sql;
    return $pdo->exec($sql);

}

// insert
// cols用array_keys取keys存成一個新陣列，從這個新陣列串成sql語法
// vals用本來就是顯示value所以直接$values就能取value，從這個新陣列串成sql語法
function insert($table,$values){
    global $pdo;

    $sql="insert into `$table`";
    $cols="(`".join("`,`",array_keys($values))."`)";
    $vals="('".join("','",$values)."')";
    
    $sql =$sql . $cols . " values ".$vals;

    echo 'insert=> ' . $sql;  

    return $pdo->exec($sql);
}


// delete
// 跟find差不多用法
function del($table,$id){
    global $pdo;
    $sql = "delete from `$table` where";

    if (is_array($id)) {
        foreach ($id as $col => $value) {
            $tmp[] = "`$col`='$value'";
        }
        $sql .= join(" && ", $tmp);
    } else if (is_numeric($id)) {
        $sql .= " `id`='$id'";
    } else {
        echo "錯誤:參數的資料必須是數字或陣列";
    }
    echo 'del=> ' . $sql;
     
    return $pdo->exec($sql);

}







//陣列排列
function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}









?>