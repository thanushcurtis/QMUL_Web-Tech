<html>
     <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <?php echo $deleteMsg??'';?>
                <div class="table=responsive">
                    <table class="table table-bordered">
                        <thead>
                            <th> Date & Time </th>
                            <th> Title </th>
                            <th> Blog </th>
                        </thead>
                        <tbody>
                            <?php
                            if(is_array($fetchData))
                            {
                                $sn=1;
                                foreach($fetchData as $data)
                                {
                            ?>
                            <tr>
                               
                                <td><?php echo $data['ts']??'';?></td>
                                <td><?php echo $data['title']??'';?></td>
                                <td><?php echo $data['content']??'';?></td>
                            </tr>
                            <?php 
                                $sn++;
                                }
                            }
                            else{ 
                            ?>
                            <tr>

                                <td colspan="3">
                                <?php echo $fetchData; ?>
                                </td>
                            </tr>
                            <?php
                            }?>
                        </tbody>
                    </table>   
                </div>    
            </div>    
        </div>
    </div>  
     
</html>