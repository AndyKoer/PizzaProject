<!DOCTYPE html>

<html>
	<head>
	
	<title>Main Menu </title>
	
	<?php 
	include ("connect.php");
	session_start();
	?>
	
	<style>
	
	.title{
		font-family: Georgia;
		font-size:70px;
		color:black;
		background-color:EECB1F;
		font-wieght:bold;
		text-shadow: 2px 2px 5px orange;
		
			
		}
	
	.text1
	{ 
		font-family: Georgia;
		font-size:50px;
		color:black;
		background-color:EECB1F;
		font-wieght:bold;
		text-shadow: 2px 2px 5px orange;
	
	
	
	
	}
	.text2
	{ 
		font-family: Georgia;
		font-size:25px;
		color:black;
		background-color:EECB1F;
		font-wieght:bold;
		text-shadow: 2px 2px 5px orange;
	
	
	
	
	}
	
	
	
	
	button 
	{
			width: 20%;
			padding: 20px 100px;
			color: yellow;font-size: 24px;
			font-weight: bold;
			border: none;
			border-radius: 50px;
			background-color:red;
			}
	button:hover {
			background-color: white;
		}
	.ButtonN {
			border-radius: initial;
			width: initial;
			padding: initial;
			background-color: #C5CDCC;
			color: initial;
			border: initial;
			padding: initial;
			font-size: initial;
			cursor: initial;
			text-decoration: initial;
			display: inline-block;
		}
	.button1 {
			background-color: #21AB36;
			color:black;
		}

	.button2 {
			background-color: #b02525;
		} 
	.button3{
			background-color: #B03F3E;
			color:black;
		}
	.button4{
			background-color: grey;
			color:black;
		}
	table {
            margin: 0 auto; /* Center the table */

        }

     td {
            padding: 50px; /* Add some padding for spacing, change to seperate more */
        }
		
	p{
		text-align: center;
	
	}

        
	</style>
	
	<script>
    function calculateTotal() {
		let total = 0;
		const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
		checkboxes.forEach(checkbox => {
			const quantity = parseInt(checkbox.dataset.quantity || 1); // Default quantity to 1 if not set
			total += parseInt(checkbox.value) * quantity;
		});
		alert('Total price: $' + total);

		// Send the total to the server using AJAX
		const xhr = new XMLHttpRequest();
		xhr.open('POST', 'update_total.php', true);
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xhr.onload = function() {
			if (xhr.status === 200) {
				console.log('Total updated successfully');
			} else {
				console.error('Error updating total');
			}
		};
		xhr.send('total=' + total);
	}

    function toggleOptions(checkboxId) {
        var checkbox = document.getElementById(checkboxId);
        var options = document.getElementById(checkboxId + "_options");

        if (checkbox.checked) {
            options.style.display = "block";
        } else {
            options.style.display = "none";
            // Uncheck size checkboxes when pizza# is unchecked
            var sizeCheckboxes = options.querySelectorAll('input[type="checkbox"]');
            sizeCheckboxes.forEach(sizeCheckbox => {
                sizeCheckbox.checked = false;
            });
        }
    }

    function updateQuantity(checkboxId, action) {
        const checkbox = document.getElementById(checkboxId);
        let quantity = parseInt(checkbox.dataset.quantity || 1); // Default quantity to 1 if not set
        if (action === 'add') {
            quantity++;
        } else if (action === 'subtract' && quantity > 1) {
            quantity--;
        }
        checkbox.dataset.quantity = quantity;
        document.getElementById(checkboxId + '-quantity').textContent = quantity;
    }
	</script>
	
	
	</head>
	
	<body bgcolor="EECB1F" >
	
	<center>
	<div id="title" class="title">
	<img src="PizzaLogo.jpg" width="400" height="400">
	<h2> <img src="Title1.jpg" width="300" height="200"> Freddy's Pizzeria <img src="Title2.jpg" width="300" height="200"></h2>
	</div>
	<div class="text1"
	<p> The home of the famous Freddy Statue. </P>
	</div>
	
	
	<button class="button1" onclick="location.href='salad.php'"> Salad Menu </button>
	<button class="button2" onclick="location.href='pasta.php'"> Pasta Menu </button>
	<br><br>
	<div class="text2"
	<p> These will go the Salad and Pasta menu, but our selection of pizza is right below. </P>
	</div>
	
	
	<div class="text1"
	<p> <br><br>Our selection of personal <b>Pizza:</b> <br>Small-Given, Medium+$2, Large+$5</P>
	</div>
	
	
	
	</center>
	
	
	<?php
	$count = 1;
	$sql_product = "SELECT * FROM pizza_tab";
	$result_product = $connect->query($sql_product);
	?>

