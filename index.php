<!DOCTYPE HTML>
<html>
<head>  
<meta charset="UTF-8">
<meta name="author" content="Andrea Chiariotti - Zorzi Daniele">
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="../../canvasjs.min.js"></script>
<!-- Libreria grafici -->
<script src="canvasjs.min.js"></script>
<script>
window.onload = function () {
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "PM 2.5 - soglia limite 25 µg/m3"
	},
	axisY:{
		includeZero: false,
		stripLines:[
			{                
				value:25,
				label : "Soglia di concentrazione",
				thickness:4
			}
		],
		title: " µg/m3"
	},
	toolTip:{   
		content: "{label}   {y}µg/m3",
		fontColor: "blue"		
	},
	data: [{        
		type: "spline",       
		dataPoints: [         
        <?php 
			// http://chalinux.addns.org:3128/centralina/dati_6gg.txt
			foreach(file("dati_6gg.txt") as $riga){
			$p=explode(";",$riga);
			echo "{ label : \"".$p[0]." ore ".$p[1].":\", y:".$p[2]."},";
			}  
		?>
	]
	}]
});
chart.render();

var chart = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "PM 10 - soglia limite 50 µg/m3"
	},
	axisY:{
		includeZero: false,
		stripLines:[
			{                
				value:50,
				label : "Soglia di concentrazione",
				thickness:4
			}
		],
		title: " µg/m3"
	},
		toolTip:{   
		content: "{label}   {y}µg/m3",
		fontColor: "blue"		
	},
	data: [{        
		type: "spline",       
		dataPoints: [                 
		<?php
			foreach(file("dati_6gg.txt") as $riga){
			$p=explode(";",$riga);		
			echo "{ label : \"".$p[0]." ore ".$p[1].":\", y:".$p[3]."},";
			}  
		?>
	]
	}]
});
chart.render();

var chart = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	theme: "light1",
	title:{
		text: "Temperatura   °C "
	},
	axisY:{
		includeZero: false,
		title: "Temperatura in °C"
	},
	toolTip:{   
		content: "{label}   {y}°C",
	fontColor: "blue"		
	},
	data: [{        
		type: "spline",       
		dataPoints: [      
        <?php 
			foreach(file("dati_6gg.txt") as $riga){
			$p=explode(";",$riga);
			echo "{ label :\"".$p[0]." ore ".$p[1].":\", y:".$p[4]." },";
			}  
		?>
	]
	}]
});
chart.render();

var chart = new CanvasJS.Chart("chartContainer3", {
		animationEnabled: true,
	theme: "light1",
	title:{
		text: "Umidità   %"
	},
	axisY:{
		includeZero: false,
		title: "Umidità in %"
	},
	toolTip:{   
		content: "{label}   {y}%",
	fontColor: "blue"		
	},
	data: [{        
		type: "spline",       
		dataPoints:[                    
        <?php 
			foreach(file("dati_6gg.txt") as $riga){
			$p=explode(";",$riga);	
			echo "{ label: \"".$p[0]." ore ".$p[1].":\", y:".$p[5]." },";
			}  
		?>
	]
	}]
});
chart.render();

}
</script>

</head>
<body>
<div id="title" style="font-size:2em !important;FONT-FAMILY: fantasy; COLOR: #124173;">PROGETTO ARIA TREBASELEGHE</div>
</br>
<div id="description"  style="font-family: sans-serif;">
Il seguente progetto indipendente è un indicatore dello stato dell' aria che respiriamo giornalmente a Trebaseleghe. 
 </div>
</br>

</br>	
	<!-- Contenitore grafico 1 -->
	<div id="chartContainer" style="height: 470px; max-width: 1200px;  margin: 0px auto;"></div>
	</br>
	</br>
	</br>
	<!-- Contenitore grafico 2 -->
	<div id="chartContainer1" style="height: 470px; max-width: 1200px;  margin: 0px auto;"></div>
	</br>
	</br>
	</br>
	<!-- Contenitore grafico 3 -->
	<div id="chartContainer2" style="height: 470px;  max-width: 1200px; margin: 0px auto;"></div>
	</br>
	</br>
	</br>
	<!-- Contenitore grafico 4 -->
	<div id="chartContainer3" style="height: 470px; max-width: 1200px; margin: 0px auto;"></div>
	
