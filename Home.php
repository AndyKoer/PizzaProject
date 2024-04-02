<!DOCTYPE html>

<html>
	<head>
	
	<title> Main Menu </title>
	
	
	
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
	
	
	<button class="button1" onclick="location.href='Salad.php'"> Salad Menu </button>
	<button class="button2" onclick="location.href='Pasta.php'"> Pasta Menu </button>
	<br><br>
	<div class="text2"
	<p> These will go the Salad and Pasta menu, but our selection of pizza is right below. </P>
	</div>
	
	
	<div class="text1"
	<p> <br><br>Our selection of personal <b>Pizza:</b> <br>Small-Given, Medium+$2, Large+$5</P>
	</div>
	
	
	
	</center>
	
	<!--get pizzas, maybe lab3 to tell about pizza-->
	 <center>
        <table>
			<tr>
            <td>
                <img src="pepperoni.jpg" width="250" height="250"> <br>
				
                <p> Pepperoni Pizza($8) 
                <input type="checkbox" name="pizza1" id="pizza1" value="8" onclick="toggleOptions('pizza1') " /> 
				<button class="ButtonN" onclick="updateQuantity('pizza1', 'add')">`+`</button> 
				<button class="ButtonN"onclick="updateQuantity('pizza1', 'subtract')">`-`</button>
				<span id="pizza1-quantity">0</span> </p>
				
            <div id="pizza1_options" style="display: none;">
                    <label><input type="checkbox" name="size_small" value="0" onclick="updateQuantity('pizza1', 1)"> Small</label>
                    <label><input type="checkbox" name="size_medium" value="2" onclick="updateQuantity('pizza1', 1)"> Medium</label>
                    <label><input type="checkbox" name="size_large" value="5" onclick="updateQuantity('pizza1', 1)"> Large</label>
             </div>
            </td>
			
			
			
            <td>
                <img src="cheese.jpg" width="250" height="250">
                <p> Cheese Pizza($6) 
                <input type="checkbox" name="pizza2" id="pizza2" value="6" onclick="toggleOptions('pizza2')" /> 
				<button class="ButtonN" onclick="updateQuantity('pizza2', 'add')">`+`</button> 
				<button class="ButtonN"onclick="updateQuantity('pizza2', 'subtract')">`-`</button>
				<span id="pizza2-quantity">0</span> </p>
				
                <div id="pizza2_options" style="display: none;">
                    <label><input type="checkbox" name="size_small" value="0" onclick="updateQuantity('pizza2', 1)"> Small</label>
                    <label><input type="checkbox" name="size_medium" value="2" onclick="updateQuantity('pizza2', 1)"> Medium</label>
                    <label><input type="checkbox" name="size_large" value="5" onclick="updateQuantity('pizza2', 1)"> Large</label>
                </div>
            </td>
            <td>
                <img src="sausage.jpg" width="250" height="250">
                <p> Sausage Pizza($8) 
                <input type="checkbox" name="pizza3" id="pizza3" value="8" onclick="toggleOptions('pizza3')" /> 
				<button class="ButtonN" onclick="updateQuantity('pizza3', 'add')">`+`</button> 
				<button class="ButtonN"onclick="updateQuantity('pizza3', 'subtract')">`-`</button>
				<span id="pizza3-quantity">0</span> </p>
				
                <div id="pizza3_options" style="display: none;">
                    <label><input type="checkbox" name="size_small" value="0" onclick="updateQuantity('pizza3', 1)"> Small</label>
                    <label><input type="checkbox" name="size_medium" value="2" onclick="updateQuantity('pizza3', 1)"> Medium</label>
                    <label><input type="checkbox" name="size_large" value="5" onclick="updateQuantity('pizza3', 1)"> Large</label>
                </div>
            </td>
			</tr>
			
			
			
			
			
            <tr>
                <td>
					<img src="HAWAIIAN.jpg" width="250" height="250"> <br>
					
					<p> Hawaiian Pizza($12) 
					<input type="checkbox" name="pizza4" id="pizza4" value="12" onclick="toggleOptions('pizza4') " /> 
					<button class="ButtonN" onclick="updateQuantity('pizza4', 'add')">`+`</button> 
					<button class="ButtonN"onclick="updateQuantity('pizza4', 'subtract')">`-`</button>
					<span id="pizza4-quantity">0</span> </p>
					
				<div id="pizza4_options" style="display: none;">
						<label><input type="checkbox" name="size_small" value="0" onclick="updateQuantity('pizza4', 1)"> Small</label>
						<label><input type="checkbox" name="size_medium" value="2" onclick="updateQuantity('pizza4', 1)"> Medium</label>
						<label><input type="checkbox" name="size_large" value="5" onclick="updateQuantity('pizza4', 1)"> Large</label>
				 </div>
				</td>
                <td>
					<img src="Buffalo.jpg" width="250" height="250"> <br>
					
					<p> Buffalo Pizza($11) 
					<input type="checkbox" name="pizza5" id="pizza5" value="11" onclick="toggleOptions('pizza5') " /> 
					<button class="ButtonN" onclick="updateQuantity('pizza5', 'add')">`+`</button> 
					<button class="ButtonN"onclick="updateQuantity('pizza5', 'subtract')">`-`</button>
					<span id="pizza5-quantity">0</span> </p>
					
				<div id="pizza5_options" style="display: none;">
						<label><input type="checkbox" name="size_small" value="0" onclick="updateQuantity('pizza5', 1)"> Small</label>
						<label><input type="checkbox" name="size_medium" value="2" onclick="updateQuantity('pizza5', 1)"> Medium</label>
						<label><input type="checkbox" name="size_large" value="5" onclick="updateQuantity('pizza5', 1)"> Large</label>
				 </div>
				</td>
                <td>
					<img src="mushroom.jpg" width="250" height="250"> <br>
					
					<p> Mushroom Pizza($8) 
					<input type="checkbox" name="pizza6" id="pizza6" value="8" onclick="toggleOptions('pizza6') " /> 
					<button class="ButtonN" onclick="updateQuantity('pizza6', 'add')">`+`</button> 
					<button class="ButtonN"onclick="updateQuantity('pizza6', 'subtract')">`-`</button>
					<span id="pizza6-quantity">0</span> </p>
					
				<div id="pizza6_options" style="display: none;">
						<label><input type="checkbox" name="size_small" value="0" onclick="updateQuantity('pizza6', 1)"> Small</label>
						<label><input type="checkbox" name="size_medium" value="2" onclick="updateQuantity('pizza6', 1)"> Medium</label>
						<label><input type="checkbox" name="size_large" value="5" onclick="updateQuantity('pizza6', 1)"> Large</label>
				 </div>
				</td>
            </tr>
			
			
			
            <tr>
                <td>
					<img src="bacon.jpg" width="250" height="250"> <br>
					
					<p> Bacon Pizza($10) 
					<input type="checkbox" name="pizza7" id="pizza7" value="10" onclick="toggleOptions('pizza7') " /> 
					<button class="ButtonN" onclick="updateQuantity('pizza7', 'add')">`+`</button> 
					<button class="ButtonN"onclick="updateQuantity('pizza7', 'subtract')">`-`</button>
					<span id="pizza7-quantity">0</span> </p>
					
				<div id="pizza7_options" style="display: none;">
						<label><input type="checkbox" name="size_small" value="0" onclick="updateQuantity('pizza7', 1)"> Small</label>
						<label><input type="checkbox" name="size_medium" value="2" onclick="updateQuantity('pizza7', 1)"> Medium</label>
						<label><input type="checkbox" name="size_large" value="5" onclick="updateQuantity('pizza7', 1)"> Large</label>
				 </div>
				</td>
                <td>
					<img src="onion.jpg" width="250" height="250"> <br>
					
					<p> Onion Pizza($8) 
					<input type="checkbox" name="pizza8" id="pizza8" value="8" onclick="toggleOptions('pizza8') " /> 
					<button class="ButtonN" onclick="updateQuantity('pizza6', 'add')">`+`</button> 
					<button class="ButtonN"onclick="updateQuantity('pizza6', 'subtract')">`-`</button>
					<span id="pizza8-quantity">0</span> </p>
					
				<div id="pizza8_options" style="display: none;">
						<label><input type="checkbox" name="size_small" value="0" onclick="updateQuantity('pizza8', 1)"> Small</label>
						<label><input type="checkbox" name="size_medium" value="2" onclick="updateQuantity('pizza8', 1)"> Medium</label>
						<label><input type="checkbox" name="size_large" value="5" onclick="updateQuantity('pizza8', 1)"> Large</label>
				 </div>
				</td>
                <td>
					<img src="anchovies.jpg" width="250" height="250"> <br>
					
					<p> Anchovies Pizza($10) 
					<input type="checkbox" name="pizza9" id="pizza9" value="10" onclick="toggleOptions('pizza9') " /> 
					<button class="ButtonN" onclick="updateQuantity('pizza9', 'add')">`+`</button> 
					<button class="ButtonN"onclick="updateQuantity('pizza9', 'subtract')">`-`</button>
					<span id="pizza9-quantity">0</span> </p>
					
				<div id="pizza9_options" style="display: none;">
						<label><input type="checkbox" name="size_small" value="0" onclick="updateQuantity('pizza9', 1)"> Small</label>
						<label><input type="checkbox" name="size_medium" value="2" onclick="updateQuantity('pizza9', 1)"> Medium</label>
						<label><input type="checkbox" name="size_large" value="5" onclick="updateQuantity('pizza9', 1)"> Large</label>
				 </div>
				</td>
            </tr>
			
			
			
			<tr>
                <td>
					<img src="Chicken.jpg" width="250" height="250"> <br>
					
					<p> Chicken Pizza($10) 
					<input type="checkbox" name="pizza10" id="pizza10" value="10" onclick="toggleOptions('pizza10') " /> 
					<button class="ButtonN" onclick="updateQuantity('pizza10', 'add')">`+`</button> 
					<button class="ButtonN"onclick="updateQuantity('pizza10', 'subtract')">`-`</button>
					<span id="pizza10-quantity">0</span> </p>
					
				<div id="pizza10_options" style="display: none;">
						<label><input type="checkbox" name="size_small" value="0" onclick="updateQuantity('pizza10', 1)"> Small</label>
						<label><input type="checkbox" name="size_medium" value="2" onclick="updateQuantity('pizza10', 1)"> Medium</label>
						<label><input type="checkbox" name="size_large" value="5" onclick="updateQuantity('pizza10', 1)"> Large</label>
				 </div>
				</td>
                <td>
					<img src="jalapeno.jpg" width="250" height="250"> <br>
					
					<p> Jalapeno Pizza($12) 
					<input type="checkbox" name="pizza11" id="pizza11" value="12" onclick="toggleOptions('pizza11') " /> 
					<button class="ButtonN" onclick="updateQuantity('pizza11', 'add')">`+`</button> 
					<button class="ButtonN"onclick="updateQuantity('pizza11', 'subtract')">`-`</button>
					<span id="pizza11-quantity">0</span> </p>
					
				<div id="pizza9_options" style="display: none;">
						<label><input type="checkbox" name="size_small" value="0" onclick="updateQuantity('pizza11', 1)"> Small</label>
						<label><input type="checkbox" name="size_medium" value="2" onclick="updateQuantity('pizza11', 1)"> Medium</label>
						<label><input type="checkbox" name="size_large" value="5" onclick="updateQuantity('pizza11', 1)"> Large</label>
				 </div>
				</td>
                <td>
					<img src="pineapple.jpg" width="250" height="250"> <br>
					
					<p> Pineapple Pizza($10) 
					<input type="checkbox" name="pizza12" id="pizza12" value="10" onclick="toggleOptions('pizza12') " /> 
					<button class="ButtonN" onclick="updateQuantity('pizza12', 'add')">`+`</button> 
					<button class="ButtonN"onclick="updateQuantity('pizza12', 'subtract')">`-`</button>
					<span id="pizza12-quantity">0</span> </p>
					
				<div id="pizza9_options" style="display: none;">
						<label><input type="checkbox" name="size_small" value="0" onclick="updateQuantity('pizza12', 1)"> Small</label>
						<label><input type="checkbox" name="size_medium" value="2" onclick="updateQuantity('pizza12', 1)"> Medium</label>
						<label><input type="checkbox" name="size_large" value="5" onclick="updateQuantity('pizza12', 1)"> Large</label>
				 </div>
				</td>
            </tr>
        </table>
		<button onclick="calculateTotal()">Calculate Total</button>
    </center>
		<div class= "text1">
		<p> <br><br> <b> Freddy's Desserts! </b> </P>
		</div>
		<table>
			<tr>
				<td><img src="giant-cookie.jpg" width="250" height="250"> <br>
						<p> Mighty Freddy Cookie ($8)
						<input type="checkbox" name="pizza100" id="pizza100" value="8"  /> 
						<button class="ButtonN" onclick="updateQuantity('pizza100', 'add')">`+`</button> 
						<button class="ButtonN"onclick="updateQuantity('pizza100', 'subtract')">`-`</button>
						<span id="pizza100-quantity">0</span> </p>
						</p></td>
				<td><img src="cake.jpg" width="250" height="250"> <br>
						<p> Freddy Gooey Cakey ($14) 
						<input type="checkbox" name="pizza99" id="pizza99" value="14"  />
						<button class="ButtonN" onclick="updateQuantity('pizza99', 'add')">`+`</button> 
						<button class="ButtonN"onclick="updateQuantity('pizza99', 'subtract')">`-`</button>
						<span id="pizza99-quantity">0</span> </p>
			</tr>
	
	
	</table>
	
	<div class= "text1">
	<p> <br> Freddy's Soothing Drinks! ($3 Each)</P>
	</div>
	<table>
		<tr>
			<td><img src="drinkPepper.jpg" width="150" height="150"></a> <br>
                <p> Dr. Pepper
                    <input type="checkbox" name="pizza101" id="pizza101" value="3" />
                    <button class="ButtonN" onclick="updateQuantity('pizza101', 'add')">`+`</button> 
					<button class="ButtonN"onclick="updateQuantity('pizza101', 'subtract')">`-`</button>
					<span id="pizza101-quantity">0</span> </p>
                </p>
            </td>
            <td><img src="drinkPepper.jpg" width="150" height="150"> <br>
                    <p> Dr. Pepper
                    <input type="checkbox" name="pizza102" id="pizza102" value="3"  /> 
					<button class="ButtonN" onclick="updateQuantity('pizza102', 'add')">`+`</button> 
					<button class="ButtonN"onclick="updateQuantity('pizza102', 'subtract')">`-`</button>
					<span id="pizza102-quantity">0</span> </p>
					</p></td>
            <td><img src="drinkPepsi.jpg" width="150" height="150"> <br>
                    <p> Pepsi 
                    <input type="checkbox" name="pizza103" id="pizza103" value="3"  /> 
					<button class="ButtonN" onclick="updateQuantity('pizza103', 'add')">`+`</button> 
					<button class="ButtonN"onclick="updateQuantity('pizza103', 'subtract')">`-`</button>
					<span id="pizza103-quantity">0</span> </p>
					</p></td>
			<td><img src="drinkMUG.jpg" width="150" height="150"> <br>
                    <p> MUG 
                    <input type="checkbox" name="pizza104" id="pizza104" value="3" /> 
					<button class="ButtonN" onclick="updateQuantity('pizza104', 'add')">`+`</button> 
					<button class="ButtonN"onclick="updateQuantity('pizza104', 'subtract')">`-`</button>
					<span id="pizza104-quantity">0</span> </p>
					</p></td>
			<td><img src="drinkSprite.jpg" width="150" height="150"> <br>
                    <p> Sprite 
                    <input type="checkbox" name="pizza105" id="pizza105" value="3"  />
					<button class="ButtonN" onclick="updateQuantity('pizza105', 'add')">`+`</button> 
					<button class="ButtonN"onclick="updateQuantity('pizza105', 'subtract')">`-`</button>
					<span id="pizza105-quantity">0</span> </p>
					</p></td>
			<td><img src="drinkDew.jpg" width="150" height="150"> <br>
                    <p> Mtn. Dew
                    <input type="checkbox" name="pizza106" id="pizza106" value="3"  /> 
					<button class="ButtonN" onclick="updateQuantity('pizza106', 'add')">`+`</button> 
					<button class="ButtonN"onclick="updateQuantity('pizza106', 'subtract')">`-`</button>
					<span id="pizza106-quantity">0</span> </p>
					</p></td>
        </tr>
	
	
	</table>
	
	<center>
	<div class="text1"
	<p> <br><br> You can also make you own pizza! </P>
	</div>
	
	<button class="button3" onclick="location.href='MakeOwn.php'"> Make Your Own Pizza </button> <!--Finish-->
	
	<div class="text1"
	<p> <br><br> When you have finished, you can check out here! </P>
	</div>
	
	<button class="button4" onclick="location.href='LoginSignup.php'"> Checkout </button> <!--Finish-->
	</center>
	
	<br>
	<br>
	</body>



</html>
