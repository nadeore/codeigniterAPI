<?php
               include "Barcode39.php"; 
                // set object 
                // echo $_GET["machineName"];
               $bc = new Barcode39($_GET["machineName"]); 
                //$bc = new Barcode39('abdc'); 

                // set text size 
                $bc->barcode_text_size = 5; 

                // set barcode bar thickness (thick bars) 
                $bc->barcode_bar_thick = 4; 

                // set barcode bar thickness (thin bars) 
                $bc->barcode_bar_thin = 2; 

                // save barcode GIF file 
                $bc->draw($_GET["machineName"].".gif");
                ?> 
               <img src="http://sa4i.leoinfotech.in/application/views/<?php echo $_GET["machineName"];?>.gif">