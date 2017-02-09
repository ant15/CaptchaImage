<?php
	class CaptchaImage{
		public $path = "img.jpg";
		public $codice;
		
		/** 
		* Costruttore della classe
		* @param string $path Percorso dell'immagine
		*/
		public function CaptchaImage($path="img.jpg"){
			$this->path = $path;
			
		}
		
		/** 
		* Crea una immagine con un codice casuale nel percorso $path 
		* @return string Percorso dell'immagine
		*/
		public function creaImg(){
			// Creo il codice
			$this->codice = array(rand(0,9), rand(0,9), rand(0,9), rand(0,9));
			$len = strlen(implode($this->codice));
			
			// Dimesioni
			$altezza = 50;
			$larghezza = 40 * $len;
			// Creo l'immagine
			$img = ImageCreate($larghezza,$altezza);
			// Sfondo
			$grigio = ImageColorAllocate($img,200,200,200);
			// Colori
			$nero = ImageColorAllocate($img,0,0,0);
			
			// linee
			imagesetthickness($img, 3);
			for($i = 0; $i < rand(4, 10); $i++){
				$colore = ImageColorAllocate($img,rand(100,200),rand(100,200),rand(100,200));
				ImageLine($img, rand(0,$larghezza),rand(0,$altezza), rand(0,$larghezza),rand(0,$altezza), $colore);
			}
			// Scrivo il testo
			// nella variabile $font bisogna inserire il percorso del font scelto
			$font = "arial.ttf";
			for($i = 0; $i < $len; $i++){
				imagettftext($img, 40, rand(-20,20), 30*($i+1), 45, $nero, $font, strval($this->codice[$i]));
			}
			// Creo l'immagine nel percorso specificato
			ImageJPEG($img, $this->path);
			return $this->path;
		}
		
		/** 
		* Restituisce il codice creato all'interno dell'immagine
		* @return string Codice di controllo
		*/
		public function getCodice(){
			return implode($this->codice);
		}
	
	}
?>