<!DOCTYPE html>
<html lang=en>
<head>
<title>#smiles</title>
<style type="text/css">
* {margin:0; padding:0;}
body {width: 60%; margin:auto; padding-bottom: 40px; background-color: #000; color: white; font-family: Helvetica, Arial, sans-serif; font-size: 1.2em; }
a, a:hover, a:visited, a:active {color: white;}

section#title {margin-top:250px; color: gray; text-align: center; font-style: italics;}
section#title h1 {font-size: 3em;}
section#title h2 {font-size: 2em;}
section#title p {padding-top:20px;}

article {margin-top: 20px; text-align: center;}
article h1.byline {text-align: left; position: absolute; left: 350px; top: 580px; background-color: #000;}
</style>
</head>

<body>
<nav>
<article id=instagram>
<section id=title>
<h1>#smiles</h1>
<h2>are loading</h2>
<p>A doodad made by Jacob Roeland</p>
</article>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>
oldData = $('#instagram').html();
window.setInterval(function(){
   $.get("api.php", function(newData)
   {
      if (!(oldData == newData))
      {
         oldData = newData;         
         $('#instagram').fadeOut('slow', function(){$(this).html(newData).fadeIn('slow')});
      }
   });
}, 10000);
</script>
</body>
</html>
