<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Music Viewer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="viewer.css" type="text/css" rel="stylesheet" />
	
	<style> 

	
#back{
	margin-top: 10px;
	background-color: #FFF;
	border: 2px dashed blue;
	text-align: center;
	position: absolute;
	bottom: 10px;
	width: 95vw;	

}

img > .back{ display: block; }
	</style>

	</head>
	<body>
		<div id="header">

			<h1>'190M Music' Playlist Viewer</h1>
			<h2>Search Through Your Playlists and Music</h2>
		</div>


		<div id="listarea">

					
					<ul id="musiclist">
				
				<?php 
				function displaysongs(){
					if (!isset($_REQUEST['playlist'])){
						$files=glob("songs/*.mp3");
						$valid=false;
					}
					else{
						$files = file('songs/' . $_REQUEST['playlist'], FILE_IGNORE_NEW_LINES);
						$valid=true;
					}
					foreach ($files as $file ) {
						if (!$valid) {
							$size = filesize($file);
						  if ($size > 0 && $size < 1024){
						  	$size = $size . " b";
						  }
						  elseif ($size > 1024 && $size < 1048575){
						  	$size = round($size / 1024, 2) . " kb";
						  }
						  elseif ($size > 1048575){
						  	$size = round($size / 1048575, 2) . " mb";
						  }
						}
						else{
							$size = filesize('songs/'.$file);
						  if ($size > 0 && $size < 1024){
						  	$size = $size . " b";
						  }
						  elseif ($size > 1024 && $size < 1048575){
						  	$size = round($size / 1024, 2) . " kb";
						  }
						  elseif ($size > 1048575){
						  	$size = round($size / 1048575, 2) . " mb";
						  }
						}
						?>
						 <li class="mp3item"><a href="songs/<?= basename($file) ?>">
		  	<?= basename($file). " (" . $size . " )" ;?></a></li>

						<?php 
					}
				}
				function displaylists(){
					$playlists=glob("songs/*.txt");
					foreach($playlists as $playlist){
				 		?>
				 		<li class="playlistitem"><a href="music.php?playlist=<?=basename($playlist)?>"><?= basename($playlist);?></a></li>
				 			<?php } 
				 		}
				 		displaysongs();
				 		if(!isset($_REQUEST['playlist']))
	  						displaylists();
				 	?>
			</ul>
		</div>
		
	<?php if(isset($_REQUEST['playlist'])){ 
				?>
				<?=
				' <a href="music.php"><img class="back" src="back.png" height="50" width="50">Go Back</a> '; ?>
				<?php }
				?>

		<div id="back">
			
			<text>copyright (c) 2019</text>
			<br />
			<text> <a href="https://github.com/abbosjon-kudratov" target="_blank">Abbosjon Kudratov</a></text>	 
			</div>
	</body>
</html>