<?php #cpage.php

	class cpage {
		private $title;
		private $content = array();

		public function __construct($title) {
			$this->title = $title;
		}

		public function __destruct() {

		}

		public function render() {
			echo "<H1>{$this->title}</H1>";
			foreach($this->content as $cont){
				echo $cont;
			}
		}

		public function setContent($content) {
				$this->content = $content;
		}
	}	

?>