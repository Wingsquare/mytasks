<?php
    require_once('db.php');
    require_once('commons.php');
?>

<html>
    <body>

        <h3>
            <a href="index.php">Home</a>
            <a href="category-add.php">New Category</a>
        </h3>



        <?php
            // Create Category
            if(!empty($_POST['category_code']) && !empty($_POST['category_name'])){                
                createCategory();
            }                

            // Category List
            showCategories();


        ?>
    </body>
</html>

<?php
    function createCategory(){

        
                $category_code = $_POST['category_code'];
                $category_name = $_POST['category_name'];                
                $category_remarks = $_POST['category_remarks'];                
                
                $qry = "insert into categories(category_code, category_name, category_remarks) " .
                            "values(?,?,?)";
                $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

                if(!$mysqli->connect_error){                    
                    if($stmt = $mysqli->prepare($qry)){
                        if($stmt->bind_param("sss", $category_code, $category_name, $category_remarks )){
                            if($stmt->execute()){
                                echo "<h5>Category is successfully added</h5>";
                                echo "<br />";
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

    }

    function showCategories(){

        $qry =  " SELECT id, category_code, category_name, category_remarks " .
                " FROM categories ";
                
        
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if(!$mysqli->connect_error){
            if($stmt = $mysqli->prepare($qry)){
                if($stmt->bind_result($id, $category_code, $category_name, $category_remarks)){
                    echo "<table>";
                    echo "<tr><td>No</td><td>Category Code</td><td>Category Name</td><td>Remarks</td></tr>";
                    if($stmt->execute()){
                        $slno = 0;
                        while($stmt->fetch()){
                            $slno++;
                            echo "<tr>";
                            echo    "<td>$slno</td>" .
                                    "<td>$category_code</td>" .
                                    "<td>$category_name</td>" .
                                    "<td>$category_remarks</td>";
                            echo "</tr>";
                        }
                        
                    }else{
                        echo "Error in executing qry";
                    }
                    echo "</table>";
                }else{
                    echo " Error in binding results :" . $stmt->error;
                }
            }else{
                echo " Error in preparing statement ";
            }



        }else{
            echo " Database connection error " . $mysqli->error;
        }

    }