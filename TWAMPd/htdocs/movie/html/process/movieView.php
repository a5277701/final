<?php
	include("movie.inc.php");
  	$movie_no=$_GET['no'];
	$sql = "SELECT * FROM `movie` WHERE `movie_no` = '$movie_no';";
	$result = mysql_query($sql);
	$movie = mysql_fetch_array($result);
 ?>

<div style="text-align:center">
	<div style="margin:0 auto; width:500px; text-align:left">
		<img src='../../images/cover/<?php echo $movie[movie_no] ?>.jpg'
			width=350 height=500
			title="<?php $movie['movie_name'] ?>"
			border="1"><br>
		<p>電影片名：<?php echo$movie[movie_name] ?></p>
		<p>英文片名：<?php echo$movie[movie_ENname] ?></p>
		<p>電影類型：<?php echo$movie[movie_style] ?></p>
		<p>電影級別：<?php echo$movie[movie_level] ?></p>
		<p>電影長度：<?php echo$movie[movie_length] ?></p>
		<p>上映時間：<?php echo$movie[movie_releaseDate] ?></p>
		<p>電影介紹：<?php echo$movie[movie_introduction] ?></p>
	</div>
</div>
