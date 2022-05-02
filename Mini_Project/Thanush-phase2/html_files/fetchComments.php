<?php


include("database.php");
$db = $mysqli;
$tableName = "Comments";
$columns = ['id','comments','blogid'];
$fetchComments = fetch_Comment($db,$tableName,$columns);


function fetch_Comment($db,$tablename,$columns)
{
    if(empty($db))
    {
        $msg=" Database Connection Error";
       
    }
    else if(empty($columns) || !is_array($columns))
    {
        $msg = "Columns name msut be defined correctly";
       
    }
    else if(empty($tablename))
    {
        $msg = "Table name is empty";
        
    }
    else
    {
        $columnName = implode(", ",$columns);
        $query = "SELECT ".$columnName." FROM Comments";
        $result = $db->query($query);
    }


    if($result ==true)
    {
        if($result->num_rows>0)
        {
            $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $msg = $row;
        }
        else{
            $msg = "No Data Found";
        }

    }
    else
    {
        $msg = mysqli_error($db);
    }
    return $msg;
}


?>