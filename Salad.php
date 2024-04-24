
!DOCTYPE html>
<html>
<head> 
    <title>Salads Menu: </title>
	<?php include ("connect.php"); ?>
    <script>

                function calculateTotal() {
        let total = 0;
        const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
        checkboxes.forEach(checkbox => {
            const quantity = parseInt(checkbox.dataset.quantity || 1); // Default quantity to 1 if not set
            total += parseInt(checkbox.value) * quantity;
        });
        alert('Total price: $' + total);
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
    
    <style>
		.title{
			font-family: Georgia;
			font-size:70px;
			color:cyan;
			background-color:green;
			font-wieght:bold;
			text-shadow: 2px 2px 5px red;
			
		}
		.font1{
			color:black;
			font-family: Georgia;
			font-wieght:bold;
			font-size:40px;
		
		}
			
		.image-container {
			  position: relative;
			  display: inline-block;
			}

		table {
            margin: 0 auto; /* Center the table */

        }

     td {
            padding: 50px; /* Add some padding for spacing, change to seperate more */
			font-family: Georgia;
			font-wieght:bold;
			font-size:35px;
        }
		</style>
	</head>

<body bgcolor="#03fcc6">

<font class="font1">
    <a href="Home.php" class="linktext">Back to Main Menu</a>
</font>

<h1 class="title" align="center"> 
    <br> The Salad Menu: <br><br> 
</h1>


	<?php
$count = 1;
$sql_product = "SELECT * FROM salad_tab";
$result_product = $connect->query($sql_product);
?>

<center>
    <table font-family: font1>
        <tr>
            <?php while ($row_product = $result_product->fetch_assoc()) { ?>
                <td>
                    <?php echo "<img src='" . $row_product["image"] . "' width='550' height='550' /><br>"; ?>
                    <div>
                        <?php echo $row_product["name"]; ?>
						<?php echo $row_product["price"]; ?>
                        <input type='checkbox' name='pizza<?php echo $count; ?>' id='pizza<?php echo $count; ?>' value='<?php echo $row_product["dollar"]; ?>' onclick="toggleOptions('pizza<?php echo $count; ?>')" />
                        <button class='ButtonN' onclick="updateQuantity('pizza<?php echo $count; ?>', 'add')">`+`</button>
                        <button class='ButtonN' onclick="updateQuantity('pizza<?php echo $count; ?>', 'subtract')">`-`</button>
                        <span id='pizza<?php echo $count; ?>-quantity'>0</span><br>
                        
                    </div>
                </td>
                <?php
                if ($count >= 2) {
                    echo "</tr><br><tr>";
                    $count = 1;
                } else {
                    $count++;
                }
            }
            ?>
        </tr>
    </table>
</center>





<button onclick="calculateTotal()">Calculate Total Price</button> <!--need to send to cart-->

</body>
</html>

<!-- Caesar Salad, Chicken Salad, Potato Salad, Waldorf Salad, Bound Salad  
			background-image: url('salad_background.jpg');
			background-size: cover; 
			background-repeat: no-repeat; 


-->
