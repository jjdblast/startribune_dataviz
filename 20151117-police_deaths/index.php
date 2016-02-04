<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Minnesota Police Involved Deaths</title>
  <meta name="description" content="Minnesota Police Involved Deaths">
  <meta name="author" content="Jeff Hargarten - StarTribune">

  <link href="../_common_resources/charts/c3-master/c3.css" rel="stylesheet" type="text/css">
  <link href='https://api.tiles.mapbox.com/mapbox.js/v2.2.0/mapbox.css' rel='stylesheet' />
  <link rel="stylesheet" href="../_common_resources/styles/startribune_dataviz_styles.css" />
  <link rel="stylesheet" type="text/css" href="../_common_resources/interfaces/paginate/jPaginate/css/style.css" media="screen"/>

  
  <style>
   body { font-family:"Benton Sans",Helvetica,Arial,sans-serif !important; overflow-x:hidden !important; }
   #bigNumber { font-size:8em; color:#8C101C; font-weight:bold; text-align:center; font-family:"Popular" !important; }
   #bottomText { text-align:center; font-weight:normal; }
   #filter { text-align:center; }
   .filters { display:inline-block; }
   #filterBox { width:100%; }
   .wrapper-dropdown-1 { width:100%; }
   .wrapper-demo { width:100%; }
   #resultBar { text-align:center; font-size:1.6em; }
   .easyPaginateNav { text-align:center; }
   .easyPaginateNav a { padding:5px; text-decoration:none; color:steelblue; width:100%; }
   .easyPaginateNav a.current { font-weight:bold; text-decoration:underline; }
   #jump { text-align:center; width:100%; padding:10px; }
   a { text-decoration:none; color:steelblue; }
   a:hover { color:#aaa !important; }
   .name { text-transform: capitalize !important; font-weight:900; }
   .card { padding:20px; height:auto !important; border-bottom:1px solid #ddd; }
   .card div { padding:3px; }
   .leftSide { float:left; width:80%; }
   .rightSide { float:right; width:15%; border:0 solid #eee; width:150px; height:150px; }
   .photo, .photo img { width:100%; height:150px; }
   .break { clear:both; }
/*   .url { display:none; }*/
   .description { font-weight:bold; }
   #deathsTable { max-height:420px; min-height:420px; overflow-y:hidden !important; overflow-x:hidden !important;  }
   .navButton { width:100%; background-color:#ddd; padding:15px; border:none; font-size:1.4em; font-weight:900;  }
   .navButton:hover { color:#fff; background-color:#333; cursor:pointer;  }
   #wrapper { width:100%; }

   .filterBreak { height:7px; border-bottom:1px solid #333; clear:both; }
   #filter input:focus { width: 100% !important; }
   #filter input { width: 100% !important; }
   .filter a, .filter2 a, .filter3 a { float:left; width:80%; white-space: nowrap; }
   .breakSmall { height:0; clear:both; }
   .count { float:right; width:5%; margin-right:8%; font-size:2em;  color:#8C101C; }
   .weaponType, .region { display:none; }

   .smallerBreak { height:10px; }

   #map { width:100%; height:200px; margin-top:8px; }

   li:hover { background-color:#ddd !important; cursor:pointer; }

   @media (max-width:800px) {
   .leftSide { width:100%; }
   .rightSide { display:none; }
   .count { font-size:1.4em; }
   }
  </style> 
</head>

<body>
  <div id="wrapper">

    <div class="chart" id="bigNumber">0</div>
    <div class="chartTitle" id="bottomText">people have died in forceful encounters with law enforcement in Minnesota since 2000</div>
<!--     <div class="chartTitle" id="bottomText">search the Star Tribune's database of fatal incidents</div>
 -->
    <div class="breaker"></div>

    <div class="chatter">
      <p>Most -- 123 -- were shot. The rest died after being tased, restrained or sprayed with chemicals.</p>
      <p>Police reported that at least 60 had guns or gun look-alikes, such as a BB or pellet gun. About 44 others had some other object described as a weapon, including knives, a sword, a baseball bat and in one case, a BIC pen. Some used a vehicle to drag officers or try to ram them.</p>
      <p>Not all of the incidents stemmed from a crime. In some cases, for instance, police were responding to reports about erratic behavior or a potential suicide.</p>
      <p>Officers of the Minneapolis Police Department were involved in the largest share of deaths, 29. Three out of four deaths were in the metro area.</p>
      <p>The Star Tribune compiled a database of these deaths by digging through news reports, law enforcement reports to the Justice Department and FBI, and death certificate data. It is likely incomplete since these deaths are not reliably tracked by any single government agency, nor consistently documented on death certificates.</p>
      <p>If you have questions about the data, please contact Jennifer Bjorhus at <a href="mailto:Jennifer.Bjorhus@startribune.com">Jennifer.Bjorhus@startribune.com</a> or 612-673-4683.</p>
      <p>Scroll through the list of fatal incidents or use the filter menu to view death records by race, gender, location and more. Results are also reflected on the map.</p>
    </div>

     <div class="chartTitle" id="race">Locations of force-related deaths</div>
     <div class="chatter">Markers represent general locations of incidents.</div>
     <div class='map' id="map"></div>

     <div class="chartTitle" id="deaths">Explore Minnesota force-related deaths</div>

<div class="smallerBreak"></div>

     <div id="filterBox">
      <div id="selector">
  <section class="main">
        <div class="wrapper-demo">
          <div id="dd" class="wrapper-dropdown-1" tabindex="1">
            <span>Filter death reports</span>
              <ul class="dropdown race" tabindex="1">
        <li id="all"><a href="#">All</a></li>
        <div class='filterBreak'></div>
        <li class='filter3' data="minneapolis" metric="region"><a href="#">Minneapolis</a> <div class="count">0</div></li>
        <div class="breakSmall"></div>
        <li class='filter3' data="st. paul" metric="region"><a href="#">St. Paul</a> <div class="count">0</div></li>
        <div class="breakSmall"></div>
        <li class='filter3' data="metro" metric="region"><a href="#">Metro Suburbs</a> <div class="count">0</div></li>
        <div class="breakSmall"></div>
        <li class='filter3' data="outstate" metric="region"><a href="#">Outstate</a> <div class="count">0</div></li>
        <div class='filterBreak'></div>
        <li class='filter' data="white" metric="race"><a href="#">White</a> <div class="count">0</div></li>
        <div class="breakSmall"></div>
        <li class='filter' data="black" metric="race"><a href="#">Black</a> <div class="count">0</div></li>
        <div class="breakSmall"></div>
        <li class='filter' data="asian" metric="race"><a href="#">Asian</a> <div class="count">0</div></li>
        <div class="breakSmall"></div>
        <li class='filter' data="american indian" metric="race"><a href="#">American Indian</a> <div class="count">0</div></li>
        <div class='filterBreak'></div>
        <li class='filter' data=" male" metric="gender"><a href="#">Male</a> <div class="count">0</div></li>
        <div class="breakSmall"></div>
        <li class='filter' data="female" metric="gender"><a href="#">Female</a> <div class="count">0</div></li>
        <div class='filterBreak'></div>
        <li class='filter' data="homicide" metric="manner"><a href="#">Homicide</a> <div class="count">0</div></li>
        <div class="breakSmall"></div>
        <li class='filter' data="suicide" metric="manner"><a href="#">Suicide</a> <div class="count">0</div></li>
        <div class="breakSmall"></div>
        <li class='filter' data="accident" metric="manner"><a href="#">Accidental Death</a> <div class="count">0</div></li>
        <div class="breakSmall"></div> 
        <li class='filter' data="natural" metric="manner"><a href="#">Natural Causes</a> <div class="count">0</div></li>
        <div class="breakSmall"></div>
        <li class='filter' data="could not be determined" metric="manner"><a href="#">Manner Not Determined</a> <div class="count">0</div></li> 
        <div class="breakSmall"></div>  
        <li class='filter' data="not available" metric="manner"><a href="#">Manner Not Available</a> <div class="count">0</div></li> 
        <div class='filterBreak'></div>
        <li class='filter2' data="gun" metric="weapon"><a href="#">Gun</a> <div class="count">0</div></li>
        <div class="breakSmall"></div> 
        <li class='filter2' data="knife" metric="weapon"><a href="#">Knife</a> <div class="count">0</div></li>
        <div class="breakSmall"></div>
        <li class='filter2' data="other" metric="weapon"><a href="#">Other Weapon</a> <div class="count">0</div></li>
        <div class="breakSmall"></div>
        <li class='filter2' data="unarmed" metric="weapon"><a href="#">Unarmed</a> <div class="count">0</div></li>  
              </ul>
          </div>
        ​</div>
</section>
</div>


    </div>

    <div id="resultBar"> <span id="results"></span> <span>results</span></div>

     <div class="breaker"></div>

     <div id="filter"><input type="search" id="filter_box" placeholder="Search list of deaths by name, year or keyword"></input></div>

<button id='upClick' class="navButton">&#9650;</button>
     <div id="deathsTable"></div>
<button id='downClick' class="navButton">&#9660;</button>

    <div class="breaker"></div>

     <div class="chartTitle" id="year">Number of force-related deaths by year</div>
     <div class="chatter">Overall, the number of deaths per year is on an upward trend, although that could be due to better media reporting and a heightened public awareness of police force.</div>
     <div class="chart" id="yearChart"></div>

     <div class="chartTitle" id="race">Disproportionate minority deaths</div>
     <div class="chatter">The percentage of force-related deaths since 2000 broken down by race and the percentage each race accounts for in Minnesota’s population. The disproportionate representation of blacks and other minorities mirrors data on arrests. Last year, 25 percent of those arrested in Minnesota were black, compared to 67 percent white, five percent American Indian and three percent Asian.</div>
     <div class="chart" id="raceChart"></div>


     <a href="https://docs.google.com/spreadsheets/d/1T-Du1geFfuspEYGF_U0531mLTJ0ehbA5YbaFCxgmkRA/pub?gid=1024005488&single=true&output=csv" target="new_"><button class="downloadButton">&nbsp;Download data</button></a>

  </div>
</body>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
<script src="../_common_resources/charts/c3-master/c3.min.js"></script>
<script src='https://api.tiles.mapbox.com/mapbox.js/v2.2.0/mapbox.js'></script>

<script type="text/javascript" src="http://static.startribune.com/js/pym/pym.min.js"></script>
<script>
var pymChild = new pym.Child();
</script>
<script>
//LIVE JSON MAGIC

//https://script.google.com/macros/s/AKfycbwG7mX6qPZaIhkwY2AJ2lU7kNarbm6OWIkWVfnmYZGYruIl40cu/exec?id=1T-Du1geFfuspEYGF_U0531mLTJ0ehbA5YbaFCxgmkRA&sheet=mn_shootings
//https://script.google.com/macros/s/AKfycbwG7mX6qPZaIhkwY2AJ2lU7kNarbm6OWIkWVfnmYZGYruIl40cu/exec?id=1T-Du1geFfuspEYGF_U0531mLTJ0ehbA5YbaFCxgmkRA&sheet=yearChart
//https://script.google.com/macros/s/AKfycbwG7mX6qPZaIhkwY2AJ2lU7kNarbm6OWIkWVfnmYZGYruIl40cu/exec?id=1T-Du1geFfuspEYGF_U0531mLTJ0ehbA5YbaFCxgmkRA&sheet=raceChart

//THESE LOAD DIFFERENT TABS OF THE GOOGLE SHEET INTO SEPERATE JSON STRINGS, USING THE ACTUAL URLS
<?php

$jsonDataShootings = file_get_contents("https://script.googleusercontent.com/macros/echo?user_content_key=gzHCZ7kiey1SMM5PgBsM3CMeEa4NGwiyFa2FU8DnUoYjQIKgjsJFAGwT7SqIrwFV-EqtN7Cx_xlY8kVRmstDxBon1OqOrn1NOJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMWojr9NvTBuBLhyHCd5hHaxCoMjMSmZWLp6XAShvjQj50JtCfh4yP7n1RnEoDeOH7XqmOXgX8RYIyMAhIAtjnF9UDzNXGLr6TTWRPEfSfzbJF18UG-xWdHYR7bDcausFkqDGusCOyHu-vlnNWYFTCZLrx7oAt3qWx35iDyrfKhrpOMLCYDptcpnMxR0xLFGFK&lib=MVcLnEUipyThKZcpmQKyqT_CoSfd4egCX");
$jsonDataYear = file_get_contents("https://script.googleusercontent.com/macros/echo?user_content_key=tNF6_if_WpQAvlnIwRWIHBHNBcOQ82hB8rzcScLoXpi_4W6d84eUeNWyXA8NKNBB4DWz53L3bhAVl38Pz93wBsrUsEnuNKBWOJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMWojr9NvTBuBLhyHCd5hHaxCoMjMSmZWLp6XAShvjQj50JtCfh4yP7n1RnEoDeOH7XqmOXgX8RYIyMAhIAtjnF9UDzNXGLr6TTWRPEfSfzbJF18UG-xWdHYR7bDcausFkqDGusCOyHu-vlnNWYFTCZLrx7oAt3qWx9WKnAm96yZmfHc12uQ5hug&lib=MVcLnEUipyThKZcpmQKyqT_CoSfd4egCX");
$jsonDataRace = file_get_contents("https://script.googleusercontent.com/macros/echo?user_content_key=1o5js0t1-i_wvGK8iMjzk2xR5auHvAWz3S9omyswRYuc-g_Zqf9Hd8ftf-teZu-RxUlpYxtPQRoVl38Pz93wBkgelLHZJDxkOJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMWojr9NvTBuBLhyHCd5hHaxCoMjMSmZWLp6XAShvjQj50JtCfh4yP7n1RnEoDeOH7XqmOXgX8RYIyMAhIAtjnF9UDzNXGLr6TTWRPEfSfzbJF18UG-xWdHYR7bDcausFkqDGusCOyHu-vlnNWYFTCZLrx7oAt3qWxxcG-w52aeuSr4afipWyPHw&lib=MVcLnEUipyThKZcpmQKyqT_CoSfd4egCX");

?>

//THESE ADD THEM TO JAVASCRIPT VARIABLES WE CAN ACCESS THROUGHOUT THE DOCUMENT
var dataLoadShootings = <?php echo $jsonDataShootings; ?>;
var dataLoadYear = <?php echo $jsonDataYear; ?>;
var dataLoadRace = <?php echo $jsonDataRace; ?>;

dataShootings = dataLoadShootings.mn_shootings;
dataYear = dataLoadYear.yearChart;
dataRace = dataLoadRace.raceChart;

$('#bigNumber').html(dataShootings.length);
$('#results').html(dataShootings.length);

//SCROLLBOX
var scrolled=0;
$(document).ready(function(){

$("#downClick").on("click" ,function(){
if ((scrolled+200) <= 27800) { scrolled=scrolled+200; }
 $("#deathsTable").animate({ scrollTop: scrolled });
    });

$("#upClick").on("click" ,function(){
if ((scrolled-200) >=0) { scrolled=scrolled-200;  }
 $("#deathsTable").animate({ scrollTop: scrolled });
  });

});
</script>
<script>
//POPULATE TABLE
    d3.select("#deathsTable").selectAll(".card")
.data(dataShootings).enter().append("div")
.attr("class","card")
.html(function (d){ return "<div class='leftSide'><div class='name'>" + d.FirstName + " " + d.LastName + " " + d.Suffix + "</div><div class='stats'>" + d.AgeYears + " &#8226; " + d.Race + " &#8226; " + d.Gender + " &#8226; " + d.Occupation +  " &#8226; " + d.ResCity + " " + d.ResState + "</div><div class='description_chatter'>" + d.StribNarrative + "</div><div class='location'>Incident date " + d3.time.format("%Y-%m-%d")(new Date(d.DeathDate)) + " &#8226; " + d.InjuryCity + " &#8226; " + d.Agency + "</div><div class='ruling'>Weapon: " + d.Weapon + " &#8226 Ruling: " + d.MannerDeath + "</div><div class='url'><a href='" + d.URL + "' target='new_'>Read more</a></div></div><div class='rightSide'><div class='photo'><img src='" + d.photo + "' /></div></div><div class='weaponType'>" + d.WeaponCategory + "</div><div class='region'>" + d.Region + "</div><div class='break'></div>";});

//SEARCH FILTER TABLE
  $( document ).ready(function() {
     $('#filter_box').keyup(function(i){
        $('.card').hide();
        var txt = $('#filter_box').val();
        $('.card').each(function(){
           if($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1){
               $(this).show();
           }
        });
        var count = $('.card:visible').length;
        $('#results').html(count);
    });
});
</script>

<script>
$.getJSON('shapefiles/counties.json', function(counties) {

//FILTER STUFF
$( document ).ready(function() {
$( ".filter" ).each(function( index ) {
  $(this).find(".count").text(countStats(".card .stats, .card .ruling",$(this).attr("data")));
  var pct = Math.round((Number($(this).find(".count").text()) / dataShootings.length) * 100);
  $(this).find("a").css("background","#ddd");
  $(this).find("a").css("color","#333");
  $(this).find("a").css("margin-right",(70 - pct) + "%");
  $(this).find("a").css("width",(pct) + "%");
  $(this).css("margin","5px");
});

$( ".filter2" ).each(function( index ) {
  $(this).find(".count").text(countStats(".weaponType",$(this).attr("data")));
  var pct = Math.round((Number($(this).find(".count").text()) / dataShootings.length) * 100);
  $(this).find("a").css("background","#ddd");
  $(this).find("a").css("color","#333");
  $(this).find("a").css("margin-right",(70 - pct) + "%");
  $(this).find("a").css("width",(pct) + "%");
  $(this).css("margin","5px");
});

$( ".filter3" ).each(function( index ) {
  $(this).find(".count").text(countStats(".region",$(this).attr("data")));
  var pct = Math.round((Number($(this).find(".count").text()) / dataShootings.length) * 100);
  $(this).find("a").css("background","#ddd");
  $(this).find("a").css("color","#333");
  $(this).find("a").css("margin-right",(70 - pct) + "%");
  $(this).find("a").css("width",(pct) + "%");
  $(this).css("margin","5px");
});


function countStats(target, text){
 return $(target).filter(function() { return $(this).text().toUpperCase().indexOf(text.toUpperCase()) != -1 }).length;
}
});

$(".filter").on('click',function(){

  highlightMarkers(deaths,$(this).attr("metric"),$(this).attr("data"));

   $('#filter_box').val("");

        $('.card').hide();
        var txt = $(this).attr("data");
        $('.card .stats, .card .ruling').each(function(){
           if($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1){
               $(this).parent().parent().show();
           }
        });
        var count = $('.card:visible').length;
        $('#results').html(count);
  });

$(".filter2").on('click',function(){

  highlightMarkers(deaths,$(this).attr("metric"),$(this).attr("data"));

   $('#filter_box').val("");

        $('.card').hide();
        var txt = $(this).attr("data");
        $('.weaponType').each(function(){
           if($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1){
               $(this).parent().show();
           }
        });
        var count = $('.card:visible').length;
        $('#results').html(count);
  });

$(".filter3").on('click',function(){

  highlightMarkers(deaths,$(this).attr("metric"),$(this).attr("data"));

   $('#filter_box').val("");

        $('.card').hide();
        var txt = $(this).attr("data");
        $('.region').each(function(){
           if($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1){
               $(this).parent().show();
           }
        });
        var count = $('.card:visible').length;
        $('#results').html(count);
  });


$("#all").on('click',function(){
  highlightMarkers(deaths,"all","")

        $('.card').show();
        var count = $('.card:visible').length;
        $('#results').html(count);
  });

//INITIALIZE MAP
var mapBounds = new L.LatLngBounds(
              new L.LatLng(39.1982, -128.1445),
              new L.LatLng(50.5414, -68.2031));

L.mapbox.accessToken = 'pk.eyJ1Ijoic2hhZG93ZmxhcmUiLCJhIjoiODRHdjBSWSJ9.lF4ymp-69zdGvZ5X4Tokzg';
  var map = L.mapbox.map('map', 'mapbox.light', { maxZoom: 10, minZoom: 5, bounds: mapBounds})
    .setView([46.358056, -94.200833], 5);

// map.dragging.disable();
map.touchZoom.disable();
map.doubleClickZoom.disable();
map.scrollWheelZoom.disable();

var deaths = L.geoJson(null, { pointToLayer: scaledPoint }).addTo(map);

function scaledPoint(feature, latlon) {
        return L.circleMarker(latlon, {radius: 5, color:"#8C101C", weight:1, opacity:1});
  }

for (var i = 0; i < dataShootings.length; i++){
  var geojson = [
  {
    "type": "Feature",
    "geometry": {
      "type": "Point",
      "coordinates": [dataShootings[i].Longitude, dataShootings[i].Latitude]
    },
    "properties": {
      "region": dataShootings[i].Region,
      "name": dataShootings[i].FirstName + " " + dataShootings[i].LastName,
      "address": dataShootings[i].IncidentAddress,
      "race": dataShootings[i].Race,
      "date": dataShootings[i].InjuryDate,
      "department": dataShootings[i].Agency,
      "weapon": dataShootings[i].WeaponCategory,
      "gender": dataShootings[i].Gender,
      "manner": dataShootings[i].MannerDeath
    }
  }
];

  deaths.addData(geojson);
}

countyLayer = L.geoJson(counties,  {
      style: getStyle
  }).addTo(map);

  function getStyle(feature,year) {
      return {
          weight: .2,
          opacity: 1,
          color: '#333',
          fillOpacity: 0,
          fillColor: '#fff'
      };
  }

  function highlightMarkers(markers,metric,value){
 markers.eachLayer(function (layer) { 
  if (metric=="all"){ layer.setStyle({radius: 5, color:"#8C101C", weight:1, opacity:1, "fillOpacity":.3});  }
  else {
    if (metric=="region") { var string = layer.feature.properties.region; }
    else if (metric=="race") { var string = layer.feature.properties.race; }
    else if (metric=="weapon") { var string = layer.feature.properties.weapon; }
    else if (metric=="manner") { var string = layer.feature.properties.manner; }
    else if (metric=="gender") { var string = layer.feature.properties.gender; }

    if(string.toUpperCase() == value.toUpperCase()) {    
        layer.setStyle({"opacity":1,"fillOpacity":.3}); 
      }
    else {    
        layer.setStyle({"opacity":0,"fillOpacity":.0}); 
      }
  }

    });

   if (value == "minneapolis") { map.setView([44.983333, -93.266667], 10); }
   else if ((value == "st. paul") || (value == "black")) { map.setView([44.944167, -93.093611], 9); }
   else if ((value == "metro") || (value == "asian") ) { map.setView([44.944167, -93.093611], 8); }
   else { map.setView([46.358056, -94.200833], 5); }
}

});
</script>


<script>
var padding = {
        top: 40,
        right: 40,
        bottom: 30,
        left: 60
    };

var chart_year = c3.generate({
        bindto: '#yearChart',
        padding: padding,
        data: {
            json: dataYear,
            keys: {
                x: 'year', 
                value: ["deaths"]
            },
            type: 'bar',
            names: {
              'deaths': 'Deaths'
            }
        }, 
        bar: { width: { ratio: 0.2 } },  
        color: { pattern: ['#8C101C'] },
        axis: {
            x: {
               // type: 'category',
               tick: { fit: true, values: ['2003', '2008', '2012', '2015'] }
            },
             y : {
              tick: {  values: ['2', '4', '6', '10', '8', '12'] },
              padding: {top: 0, bottom: 0} 
        }
       }
    });

var chart_race = c3.generate({
        bindto: '#raceChart',
        padding: padding,
        data: {
            json: dataRace,
            keys: {
                x: 'race', 
                value: ["pop_pct","deaths_pct"]
            },
            type: 'bar',
            names: {
              'pop_pct': 'MN Population',
              'deaths_pct': 'Deaths'
            }
        }, 
        bar: { width: { ratio: 0.7 } },  
        color: { pattern: ['#333',"#8C101C"] },
        axis: {
            x: {
               type: 'category'
            },
            y : {
              tick: { format: d3.format("%") },
              padding: {top: 0, bottom: 0} 
        }
       }
    });
</script>

<script type="text/javascript">
      
      function DropDown(el) {
        this.dd = el;
        this.placeholder = this.dd.children('span');
        this.opts = this.dd.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
      }
      DropDown.prototype = {
        initEvents : function() {
          var obj = this;

          obj.dd.on('click', function(event){
            $(this).toggleClass('active');
            return false;
          });

          obj.opts.on('click',function(){
            var opt = $(this);
            obj.val = opt.text();
            obj.index = opt.index();
            obj.placeholder.text(obj.val);
          });
        },
        getValue : function() {
          return this.val;
        },
        getIndex : function() {
          return this.index;
        }
      }

      $(function() {

        var dd = new DropDown( $('#dd') );
        var dd2 = new DropDown( $('#ddY') );

        $(document).click(function() {
          // all dropdowns
          $('.wrapper-dropdown-1').removeClass('active');
        });

      });

</script>

</html>