<?php

//connect to database      host      username:    pass:        database:  
$conn = mysqli_connect( 'localhost', 'saalu', '123allahu', 'great_pizza');

// check connection
if(!$conn){
    echo 'Connection error' . mysqli_connect_error();
}

// write query for all pizzas fom table(pizzas)
$sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at ';

//make query & get result
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free results from memory
mysqli_free_result($result);

// close connection
mysqli_close($conn);
//print_r($pizzas);


// splitting ingredients array
$lists =explode(',', $pizzas[0]['ingredients']);


?>


<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php');  ?>

<h4 class="center grey-text"> Pizzas!</h4>

    <div class="container">
        <div class='row'>
        <?php foreach ($pizzas as $pizza) { ?>

            <div class='col s6 md3'>
                <div class='card z-depth-0'>
                    <div class='card-content center'>
                      <h6> <?php echo htmlspecialchars($pizza['title']); ?>  </h6>
                      <?php foreach ($lists as $list) {?>
                       <li>  <?php echo htmlspecialchars($list)  ?>    </li> 
                     <?php } ?> 
                    </div>

                    <div class= 'card-action right-align'>
                        <a class='brand-text' href='#'> more info</a>
                    </div>
                </div>
         
            </div>

        <?php  } ?>
        </div>
    </div>

<?php include('templates/footer.php');  ?>

</html>