<style>
ul.sticky_notes{ list-style:none; }
ul.sticky_notes li{
	width:250px;
	height:200px;
	padding:20px;
	margin:20px;
	float:left;
	 /* Firefox */  
  -moz-box-shadow:5px 5px 7px rgba(33,33,33,1);  
  /* Safari+Chrome */  
  -webkit-box-shadow: 5px 5px 7px rgba(33,33,33,.7);  
  /* Opera */  
  box-shadow: 5px 5px 7px rgba(33,33,33,.7); 
  -webkit-transform:rotate(-6deg);  
  -o-transform:rotate(-6deg);  
  -moz-transform:rotate(-6deg);  
  font-family: 'Short Stack', cursive;
}
ul.sticky_notes p{
	font-size:16px;
}

ul.sticky_notes li:nth-child(odd){  
  -o-transform:rotate(4deg);  
  -webkit-transform:rotate(4deg);  
  -moz-transform:rotate(4deg);  
  position:relative;  
  top:5px;  
}  
ul.sticky_notes li:nth-child(2n){  
  -o-transform:rotate(-3deg);  
  -webkit-transform:rotate(-3deg);  
  -moz-transform:rotate(-3deg);  
  position:relative;  
  top:-5px;  
}  
ul.sticky_notes li:nth-child(6n){  
  -o-transform:rotate(5deg);  
  -webkit-transform:rotate(5deg);  
  -moz-transform:rotate(5deg);  
  position:relative;  
  top:-10px;  
}

ul.sticky_notes li:hover{   
  -webkit-transform: scale(1.5);  
  -moz-transform: scale(1.5);  
  -o-transform: scale(1.5);  
  position:relative;  
  z-index:10;  
  -moz-box-shadow:0px 10px 7px rgba(0,0,0,.7);  
  -webkit-box-shadow: 0px 10px 7px rgba(0,0,0,.7);  
  box-shadow:0px 10px 7px rgba(0,0,0,.7); 
  -webkit-transition: all 300ms ease-in 50ms; /* property duration timing-function delay */
    -moz-transition: all 300ms ease-in 50ms;
    -o-transition: all 300ms ease-in 50ms;
    transition: all 300ms ease-in 50ms;
    cursor:pointer;
}  



/*predefined colours
see http://www.w3schools.com/colors/colors_names.asp
*/
.yellow{background:#ffc;}
.green{	background:#cfc;}
.blue { background:#ccf;}
.red{background:#f24a4a;}
.purple{background:#eaafe3}
.orange{background:#f28e50;}
.AliceBlue{background:#F0F8FF;} 
.AntiqueWhite{background:#FAEBD7;}
.Gold{background:#FFD700;}



.newTasks{
	padding:3px;
	border:1px solid #888;	
	-moz-border-radius:3px;  
  	-webkit-border-radius: 3px;  
  	border-radius:3px;
}
.newTasks input[type=text] { width:300px; padding:3px };
.deleteButton { cursor:pointer; }
</style>


<link href='//fonts.googleapis.com/css?family=Short+Stack' rel='stylesheet' type='text/css'>



<script>
//Function which runs on page load
$(document).ready(function(){
	
	//clicking on list item event opens url
	$(".sticky_notes li").click(function() { 	   
	   //set url for opening note
	   url=$(this).find("a").attr("href");
	   location.href = url;	   
	});

});

</script>


<ul class="sticky_notes">
<?php
	//http://stackoverflow.com/questions/9612061/random-background-color-from-array-php
	function GenerateRandomColor()
	{
		$color = '#';
		$colorHexLighter = array("9","A","B","C","D","E","F" );
		for($x=0; $x < 6; $x++):
			$color .= $colorHexLighter[array_rand($colorHexLighter, 1)]  ;
		endfor;
		return substr($color, 0, 7);
	}
	


	$i=0;
	foreach ($changelogs as $changelog){
		
		$i++;
		
		//create items via php element
		echo $this->element('Gerrymcdonnell/Changelog.stickynote2',
		[
			'title'=>$changelog->title,
			'description'=>$changelog->description,
			'index'=>$i,
			'url'=>'/cakenewsapp2/gerrymcdonnell/changelog/changelogs/edit/'.$changelog->id
		]
		);
		
	}
?>
</ul>