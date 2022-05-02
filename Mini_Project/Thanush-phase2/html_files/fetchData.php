<?php

include("database.php");
$db = $mysqli;
$tableName = "Blogs";
$columns=['id','ts','title','content'];
$fetchData = fetch_data($db,$tableName,$columns);

function fetch_data($db,$tablename,$columns)
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
        $query = "SELECT ".$columnName." FROM Blogs";
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


    $size = sizeof($msg);
    for($i=$size-1; $i>=0; $i--)
    {
        $new_array = $msg[$i];
    }



    function sortArray(&$arr, $start,  
                       $end) 
    { 
        while ($start < $end) 
        { 
            [$arr[$start],$arr[$end]] = [$arr[$end],$arr[$start]];

            $start++; 
            $end--; 
        }  
    } 
     
    //print_r($msg);
    //echo "after sorting";
    sortArray($msg,0,count($msg)-1);
    //print_r($msg);


    return $msg;
    
   
    

    
}
?>