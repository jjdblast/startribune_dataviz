<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Metro Area Rental Housing Trends</title>
  <meta name="description" content="Metro Area Rental Housing Trends">
  <meta name="author" content="Frey Hargarten - StarTribune">

  <link href="../_common_resources/charts/c3-master/c3.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../_common_resources/styles/startribune_dataviz_styles.css" />
  
  <style>
  #wrapper { text-align:center; width:100%; }
  #map { width:100%; height:342px; text-align:center; }
  .tableHead { display:inline-block; padding:10px; border-bottom:1px solid #ddd; font-weight:900; font-family:"Poynter Serif RE"; }
  .tableCell { display:inline-block; padding:10px; border-bottom:1px solid #ddd; font-family:"Benton Sans"; }
  .tableBreak { clear:both; display:block; }
  .table { text-align:center; width:100%; overflow-x:hidden; overflow-y:auto; height:670px; }
  #table { font-size:.7em; height:700px; overflow-x:hidden; overflow-y:auto; }
  .change, .pct { font-weight:900; width:20%; }
  .cityCell { width:40%; }
  .rents { width:20%; }

  .switch { padding:10px; display:inline-block; text-align:center; width:49.5%; background-color:#fff; font-weight:900; font-family:"Benton Sans",Helvetica,Arial,sans-serif; border:1px solid black; }
  .switch:hover, .selected, .city:hover, .rSort:hover { background-color:#333; color:#fff !important; cursor:pointer; }

  #infobox { font-family:"Poynter Serif RE",Georgia,Times,serif; font-size:1.2em; font-weight:900; }

  .zoom { float:none !important; text-align:center; }

  small { font-family:"Benton Sans",Helvetica,Arial,sans-serif; color:#808080; clear:both; display:block; }
  .legends { width:315px; height:auto; text-align:center; margin-right:auto; margin-left:auto; }

  #filter input, #filter input:focus { width:99% !important; border-radius:0 !important; }

  .negDark { fill:#752304; background-color:#752304; color:#fff; }
  .negMid { fill:#BF5F3C; background-color:#BF5F3C; color:#fff; }
  .negLight { fill:#E28765; background-color:#E28765; }
  .neutral { fill:#ddd; background-color:#ddd; }
  .posLight { fill:#94D181; background-color:#94D181; }
  .posMid { fill:#67AF50; background-color:#67AF50; color:#fff; }
  .posDark { fill:#24680E; background-color:#24680E; color:#fff; }

  .chartBar { fill:#636363; background-color:#636363; color:#fff;}

  #leftSide { float:left; width:48%; }
  #rightSide { float:right; width:48%; }
  #rentalChange { text-align:center; }
  #infobox, .chartTitle { text-align:center; }

  #chart .c3-chart-line { stroke-width: 3px !important; }
    
  @media (max-width: 750px) {
  #leftSide, #rightSide { float:none; width:100%; }
  #table { height:120px; }
  .chartTitle { font-size:1em; }
  }

  </style> 
</head>

<body>
  <div id="wrapper">

<div class="chartTitle">Change in affordable rental units 2000 to 2014</div>

<div id="rightSide">

<div id="filter" class="filter"><input type="search" class="filter_box" placeholder="Search by city"></input></div>

<div id="table"><div class='tableHead rSort cityCell' data="city">City or Township</div><div class='tableHead rSort selected rents' data="units">Units</div><div class='tableHead rSort pct' data="under50">Units <50%</div><div class='tableHead rSort pct' data="under80">Units <80%</div></div>
</div>

</div>

<div id="leftSide">
<div class="breaker"></div>
  <div class="legends">
    <div class="legendContainer">
      <span class='legend'>
        <nav class='legend clearfix'>
          <span style='background:#fff;'>-</span>
          <span class='negDark'></span>
          <span class='negMid'></span>
          <span class='negLight'></span>
          <span class='neutral'></span>
          <span class='posLight'></span>
          <span class='posMid'></span>
          <span class='posDark'></span>
          <span style='background:#fff;'>+</span>
        </nav>
      </span>
    </div>
    <small>Change in affordable rental units</small>
  </div>

<div id="map"><svg width="320" height="350" viewBox="0 0 500 450" preserveAspectRatio="xMidYMid"></svg></div>

<div id="infobox">Metro Area</div>

<div id="rentalChange"><div class='negDark'>-8,874 affordable rental units</div></div>

<div class="breaker"></div>

<div class="zoom">Reset View</div>

<div class="chartTitle">Cost-burdened households 1990-2014</div>
<div class="chart" id="chart"></div>

</div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
<script src="../_common_resources/charts/c3-master/c3.min.js"></script>
<script>
//LIVE JSON MAGIC

//https://script.google.com/macros/s/AKfycbwG7mX6qPZaIhkwY2AJ2lU7kNarbm6OWIkWVfnmYZGYruIl40cu/exec?id=1rHKgLz3z8LSR-J01DthEeTF9dACUeu07zRrEwZlaZDw&sheet=rentalHousing
//https://script.google.com/macros/s/AKfycbwG7mX6qPZaIhkwY2AJ2lU7kNarbm6OWIkWVfnmYZGYruIl40cu/exec?id=1rHKgLz3z8LSR-J01DthEeTF9dACUeu07zRrEwZlaZDw&sheet=costBurden

// d3.json("https://script.googleusercontent.com/macros/echo?user_content_key=rQzCXJq4rcfGS8yaKn5HXqX8RzF0eqQiSCoJyDp2-LGljUpp8j4hOmu-Wjh8HgLpA0CoDeOPuofM2HNpbQXnRNPSQhlE21exOJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMWojr9NvTBuBLhyHCd5hHaxCoMjMSmZWLp6XAShvjQj50JtCfh4yP7n1RnEoDeOH7XqmOXgX8RYIyMAhIAtjnF9UDzNXGLr6Ts_fM-mz4kt323wbruCqK76UkZUXmxMeLKGzzrp83SjM82FqFM4PeCCPY8msxNzbMxcG-w52aeuSk1DkS8Q3sDBV3VJT4khz1&lib=MVcLnEUipyThKZcpmQKyqT_CoSfd4egCX", function(error, json) {
// d3.json("https://script.googleusercontent.com/macros/echo?user_content_key=uVCkNiIaKC8W8WaTyN8_WVNw5A3ZCdsLJOeTpoReZZdkGo4vMqFTUG9bBBMzlNx2RdJWyx_QQ13M2HNpbQXnRKoeeMadDvy7OJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMWojr9NvTBuBLhyHCd5hHaxCoMjMSmZWLp6XAShvjQj50JtCfh4yP7n1RnEoDeOH7XqmOXgX8RYIyMAhIAtjnF9UDzNXGLr6Ts_fM-mz4kt323wbruCqK76UkZUXmxMeLKGzzrp83SjM82FqFM4PeCCPY8msxNzbMW0Ar8EAym2-kGLV5VE4_khu0XK1b9qtD&lib=MVcLnEUipyThKZcpmQKyqT_CoSfd4egCX", function(error, json2) {

// var dataHousing = json.rentalHousing;
// var dataBurden = json2.costBurden;

<?php

$jsonDataHousing = file_get_contents("https://script.googleusercontent.com/macros/echo?user_content_key=rQzCXJq4rcfGS8yaKn5HXqX8RzF0eqQiSCoJyDp2-LGljUpp8j4hOmu-Wjh8HgLpA0CoDeOPuofM2HNpbQXnRNPSQhlE21exOJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMWojr9NvTBuBLhyHCd5hHaxCoMjMSmZWLp6XAShvjQj50JtCfh4yP7n1RnEoDeOH7XqmOXgX8RYIyMAhIAtjnF9UDzNXGLr6Ts_fM-mz4kt323wbruCqK76UkZUXmxMeLKGzzrp83SjM82FqFM4PeCCPY8msxNzbMxcG-w52aeuSk1DkS8Q3sDBV3VJT4khz1&lib=MVcLnEUipyThKZcpmQKyqT_CoSfd4egCX");
$jsonDataBurden = file_get_contents("https://script.googleusercontent.com/macros/echo?user_content_key=uVCkNiIaKC8W8WaTyN8_WVNw5A3ZCdsLJOeTpoReZZdkGo4vMqFTUG9bBBMzlNx2RdJWyx_QQ13M2HNpbQXnRKoeeMadDvy7OJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMWojr9NvTBuBLhyHCd5hHaxCoMjMSmZWLp6XAShvjQj50JtCfh4yP7n1RnEoDeOH7XqmOXgX8RYIyMAhIAtjnF9UDzNXGLr6Ts_fM-mz4kt323wbruCqK76UkZUXmxMeLKGzzrp83SjM82FqFM4PeCCPY8msxNzbMW0Ar8EAym2-kGLV5VE4_khu0XK1b9qtD&lib=MVcLnEUipyThKZcpmQKyqT_CoSfd4egCX");

?>

//THESE ADD THEM TO JAVASCRIPT VARIABLES WE CAN ACCESS THROUGHOUT THE DOCUMENT
var dataLoadHousing = <?php echo $jsonDataHousing; ?>;
var dataLoadBurden = <?php echo $jsonDataBurden; ?>;

var dataHousing = dataLoadHousing.rentalHousing;
var dataBurden = dataLoadBurden.costBurden;

var aspect = 440 / 300, chart = $("#map svg");
$(window).on("resize", function() {   
  var targetWidth = chart.parent().width();   
  chart.attr("width", targetWidth);   
  chart.attr("height", targetWidth / aspect);
});

$(window).on("load", function() {   
  var targetWidth = chart.parent().width();   
  chart.attr("width", targetWidth);   
  chart.attr("height", targetWidth / aspect);
});

$(".rSort").click(function() {
  $(".rSort").removeClass("selected");
  $(this).addClass("selected");
  if ($(this).hasClass("toggled")) { $(this).removeClass("toggled"); var sorted = "ascend"; }
  else if ($(this).hasClass("selected")) { $(this).addClass("toggled"); var sorted ="descend"; } 
  tableSort("#table","housing",dataHousing,$(this).attr("data"),sorted);
});

function tableSort(container,party,data,sortBy,sorted){
   
  d3.select(container).selectAll(".card").sort(function(a, b) {
      if (sortBy == "under50") { 
        if (sorted == "descend") { return d3.descending(a.under_50pct_change2014, b.under_50pct_change2014); }
        if (sorted == "ascend") { return d3.ascending(a.under_50pct_change2014, b.under_50pct_change2014); }
     }
      if (sortBy == "under80") { 
        if (sorted == "descend") { return d3.descending(a.under_80pct_change2014, b.under_80pct_change2014); }
        if (sorted == "ascend") { return d3.ascending(a.under_80pct_change2014, b.under_80pct_change2014); }
     }
      if (sortBy == "city") {
        if (sorted == "descend") { return d3.descending(a.Citytownship, b.Citytownship); }
        if (sorted == "ascend") { return d3.ascending(a.Citytownship, b.Citytownship); }
     }
    if (sortBy == "units") {
        if (sorted == "descend") { return d3.descending(a.Totalrental_2014, b.Totalrental_2014); }
        if (sorted == "ascend") { return d3.ascending(a.Totalrental_2014, b.Totalrental_2014); }
     }
    })
    .transition().duration(500);
}

function tableBuild(container,race,data,state,county,index){

if (race == "senate") { var select = "districtS"; }
if (race == "house") { var select = "districtH"; }

d3.select(container).selectAll(".card")
.data(data).enter().append("div")
.attr("class","card")
.html(function (d){ 
    return "<div class='tableCell city cityCell'>" + d.Citytownship + "</div><div class='tableCell units rents'>" + d3.format(",")(d.Totalrental_2014) + "</div><div class='tableCell change'>" + d.under_50pct_change2014 + "</div><div class='tableCell change'>" + d.under_80pct_change2014 + "</div>";
});

$(".city").click(function() {
 $(".city").removeClass("selected");
 $(this).addClass("selected");

  $("#infobox").html($(this).text());

  jQuery.fn.d3Click = function () {
  this.each(function (i, e) {
    var evt = document.createEvent("MouseEvents");
    evt.initMouseEvent("click", true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);

    e.dispatchEvent(evt);
  });
};

jQuery.fn.d3Down = function () {
  this.each(function (i, e) {
    var evt = document.createEvent("MouseEvents");
    evt.initMouseEvent("mousedown", true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);

    e.dispatchEvent(evt);
  });
};

jQuery.fn.d3Up = function () {
  this.each(function (i, e) {
    var evt = document.createEvent("MouseEvents");
    evt.initMouseEvent("mouseup", true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);

    e.dispatchEvent(evt);
  });
};

    var findDistrict = $(this).text();
    $("[id='" + findDistrict.replace(new RegExp(" ", "g"),"-") + "']").d3Down();
    $("[id='" + findDistrict.replace(new RegExp(" ", "g"),"-") + "']").d3Up();
    $("[id='" + findDistrict.replace(new RegExp(" ", "g"),"-") + "']").d3Click();
});


  $(".change").each(function() {
      var num = $(this).text();
      if (num >= .70) { $(this).addClass("posDark"); $(this).html(d3.format("+%")(num)); }
      else if (num >= .50) { $(this).addClass("posMid"); $(this).html(d3.format("+%")(num)); } 
      else if (num > 0) { $(this).addClass("posLight"); $(this).html(d3.format("+%")(num)); }
      else if (num < -.70) { $(this).addClass("negDark"); $(this).html(d3.format("+%")(num)); }
      else if (num < -.50) { $(this).addClass("negMid"); $(this).html(d3.format("+%")(num)); }
      else if (num < 0) { $(this).addClass("negLight"); $(this).html(d3.format("+%")(num)); }
      else if (num == 0) { $(this).addClass("neutral"); $(this).html(d3.format("+%")(num)); }
  });

}

$( document ).ready(function() {
     $('#filter input').keyup(function(i){
        $('.card').hide();
        var txt = $(this).val();
        $('.card').each(function(){
           if($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1){
               $(this).show();
           }
        });
    });

});

//CHART
var  padding = {
        top: 20,
        right: 40,
        bottom: 20,
        left: 40,
    };

var chart = c3.generate({
        bindto: '#chart',
        size: { height: 200 },
        padding: padding,
        data: {
        x: 'x',
        columns: [
            ['x', "1990", "2000", "2005-2009", "2010-2014"],
            ['Metro', .26, .24, .35, .32]
        ]
        },
       bar: {
        width: {
            ratio: 0.5 // this makes bar width 50% of length between ticks
        }
      },
        axis: {
          y: {
            tick: {
             max: .45,
             min: 0,
             count: 3,
             format: d3.format('%')
            }
        },
        x: {
            type: 'category',
            tick: {
                // format: '%Y',
                count: 3,
                multiline: false
            }
          }
        },
      subchart: { show: false },
        color: { pattern: ['#666'] },
    });

var previous = "Metro";

function redrawChart(chart,county,dataCompare){

  var y1990, y2000, y2009, y2014 = 0;
  var found = false;

    for (var i=0; i<dataCompare.length; i++){
    if (county == dataCompare[i].city) {
      y1990 = dataCompare[i].y1990;
      y2000 = dataCompare[i].y2000;
      y2009 = dataCompare[i].y2005_2009;
      y2014 = dataCompare[i].y2010_2014;
      found = true;
      break;
    }
  }

if (found == true){
chart.load({
        columns: [
            [county, y1990, y2000, y2009, y2014]
        ],unload: [previous]
        });

previous = county;
}
else { chart.unload(); }

}

//MAPOCALYPSE
function mapStats(d, race, dataCompare){

}

function mapColor(d, race, dataCompare){
  for (var i=0; i<dataCompare.length; i++){
    if (d == dataCompare[i].Citytownship) {
      if (dataCompare[i].under_50pct_change2014_num > 1000) { return "posDark"; }
      else if (dataCompare[i].under_50pct_change2014_num > 400) { return "posMid"; }
      else if (dataCompare[i].under_50pct_change2014_num > 0) { return "posLight"; }
      else if (dataCompare[i].under_50pct_change2014_num < -1000) { return "negDark"; }
      else if (dataCompare[i].under_50pct_change2014_num < -100) { return "negMid"; }
      else if (dataCompare[i].under_50pct_change2014_num < 0) { return "negLight"; }
      else if (dataCompare[i].under_50pct_change2014_num == 0) { return "neutral"; }
    }
  }
}

function mapTips(d, subject, dataCompare){
    for (var i=0; i<dataCompare.length; i++){
    if (d.properties.COCTU_DESC == dataCompare[i].Citytownship) {
      return "<div><strong>" + d.properties.COCTU_DESC + "</strong></div>" + "<div class='" + mapColor(d.properties.COCTU_DESC, subject, dataCompare) + "'>" + d3.format("+,")(dataCompare[i].under_50pct_change2014_num) + " affordable rental units</div>";
  }
 }
  return "<div><strong>" + d.properties.COCTU_DESC + "</strong></div>";
}

function mapBuild(container, boxContainer, chartContainer, shape, race, geo, dataCompare, index) {

var width = 450,
    height = 350,
    centered;

if (geo=="us") { var projection = d3.geo.albersUsa().scale(700).translate([330, 200]); }
else if (geo=="mn") { var projection = d3.geo.albersUsa().scale(5037).translate([50, 970]); }
else if (geo=="metro") { var projection = d3.geo.mercator().scale([16800]).center([-92.367554,44.894796]); }

var path = d3.geo.path()
    .projection(projection);

var svg = d3.select(container + " svg")
    .attr("width", width)
    .attr("height", height);

svg.append("rect")
    .attr("class", "background")
    .attr("width", width)
    .attr("height", height);

var g = svg.append("g");

d3.json("shapefiles/" + shape, function(error, us) {

  g.append("g")
      .attr("class", "states")
    .selectAll("path")
      .data(us.features)
    .enter().append("path")
      .attr("d", path)
      .on("click", clicked)
      .attr("id", function(d) { var str = d.properties.COCTU_DESC; return str.replace(new RegExp(" ", "g"),"-"); })
      .attr("precinctName", function(d){ return d.properties.COCTU_DESC })
      .attr("class", function(d){
         return mapColor(d.properties.COCTU_DESC, race, dataCompare);
        })
       .on("mousedown", function(d, i){   
        $('#infobox').html(d.properties.COCTU_DESC);
            for (var i=0; i<dataCompare.length; i++){
    if (d.properties.COCTU_DESC == dataCompare[i].Citytownship) {
        $("#rentalChange").html("<div class='" + mapColor(d.properties.COCTU_DESC, race, dataCompare) + "'>" + d3.format("+,")(dataCompare[i].under_50pct_change2014_num) + " affordable rental units</div>")
      }
    }

        redrawChart(chart,d.properties.COCTU_DESC,dataBurden);

        $('.card').hide();
        var txt = d.properties.COCTU_DESC;
        $('.card').each(function(){
           if($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1){
               $(this).show();
           }
        });

       })
      .style("stroke-width", 1.5)
      // .style("stroke", "#fff")
      .call(d3.helper.tooltip(function(d, i){
        return mapTips(d, race, dataCompare);
      }));

  g.append("path")
      //.datum(topojson.mesh(us, us.features, function(a, b) { return a !== b; }))
      .attr("id", "state-borders")
      .attr("d", path);

});

var zoom = d3.behavior.zoom()
    .on("zoom",function() {
        g.attr("transform","translate("+ 
            d3.event.translate.join(",")+")scale("+d3.event.scale+")");
        g.selectAll("circle")
            .attr("d", path.projection(projection));
        g.selectAll("path")  
            .attr("d", path.projection(projection)); 

  });

$(".zoom").click(function() {
  clicked2();
  $('#infobox').html("Metro Area");
  $(".card").show();
  $(".city").removeClass("selected");
  $("#rentalHousing").html("<div class='negDark'>-8,874 affordable rental units</div>");
  redrawChart(chart,"Metro",dataBurden);
});

function clicked(d) {
  var x, y, k;

  if (d && centered !== d) {
    var centroid = path.centroid(d);
    x = centroid[0];
    y = centroid[1];
    k = 6;
    centered = d;
  } else {
    x = width / 2;
    y = height / 2;
    k = 3;
    centered = null;
  }

  g.selectAll("path")
      .classed("faded", true)
      .classed("active", centered && function(d) { return d === centered; });

  // g.transition()
  //     .duration(750)
  //     .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")scale(" + k + ")translate(" + -x + "," + -y + ")")
  //     .style("stroke-width", 1.5 / k + "px");
}

function clicked2(d) {
  var x, y, k;

  if (d && centered !== d) {
    var centroid = path.centroid(d);
    x = centroid[0];
    y = centroid[1];
    k = 1;
    centered = d;
  } else {
    x = width / 2;
    y = height / 2;
    k = 1;
    centered = null;
  }

  g.selectAll("path")
      .classed("faded", false)
      .classed("active", centered && function(d) { return d === centered; });

  // g.transition()
  //     .duration(750)
  //     .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")scale(" + k + ")translate(" + -x + "," + -y + ")")
  //     .style("stroke-width", 1.5 / k + "px");
}

d3.helper = {};

d3.helper.tooltip = function(accessor){
    return function(selection){
        var tooltipDiv;
        var bodyNode = d3.select('body').node();
        selection.on("mouseover", function(d, i){
            // Clean up lost tooltips
            d3.select('body').selectAll('div.tooltip').remove();
            // Append tooltip
            tooltipDiv = d3.select('body').append('div').attr('class', 'tooltip');
            var absoluteMousePos = d3.mouse(bodyNode);
            tooltipDiv.style('left', (absoluteMousePos[0] + 10)+'px')
                .style('top', (absoluteMousePos[1] - 15)+'px')
                .style('position', 'absolute') 
                .style('z-index', 1001);
            // Add text using the accessor function
            var tooltipText = accessor(d, i) || '';
            // Crop text arbitrarily
            //tooltipDiv.style('width', function(d, i){return (tooltipText.length > 80) ? '300px' : null;})
            //    .html(tooltipText);
        })
        .on('mousemove', function(d, i) {
            // Move tooltip
            var absoluteMousePos = d3.mouse(bodyNode);
            tooltipDiv.style('left', (absoluteMousePos[0] + 10)+'px')
                .style('top', (absoluteMousePos[1] - 15)+'px');
            var tooltipText = accessor(d, i) || '';
            tooltipDiv.html(tooltipText);
        })
        .on("mouseout", function(d, i){
            // Remove tooltip
            tooltipDiv.remove();
        });

    };
};

}

function mapReshade(container, shape, subject, race, dataCompare) {

d3.json("shapefiles/" + shape, function(error, us) {

d3.selectAll(container + " svg g path")
      .data(us.features)
      .attr("class", function(d){

        });

});

}

  mapBuild("#map", "#infoBox", "#chart", "metro_cities.json", "house", "metro", dataHousing, 0);
  tableBuild("#table","house",dataHousing,"Metro","Minneapolis",0);

// });
// });
</script>

</html>