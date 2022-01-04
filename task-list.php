<?php
    require_once('db.php');
    require_once('commons.php');
?>

<html>
    <body>
        <?php
            if(!empty($_POST['task_name']) && !empty($_POST['task_start_time'])){
                $task_name = $_POST['task_name'];
                $task_start_time = $_POST['task_start_time'];
                $task_remarks = $_POST['task_remarks'];
                $task_current_time_utc = time(); //new \DateTime("now", new \DateTimeZone("UTC"));

                $task_start_time_utc = getUtcTimeStamp($task_start_time);

                if($task_start_time_utc > 0){

                    $qry = "insert into tasks(task_name, task_start_time, task_remarks, task_create_time) " .
                            "values(?,?,?,?)";
                    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

                    if(!$mysqli->connect_error){
                        if($stmt = $mysqli->prepare($qry)){
                            if($stmt->bind_param("ssss", $task_name, $task_start_time_utc, $task_remarks, $task_current_time_utc)){
                                if($stmt->execute()){
                                    echo "Task is successfully added";
                                }else{
                                    echo "Query Execute Error : " . $stmt->error;
                                }
                            }else{
                                echo "Bind Error ";
                            }
                            $stmt->close();
                            $mysqli->close();
                        }else{
                            echo "Statement Prepared Error : " . $mysqli->error;  
                            $mysqli->close();                          
                        }
                    }else{
                        echo "Connection Error : " . $mysqli->connect_error;
                    }               
                }else{
                    echo "Incorrect Start Time format : YYYY-mm-dd HH:mm:ss";
                }
                

            }else{
                echo "Task is empty";
            }

        ?>
    </body>
</html>