<center>
    <table>
        <tr>
            <?php while ($row_product = $result_product->fetch_assoc()) { ?>
                <td>
                    <?php echo "<img src='" . $row_product["image"] . "' width='250' height='250' /><br>"; ?>
                    <div>
                        <?php echo $row_product["name"]; ?>
                        <?php echo $row_product["price"]; ?>
                        <input type='checkbox' name='pizza<?php echo $count; ?>' id='pizza<?php echo $count; ?>' value='<?php echo $row_product["dollar"]; ?>' onclick="toggleOptions('pizza<?php echo $count; ?>')" />
                        <button class='ButtonN' onclick="updateQuantity('pizza<?php echo $count; ?>', 'add')">`+`</button>
                        <button class='ButtonN' onclick="updateQuantity('pizza<?php echo $count; ?>', 'subtract')">`-`</button>
                        <span id='pizza<?php echo $count; ?>-quantity'>0</span><br>
                        <div id='pizza<?php echo $count; ?>_options' style='display: none;'>
                            <label><input type='checkbox' name='size_small' value='0' onclick="updateQuantity('pizza<?php echo $count; ?>', 1)"> Small</label>
                            <label><input type='checkbox' name='size_medium' value='2' onclick="updateQuantity('pizza<?php echo $count; ?>', 1)"> Medium</label>
                            <label><input type='checkbox' name='size_large' value='5' onclick="updateQuantity('pizza<?php echo $count; ?>', 1)"> Large</label>
                        </div>
                    </div>
                </td>
                <?php
                if ($count >= 3) {
                    echo "</tr><tr>";
                    $count = 1;
                } else {
                    $count++;
                }
            }
            ?>
        </tr>
    </table>
</center>

	</center>
		<div class= "text1">
		<p> <br><br> <b> Freddy's Desserts! </b> </P>
		</div>
	
	<?php
	$count = 1;
	$sql_product = "SELECT * FROM dessert_tab";
	$result_product = $connect->query($sql_product);
	?>

<center>
    <table>
        <tr>
            <?php while ($row_product = $result_product->fetch_assoc()) { ?>
                <td>
                    <?php echo "<img src='" . $row_product["image"] . "' width='250' height='250' /><br>"; ?>
                    <div>
                        <?php echo $row_product["name"]; ?>
                        <?php echo $row_product["price"]; ?>
                        <input type='checkbox' name='pizza<?php echo $count; ?>' id='pizza<?php echo $count; ?>' value='<?php echo $row_product["dollar"]; ?>' onclick="toggleOptions('pizza<?php echo $count; ?>')" />
                        <button class='ButtonN' onclick="updateQuantity('pizza<?php echo $count; ?>', 'add')">`+`</button>
                        <button class='ButtonN' onclick="updateQuantity('pizza<?php echo $count; ?>', 'subtract')">`-`</button>
                        <span id='pizza<?php echo $count; ?>-quantity'>0</span><br>
                        <div id='pizza<?php echo $count; ?>_options' style='display: none;'>
                            <label><input type='checkbox' name='size_small' value='0' onclick="updateQuantity('pizza<?php echo $count; ?>', 1)"> Small</label>
                            <label><input type='checkbox' name='size_medium' value='2' onclick="updateQuantity('pizza<?php echo $count; ?>', 1)"> Medium</label>
                            <label><input type='checkbox' name='size_large' value='5' onclick="updateQuantity('pizza<?php echo $count; ?>', 1)"> Large</label>
                        </div>
                    </div>
                </td>
                <?php
                if ($count >= 3) {
                    echo "</tr><tr>";
                    $count = 1;
                } else {
                    $count++;
                }
            }
            ?>
        </tr>
    </table>
</center>
	

		
	
	<div class= "text1">
	<p> <br> Freddy's Soothing Drinks! ($5 Each)</P>
	</div>
	
	<?php
	$count = 1;
	$sql_product = "SELECT * FROM drinks_tab";
	$result_product = $connect->query($sql_product);
	?>

<center>
    <table>
        <tr>
            <?php while ($row_product = $result_product->fetch_assoc()) { ?>
                <td>
                    <?php echo "<img src='" . $row_product["image"] . "' width='150' height='150' /><br>"; ?>
                    <div>
                        <?php echo $row_product["name"]; ?>
                        <input type='checkbox' name='pizza<?php echo $count; ?>' id='pizza<?php echo $count; ?>' value='<?php echo $row_product["dollar"]; ?>' onclick="toggleOptions('pizza<?php echo $count; ?>')" />
                        <button class='ButtonN' onclick="updateQuantity('pizza<?php echo $count; ?>', 'add')">`+`</button>
                        <button class='ButtonN' onclick="updateQuantity('pizza<?php echo $count; ?>', 'subtract')">`-`</button>
                        <span id='pizza<?php echo $count; ?>-quantity'>0</span><br>
                        
                    </div>
                </td>
                <?php
                if ($count >= 5) {
                    echo "</tr><tr>";
                    $count = 1;
                } else {
                    $count++;
                }
            }
            ?>
        </tr>
    </table>
</center>
	
	
	<center>
	
		<button onclick="calculateTotal()">Add to Cart</button>
	
	
	<center>
	<div class="text1"
	<p> <br><br> You can also make your own pizza! </P>
	</div>
	
	<button class="button3" onclick="location.href='MakeOwn.php'"> Make Your Own Pizza </button> <!--Finish-->
	
	<div class="text1"
	<p> <br><br> When you have finished, you can check out here! </P>
	</div>
	
	<button class="button4" onclick="location.href='checkout.php'"> Checkout </button> <!--Finish-->
	</center>
	
	<br>
	<br>
	</body>



</html>
