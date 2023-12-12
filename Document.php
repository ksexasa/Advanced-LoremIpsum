<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This is a Lorem Ipsum page made with php. It Creates random text.">
    <meta name="author" content="Chatzistogiannis Ilias">
    <title>Text Generator</title>
	<style>
		body{
			color: #b3b3b3;
			background-color: #121212;
			text-align: center;
			font-size: 1.1rem;
			font-family: "Brush Script", Didot, Garamond;
			line-height: 130%;
			
		}
	</style>
</head>
<body>
    <header>
        <h1 style='color: #bfbfbf;'>Forged Document</h1>
    </header>
	<main>
<?php
	// Alphabet Table in English
	$Alphabet = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");

	// Alphabet Table in Greek
	// $Alphabet = array("α","β","γ","δ","ε","ζ","η","θ","ι","κ","λ","μ","ν","ξ","ο","π","ρ","σ","τ","υ","φ","χ","ψ","ω","ά","έ");
	
	$paragraphs = rand(3,5);
	$f; // $f is the index to loop the paragraphs
	$i;	// $i is the index to loop the sentences
	$startsp = "none";	// Start with special character initial value	
	for($f=0; $f<$paragraphs;$f++){ 
		$sentence = rand(5,11);
		echo "<section>&nbsp;&nbsp;&nbsp;&nbsp;";	// Start every paragraph with a TAB
		for ($i=0 ; $i<$sentence ; $i++){

			// mb_strtoupper is used so that Greek characters can also be converted to upper, strtoupper cant conver greek characters
			echo mb_strtoupper($Alphabet[rand(0,25)]);	// Capitalize the first letter in every sentence
	
			$words = rand(4,12);
			$j;		// $j is the index to loop the words
			for ($j=0;$j< $words;$j++){
				
				// Store the last index 
				$old = "00"; 
				
				// Implement the chance (p = 1/69) of producing a word with parenthesis or quotes
				if ($j != 0){	// First word can't contain parenthesis or quotes
					$special = rand(0,68);
					if ($special < 1){
						$startsp = "par";
						echo "(";
					}else if($special < 2){
						$startsp = "quo";
						echo "\"";
					}
				}
				$letters = rand(1,13);
				$k;	// $k is the index to loop the letters
				for($k=0; $k<$letters; $k++){
					// Reduce the possibillity of printing the same letter 2 times in a row
					do {
						$alpha = rand(0,977);
						$diff = abs($old - $alpha);
					} while ($diff < 31);
					
					// The possibillity of every letter is equal to the frequency of the letter used in english text
					if($alpha < 81){
						echo $Alphabet[0];	// a
					}else if($alpha < 95){
						echo $Alphabet[1];	// b
					}else if($alpha < 122){
						echo $Alphabet[2];	// c
					}else if($alpha < 164){
						echo $Alphabet[3];	// d
					}else if($alpha < 291){
						echo $Alphabet[4];	// e
					}else if($alpha < 313){    
						echo $Alphabet[5];	// f
					}else if($alpha < 333){    
						echo $Alphabet[6];	// g
					}else if($alpha < 393){    
						echo $Alphabet[7];	// h
					}else if($alpha < 462){    
						echo $Alphabet[8];	// i
					}else if($alpha < 464){    
						echo $Alphabet[9];	// j
					}else if($alpha < 471){    
						echo $Alphabet[10];	// k
					}else if($alpha < 511){    
						echo $Alphabet[11];	// l
					}else if($alpha < 535){    
						echo $Alphabet[12];	// m
					}else if($alpha < 602){    
						echo $Alphabet[13];	// n
					}else if($alpha < 677){    
						echo $Alphabet[14];	// o
					}else if($alpha < 696){    
						echo $Alphabet[15];	// p
					}else if($alpha < 698){    
						echo $Alphabet[16];	// q
					}else if($alpha < 757){    
						echo $Alphabet[17];	// r
					}else if($alpha < 820){    
						echo $Alphabet[18];	// s
					}else if($alpha < 910){    
						echo $Alphabet[19];	// t
					}else if($alpha < 937){    
						echo $Alphabet[20];	// u
					}else if($alpha < 947){    
						echo $Alphabet[21];	// v
					}else if($alpha < 970){    
						echo $Alphabet[22];	// w
					}else if($alpha < 972){    
						echo $Alphabet[23];	// x
					}else if($alpha < 974){    
						echo $Alphabet[24];	// y
					}else{                     
						echo $Alphabet[25];	// z
					}	
					$old = $alpha;
				}
				
				// Closing the quotes and the parenthesis
				if($startsp != "none"){	
					if($startsp == "quo"){
						echo "\"";
					}else{
						echo ")";
					}
					$startsp = "none";	
				}	

				
				// Chance (p = 1/9) of using comma
				if ($j != $words-1){	// Last word can't have a comma following
					$comma = rand(0,8);
					if ($comma > 7){
						echo ",";
					}	
					echo " ";	
				}
				
				// Chance (p = 1/170) of inserting an acronym
				if ($j != 0 && $j != $words-1){
					$acronym = rand(1,170);
					if ($acronym == 48){
						// The acronym choices are fixed because it is rare to have an acronym to the text.
						// Also usually the text that uses an acronym, uses it repetevly
						// Acronyms in the list are picked to exist in greek alphabet as well
						$acrsele = rand(1,4); // Variable for selecting an acronym 
						switch ($acrsele){
							case "1":
								echo " B.P.I.M. ";
								break;
							case "2":
								echo " A.K.Z. ";
								break;
							case "3":
								echo " E.P.X. ";
								break;
							default :
								echo " A.X.O.N. ";
						}						
					}
				}
				
				// End of word
			}
			
			// Punctuation mark
			$mark = rand(0,10);
			if ($mark < 8){
				echo ". ";
			}else if ($mark < 10){
				echo "? ";
			}else if ($mark < 11){
				echo "! ";
			}
			
			// End of sentence
		}
		echo "</section><br><br>";
		
		// End of paragraph
	}
?>
    </main>
	<footer>
        <p>&copy; 2024 Chatzistogiannis Ilias. All rights reserved.</p>
    </footer>
</body>
</html>