<br>
<div id="didascalia" style="font-family: sans-serif;">
Attraverso le misurazioni dei parametri PM 2.5 e PM 10 è possibile essere aggiornati sui livelli generali di qualità dell' aria nella zona di riferimento indicata nella mappa.
I valori rilevati dal sensore utilizzato possono essere soggetti a lievi variazioni generate da disturbi di contorno. 
E' possibile confrontare i valori esposti con i relativi dati forniti dall' ARPAV Veneto qui disponibili: <a href="https://www.arpa.veneto.it/arpavinforma/bollettini/aria/rete_pm10.php" target="_blank">DATI ARPAV Veneto</a>
</div>
</br>
<!-- Importazione mappa e video -->
<div id="gmaps" style="margin: 0px auto; text-align:center !important;">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3460.8630669573504!2d12.047733315941448!3d45.59141397910264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDXCsDM1JzI5LjEiTiAxMsKwMDInNTkuNyJF!5e1!3m2!1sit!2sit!4v1585486709831!5m2!1sit!2sit" width="600" height="450" frameborder="0" style="border:0; border-style: solid;
    border-width: thin" allowfullscreen=""></iframe>
	<iframe style="border-style: solid; border-width: thin;" width="600" height="450" src="https://www.youtube.com/embed/RnJLPw0FbCs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	<!--<iframe  width="1200" height="650" src="https://www.arpa.veneto.it/arpavinforma/indicatori-ambientali/indicatori_ambientali/atmosfera/qualita-dellaria/livelli-di-concentrazione-di-polveri-fini-pm10" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
</div>
</br>




<div id="notes"  style="font-family: sans-serif;">
<h1>Informazioni generali</h1>
	<p>
	<h2>Caratteristiche sensore</h2>
	<div id = "image">
			<!--<iframe id="sensorIframe" src='http://chalinux.addns.org/values' width="400" height="150" frameborder="0" style="border:0;" allowfullscreen=""></iframe>-->
			<img src="sds011.png" width="250" height="220" style="float:left;">			
			<div id="space" style="float:left; margin-left: 1%">&nbsp;</div>
			<div id="techData" >
				<style type="text/css">
				.tg  {border-collapse:collapse;border-spacing:0;}
				.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
				  overflow:hidden;padding:12px 20px;word-break:normal;}
				.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
				  font-weight:normal;overflow:hidden;padding:12px 20px;word-break:normal;}
				.tg .tg-1wig{font-weight:bold;text-align:right;vertical-align:top;    border: none;}
				.tg .tg-zv36{background-color:#ffffff;border-color:black;font-weight:bold;text-align:right;vertical-align:top;    border: none;}
				.tg .tg-0lax{text-align:left;vertical-align:top}
				.tg .tg-c6of{background-color:#ffffff;border-color:black;text-align:left;vertical-align:top}
				.tg .tg-fymr{border-color:black;font-weight:bold;text-align:right;vertical-align:top;    border: none;}
				.tg .tg-0pky{border-color:black;text-align:left;vertical-align:top}
				</style>
				<table class="tg">
				<thead>
				  <tr>
					<th class="tg-1wig">Produttore</th>
					<th class="tg-0lax">Nova PM</th>
					<th class="tg-0lax"></th>
				  </tr>
				</thead>
				<tbody>
				  <tr>
					<td class="tg-zv36">Modello</td>
					<td class="tg-c6of">SDS011</td>
					<td class="tg-0lax"></td>
				  </tr>
				  <tr>
					<td class="tg-zv36">Alimentazione</td>
					<td class="tg-c6of">5 Vcc</td>
					<td class="tg-0lax">(min. 4,7 Vcc - max 5,3 Vcc)</td>
				  </tr>
				  <tr>
					<td class="tg-fymr">Gamma di misura</td>
					<td class="tg-0pky">da 0,0 µg/m3 a 999,9 µg/m3</td>
					<td class="tg-0lax"></td>
				  </tr>
				  <tr>
					<td class="tg-zv36">Risoluzione</td>
					<td class="tg-c6of">0.3 μg/m3</td>
					<td class="tg-0lax"></td>
				  </tr>
				</tbody>
				</table>
			</div>	
	</div>
	</br>
	<p>
	<h2>Soglie PM 2.5</h2>
La soglia di concentrazione in aria delle polveri fini PM2.5 è stabilita dal D.Lgs. 155/2010 e calcolata su base temporale annuale. La caratterizzazione dei livelli di concentrazione in aria di PM2.5 nel Veneto al 2018 si è basata sul superamento, registrato presso le stazioni della rete regionale ARPAV della qualità dell’aria che misurano questo inquinante, del Valore Limite (VL) annuale per la protezione della salute umana pari a 25 μg/m3.
	</p>
	<p>
	<h2>Soglie PM 10</h2>
		Le soglie di concentrazione in aria delle polveri fini PM10 sono stabilite dal D.Lgs. 155/2010 e calcolate su base temporale giornaliera ed annuale. È stato registrato il numero di superamenti, 
		dal 2002 al 2018, presso le stazioni di monitoraggio della qualità dell’aria della rete regionale ARPAV, di due soglie di legge: Valore Limite (VL) annuale 
		per la protezione della salute umana di 40 μg/m3; Valore Limite (VL) giornaliero per la protezione della salute umana di 50 μg/m3 da non superare più di 35 volte/anno.
	</p>
</div>
</br>
</br>
<!-- Footer -->
<div class="footer" style= "left: 0;bottom: 0; color: black;text-align: center; border-top-style:solid; border-top-color:black; border-top-width:thin; font-family: sans-serif ">
   <p>
		monitorpmveneto@gmail.com <br/>
    </p>
</div>

</body>

</html>
