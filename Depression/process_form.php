<?php

$name = $_POST["name"];

$file = "testt.txt";

$saved_file = fopen($file,'w');

fwrite($saved_file,$name);

fclose($saved_file);

$command = escapeshellcmd('C:\xampp\htdocs\testt\userentry.py');

$output = shell_exec($command);
$req='depressed';

if ($output!=1){

	echo "

			<!DOCTYPE html>
			<html>
			<title>depressionChk</title>
			<meta charset='UTF-8'>
			<style>
			body,h1,h2,h3,h4,h5,h6 {font-family: 'Raleway', sans-serif}
			body, html {
			  height: 100%;
			  color: #657;
			  line-height: 1.8;
			}


			/* Create a Parallax Effect */
			.bgimg-1, .bgimg-2, .bgimg-3 {
			  background-attachment: fixed;
			  background-position: center;
			  background-repeat: no-repeat;
			  background-size: cover;
			}

			/* First image (Logo. Full height) */
			.bgimg-1 {
			  background-image: url('1.jpg');
			  min-height: 100%;
			  
			}
			/* Second image (Portfolio) */

			.w3-wide {letter-spacing: 10px;}
			.w3-hover-opacity {cursor: pointer;}

			/* Turn off parallax scrolling for tablets and phones */
			@media only screen and (max-device-width: 1600px) {
			  .bgimg-1 {
			    background-attachment: scroll;
			    min-height: 100%;
			  }
			}
			</style>

			<div class='bgimg-1 w3-display-container w3-opacity-min' id='home'>
			  <h2><centre>Let's Create a Depression Free world.......</h2></centre>
			  
			  <table  frame='lhs' width='820' length='587' align='center'>
			    <td><center>
			      <br><br><br><br>
			      <b><font size='5' color='green' face='Droid Serif'>
			      <p>hey! well wisher u will be happy to know that your friend is not under depression</p>
			      </font>
			      <img src='smile.png' alt='Italian Trulli' width='200' length='200'>
			      <br>
			      

			  <form 

			  method='post' action='myForm.html'>
			  <input type='submit' name='submitdata' value='-Check Another-' />
			   </form></b>

			    </table>
			</div>


			  		
			  </body>
			  </script>
			</html>";
}
else{

	echo "
			<!DOCTYPE html>
			<html>
			<title>depressionChk</title>
			<meta charset='UTF-8'>
			<style>
			body,h1,h2,h3,h4,h5,h6 {font-family: 'Raleway', sans-serif}
			body, html {
			  height: 100%;
			  color: #657;
			  line-height: 1.8;
			}


			/* Create a Parallax Effect */
			.bgimg-1, .bgimg-2, .bgimg-3 {
			  background-attachment: fixed;
			  background-position: center;
			  background-repeat: no-repeat;
			  background-size: cover;
			}

			/* First image (Logo. Full height) */
			.bgimg-1 {
			  background-image: url('1.jpg');
			  min-height: 100%;
			  
			}
			/* Second image (Portfolio) */

			.w3-wide {letter-spacing: 10px;}
			.w3-hover-opacity {cursor: pointer;}

			/* Turn off parallax scrolling for tablets and phones */
			@media only screen and (max-device-width: 1600px) {
			  .bgimg-1 {
			    background-attachment: scroll;
			    min-height: 100%;
			  }
			}
			</style>

			<div class='bgimg-1 w3-display-container w3-opacity-min' id='home'>
			  <h2><centre>Let's Create a Depression Free world.......</h2></centre>
			  
			  <table  frame='lhs' width='820' length='587' align='center'>
			    <td><center>
			      <br><br><br>
			      <b><font size='5' color='red' face='Droid Serif'>
			      <p>We are sorry to say but your friend is under depression tell us if we can help you and your friend in anyway</p>
			      </font><br></b>
			      <img src='sad.png' alt='Italian Trulli' width='200' length='200'>
			      <br>
			      

			  <form 

			  method='post' action='myForm.html'>
			  <input type='submit' name='submitdata' value='-Check Another-' />
			   </form></b>

			    </table>
			</div>


			  		
			  </body>
			  </script>
			</html>";
}

?>