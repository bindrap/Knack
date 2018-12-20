<html>
       <head>
       <style>
        form { 
              margin: 0 auto; 
              width:250px;
        }
        .bg-img {
    /* The image used */
    background-image: url("acrylic.jpg");

    min-height: 380px;

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
       </style>
	</head> 
        <body>
          <div class="bg-img">
               <font color="#FFF700">
		<?php 
			$wage=$_POST["wage"];
			$food=$_POST["food"];
			$phone=$_POST["phone"];
			$gas=$_POST["gas"];
			$rec=$_POST["rec"];
			$expenses=$food + $phone + $gas + $rec;
			$saving = $wage - $expenses;
			echo "The money to put in savings is " .$saving;
                        echo "<br />\n";
                        echo "<br />\n";
			echo "\n\n STATISTICAL ANALYSIS BEGINS \n\n";
                        echo "<br />\n";
			$saving_percent = ($saving / $wage)*100; 
			echo "\n Saving = " .$saving_percent;
			$food_percent = ($food / $wage)*100;
			$phone_percent = ($phone / $wage)*100;
			$gas_percent = ($gas / $wage)*100;
			$rec_percent = ($rec / $wage)*100;
                        echo "<br />\n";
			echo "\n Food = " .$food_percent;
                        echo "<br />\n";
			echo "\n Phone = " .$phone_percent;
                        echo "<br />\n";
			echo "\n Gas = " .$gas_percent;
                        echo "<br />\n";
			echo "\n Recreation = " .$rec_percent;
		
		?>
                </font>
           </div>
	</body>
</html>
