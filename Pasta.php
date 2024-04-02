<!DOCTYPE html>
<html>
<head> 
    <title>Pasta Menu</title>
    <script>
        function increaseQuantity(elementId) {
            let inputElement = document.getElementById(elementId);
            inputElement.value = parseInt(inputElement.value) + 1;
        }

        function decreaseQuantity(elementId) {
            let inputElement = document.getElementById(elementId);
            if (parseInt(inputElement.value) > 1) {
                inputElement.value = parseInt(inputElement.value) - 1;
            }
        }

        function calculateTotal() {
            let total = 0;
            const pastaInputs = document.querySelectorAll('input[type="number"]');
            pastaInputs.forEach(input => {
                const quantity = parseInt(input.value);
                const checkbox = document.getElementById(input.getAttribute('data-checkbox'));
                if (checkbox.checked) {
                    total += parseInt(checkbox.value) * quantity;
                }
            });
            alert('Total price of Pasta: $' + total);
        }
    </script>
    <style>
		.title{
			font-family: Georgia;
			font-size:70px;
			color:black;
			background-color:#de1616;
			font-wieght:bold;
			text-shadow: 2px 2px 5px yellow;
		}
		.font1{
			color:white;
			font-family: Georgia;
			font-wieght:bold;
			font-size:40px;
		
		}
		
		.image-container {
			  position: relative;
			  display: inline-block;
			}

		.pasta-label {
		  position: absolute;
		  top: 50%;
		  left: 200%;
		  transform: translate(-50%, -50%);
		  white-space: nowrap;
		 
		}
		.pasta-2 {
		  position: absolute;
		  top: 60%;
		  left: 190%;
		  transform: translate(-50%, -50%);
		  white-space: nowrap;
		 
		}
			
		.pasta-3 {
		  position: absolute;
		  top: 55%;
		  left: 200%;
		  transform: translate(-50%, -50%);
		  white-space: nowrap;
		 
		}
		
		.pasta-4 {
		  position: absolute;
		  top: 55%;
		  left: 210%;
		  transform: translate(-50%, -50%);
		  white-space: nowrap;
		 
		}
		</style>
	</head>
<body bgcolor="#b02525">
<font class="font1">
    <a href="Home.php" class="linktext">Back to Main Menu</a>
</font>
<h1 class="title" align=center> <br>
    The Pasta Menu:
<br> <br></h1>
<table class="font1">
    <tr>
        <td>
            <div class="image-container">
                <img src="lasagna.jpg" alt="Product1" width="550" height="500">
                <label for="pasta1" class="pasta-label">The Lasagna ($10): This pasta is made by layering wide, <br> flat noodles with cheese, sauce, and meats, <br> then baking it until it's golden and bubbly.</label>
                <input type="checkbox" name="pasta1" id="pasta1" value="10"> <br>
                <button onclick="decreaseQuantity('quantity1')">-</button>
                <input type="number" id="quantity1" value="1" data-checkbox="pasta1">
                <button onclick="increaseQuantity('quantity1')">+</button>
                <br><br>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="image-container">
                <img src="spaghetti.jpg" alt="Product2" width="550" height="500">
                <label for="pasta2" class="pasta-label">The Spaghetti ($8): It is a long, thin pasta <br> in a string like form served <br> with marinara sauce, and often with a meatball.</label>
                <input type="checkbox" name="pasta2" id="pasta2" value="8"> <br>
                <button onclick="decreaseQuantity('quantity2')">-</button>
                <input type="number" id="quantity2" value="1" data-checkbox="pasta2">
                <button onclick="increaseQuantity('quantity2')">+</button>
                <br><br>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="image-container">
                <img src="fettuccine-alfredo.jpg" alt="Product3" width="550" height="500">
                <label for="pasta3" class="pasta-label">The Fettuccine Alfredo ($15): This is a creamy pasta dish made <br> with flat ribbon-like noodles tossed in a <br> rich sauce of butter, heavy cream, and Parmesan cheese.</label>
                <input type="checkbox" name="pasta3" id="pasta3" value="15"> <br>
                <button onclick="decreaseQuantity('quantity3')">-</button>
                <input type="number" id="quantity3" value="1" data-checkbox="pasta3">
                <button onclick="increaseQuantity('quantity3')">+</button>
                <br><br>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="image-container">
                <img src="ravioli.jpg" alt="Product4" width="550" height="500">
                <label for="pasta4" class="pasta-label">The Ravioli ($12): They are small, square parcels of pasta dough <br> filled with various fillings of cheese and meat <br> served with marinara sauce.</label>
                <input type="checkbox" name="pasta4" id="pasta4" value="12"> <br>
                <button onclick="decreaseQuantity('quantity4')">-</button>
                <input type="number" id="quantity4" value="1" data-checkbox="pasta4">
                <button onclick="increaseQuantity('quantity4')">+</button>
                <br><br>
            </div>
        </td>
    </tr>
</table>
<button onclick="calculateTotal()">Calculate Total Price</button>
</body>
</html>