<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Minnesota Weather Explorer</title>
  <meta name="description" content="Minnesota Weather Explorer">
  <meta name="author" content="Jeff Hargarten - StarTribune">

  <link href="js/c3-master/c3.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../_common_resources/styles/startribune_dataviz_styles.css" />
  
  <style>
    .bigTitle { width:90%; margin-left:auto; margin-right:auto; font-family:"Benton Sans",Helvetica,Arial,sans-serif; font-weight:900; font-size:1.5em; text-align:center; padding-bottom:10px; border-bottom:2px solid #ddd; }
    .icon { text-align:center; display:block; }
    .icon img { width:60px; }
    .highlights { text-align:center; }
    .highlightNum { width:180px; font-size:3em; font-family:"Benton Sans",Helvetica,Arial,sans-serif; font-weight:900; display:inline-block; text-align:center; }
    .highlightText { width:180px; display:inline-block; text-align:center; font-family:"Benton Sans",Helvetica,Arial,sans-serif; margin-right:auto; margin-left:auto; }
    .highlightBreak { clear:both; }
    .wrapper-dropdown-1 { width:100%; }
    .wrapper-demo { width:100%; z-index:9000 !important; }
    .blueswatch { color:#407F7F; }
    .lowswatch { color:#E7A9A9; }
    .redswatch { color:#801515; }
    .greyswatch { color:#333; }
    .orangeswatch { color:#AA6C38; }
    .hottest { fill:#a70518; }
    .snowswatch { color:#96ADB0; }
    .windswatch { color:#E7C6A9; }
    .greenswatch { color:#3D813D; }
    .precipswatch { color:#87B887; }
    .summary { vertical-align:top; display:table-cell; }
    #pdf { text-align:center; }
    #monthly { display:none; }
    .monthBar { display:inline-block; padding:10px; margin:20px; width:20%; font-family:"Benton Sans",Helvetica,Arial,sans-serif; font-weight:bold; }
    p a, .l-utility-inner p a { color: #036; text-decoration: underline!important; }
    p a:hover, .l-utility-inner p a:hover { color: #666666; text-decoration: none!important; }
    h3 { font-family:"Benton Sans",Helvetica,Arial,sans-serif; }
  </style> 
</head>

<body>
 <div id="wrapper">

<div id="selector">
  <section class="main">
        <div class="wrapper-demo" style="display:none;">
          <div id="dd" class="wrapper-dropdown-1" tabindex="1">
            <span>Month</span>
              <ul class="dropdown months" tabindex="1">
        <li><a href="#" month="1">January</a></li>
        <li><a href="#" month="2">February</a></li>
        <li><a href="#" month="3">March</a></li>
        <li><a href="#" month="4">April</a></li>
        <li><a href="#" month="5">May</a></li>
        <li><a href="#" month="6">June</a></li>
        <li><a href="#" month="7">July</a></li>
        <li><a href="#" month="8">August</a></li>
        <li><a href="#" month="9">September</a></li>
        <li><a href="#" month="10">October</a></li>
        <li><a href="#" month="11">November</a></li>
        <li><a href="#" month="12">December</a></li>
              </ul>
          </div>
        ​</div>

        <div class="wrapper-demo">
          <div id="ddY" class="wrapper-dropdown-1" tabindex="1">
            <span>Year</span>
              <ul class="dropdown years" tabindex="1">
<!--         <li data='data2012' year='2011'><a href="#">2011</a></li> -->
        <li data='data2012' year='2012'><a href="#">2012</a></li>
        <li data='data2013' year='2013'><a href="#">2013</a></li>
        <li data='data2014' year='2014'><a href="#">2014</a></li>
        <li data='data2015' year='2015'><a href="#">2015</a></li>
              </ul>
          </div>
        ​</div>
</section>
</div>

<div id="pdf">
<h3>Annual breakdowns (PDF)</h3>
<p><b><b> <a href="http://stmedia.startribune.com/documents/2003+yearend+wx.pdf">2003</a> * <a href="http://stmedia.startribune.com/documents/2004+yearend+wx.pdf">2004</a> * <a href="http://stmedia.startribune.com/documents/2005+yearend+wx.pdf">2005</a> * <a href="http://stmedia.startribune.com/documents/2006+yearend+wx.pdf">2006</a> * <a href="http://stmedia.startribune.com/documents/2007+Yearend+wx.pdf">2007</a> * <a href="http://stmedia.startribune.com/documents/2008+yearend+wx.pdf">2008</a> * <a href="http://stmedia.startribune.com/documents/2009+yearend+wx.pdf">2009</a> * <a href="http://stmedia.startribune.com/documents/2010+yearend+wx.pdf">2010</a> * <a href="http://stmedia.startribune.com/documents/2011+yearend+wx.pdf">2011</a> * <a href="http://stmedia.startribune.com/documents/2012+yearend+wx.pdf">2012</a> * <a href="http://stmedia.startribune.com/documents/2013+yearend+wx.pdf">2013</a> * <a href="http://stmedia.startribune.com/documents/2014_yearend_wx.pdf">2014</a> * <a href="data/3YearEndWX2015.pdf">2015</a></b></b></p>
</div>

<div class="chatter" style="text-align:center;margin:10px">Chart values can be toggled using the legends. Time periods can be isolated with the scrubber below each chart.</div>

<div id="monthly" class="block">
<div class="chartTitle">Monthly weather summaries for <span class="thisYear">2015</span></div>
<div class="monthBar" id="january">January<div class="summary chatter">
The year got off to a cold start, with a minus-11 reading in the Twin Cities on Jan. 5. That was the lowest temp of the year, which was matched twice in February. Strong winds, low temps and snow combined to close many public schools and even some highways Jan. 7-8. In the Twin Cities, the high on Jan. 7 was 1-below. Some locations in the Arrowhead never got above 15-below. And while snow began to deepen Up North, little fell in the Twin Cities, where highs from midmonth on were consistently near or above freezing. The month’s high of 45 came on Jan. 26, smack in the middle of the St. Paul Winter Carnival. 
</div></div>
<div class="monthBar" id="february">February<div class="summary chatter">
The “easy winter” was
derailed by a month that
was 9.7 degrees below
normal in the Twin Cities,
pulling the average
temp for DecemberFebruary
down to 1.7
degrees below normal.
The month had 12 of the
season’s 28 subzero days,
including minus-11 readings
Feb. 19 and Feb. 23.
Cotton, north of Duluth,
plummeted to 42-below
on Feb. 19. That reading,
the state’s lowest all winter,
came during a stretch
of weather that was the
coldest in nearly 50 years
across the Northland. In
the Twin Cities, snowfall
continued to run about
60 percent of normal. 
</div></div>
<div class="monthBar" id="march">March<div class="summary chatter">
The shivering continued.
Duluth’s high of 3 degrees on
March 4 was the chilliest ever
for the date. But in less than
a week (March 10), the Twin
Cities had a high of 66, tying
a record for the date. That
led a 10-day “warm wave,”
which brought a record 70 to
the Twin Cities on March 15.
Lake Shetek in southwestern
Minnesota’s Murray County
went ice-free March 19,
more than two weeks earlier
than the median date in
55 years of record keeping.
Then the deepest snowfall
of the season for many areas
came March 22-23, with up
to 10 inches from the southern
Twin Cities suburbs to
Rochester. 
</div></div>
<div class="monthBar" id="april">April<div class="summary chatter">
Luverne claimed a no-fooling
April 1 state high temperature
with 86, while the Twin
Cities reached 84, a local
record. Southern Minnesota
saw nearly 3 inches of rain
April 4-10. Water levels in
lakes and rivers across much
of the state were below average
due to reduced winter
snowfall. The Twin Cities
saw 0.2 inches of snow with
doily-sized flakes April 10,
then hit 68 degrees the next
day. A capacity crowd for the
Twins’ home opener April 13
enjoyed a high of 63. The low
was the final score: Royals 12,
Twins 3. High winds and dry
air were common in April.
The Twin Cities had an April
23 low dew point of 1 degree. 
</div></div>
<div class="monthBar" id="may">May<div class="summary chatter">
A storm on May 3 pelted
the metro area with heavy
hail, including some stones
in Stillwater that measured
1.75 inches. Morris received
4.24 inches of rain May
16-17, and the month ended
with total rainfall well above
normal for much of the state.
Tornado season had a busy
opening day. Approximately
15 twisters touched down
across western Minnesota
on May 16 but caused little
damage. A cool blitz May
18-20 frosted some early
crops. By month’s end, most
of the state’s rivers were
running well above median
flows. Twin Cities rainfall,
just above normal, ended
an 11-mon
</div></div>
<div class="monthBar" id="june">June<div class="summary chatter">
More frost visited northern
Minnesota on June 1. A low
of 24 in Togo was a record
for the state as well as the
lowest temperature in the
continental U.S. So the Twin
Cities high of 92 on June 9
came out of the cool blue
— especially because there
wasn’t another high in the
90s until July 17. Albert Lea
got 9.09 inches of rain for
the month, more than twice
normal. The metro area was
bombarded by hail June 29,
with stones of 2 inches or
more in diameter falling
across the northern suburbs.
Otherwise, Twin Cities
temperatures and rainfall
were nearly dead-on normal
for the month. 
</div></div>
<div class="monthBar" id="july">July<div class="summary chatter">
Smoke from distant Canadian
forest fires muted
the Minnesota skies and
brought air-quality warnings
for the July 4th weekend.
Massive rains hit the
metro area overnight July
5-6. A blast of storms July
12-13 made a direct hit on
the lakes country, tearing
up trees and cottages, tossing
boats and docks around
and damaging Brainerd
International Raceway.
More storms overnight July
17-18 knocked out power
to 250,000 households,
mostly in the metro area,
some for days. The morning
commute July 28 was more
swim than slog: Richfield
received 1.4 inches in 35
minutes. 
</div></div>
<div class="monthBar" id="august">August<div class="summary chatter">
The state’s biggest hailstone
of the year — with a girth
of 12 inches — fell west of
Roseau on Aug. 12. The state’s
northwest corner also earned
“heat island” status in midmonth.
Hallock in northwestern
Minnesota had highs
from 90 to 95 Aug. 12-15,
running warmer than the
Twin Cities, where the high
of 94 on Aug. 14 made for the
hottest day of the year locally.
Cold, rainy, fall-like weather
followed across much of the
state. The Twin Cities had
highs of only 67 and 65 on
Aug. 18 and 19, respectively,
and rain. Lightning and
heavy rain led to two evacuations
of fans at a Vikings
preseason game Aug. 22.
</div></div>
<div class="monthBar" id="september">September<div class="summary chatter">
Summer won in overtime,
with the warmest
September in the state
and the fourth warmest
in the Twin Cities. Warm
nights — one of the central
features of Minnesota’s
warming climate — were
key: Detroit Lakes had a
record warm low of 73
Sept. 16, one of many at
midmonth. More heavy
rain fell; several central
Minnesota cities absorbed
more than 3 inches on Sept.
6 alone; then Mahtomedi
received 3.43 on Sept. 17.
Cotton and other locations
north of Duluth reported
up to 3.8 inches on Sept.
24. Clear skies allowed for
a full eclipse of the harvest
moon on Sept. 27. 
</div></div>
<div class="monthBar" id="october">October<div class="summary chatter">
And you thought September
was warm? Wheaton and
Moorhead hit 97 on Oct. 11,
the highest temperature
recorded on so late a date in
Minnesota. Swimmers took
to the lakes, although some
probably were surprised
to find the water less summerlike
than the air. (Lake
Minnetonka’s surface temperature
dropped to about
60, 10 degrees lower than
three weeks earlier.) Less
than a week later, on Oct. 17,
the Twin Cities temperature
dropped to 31, the first subfreezing
mark of the season.
It was nine days later than
average. The low wouldn’t
drop below freezing for
nearly four more weeks. 
</div></div>
<div class="monthBar" id="november">November<div class="summary chatter">
Minnesotans turned back their clocks Nov. 1, and the weather followed. The Twin Cities saw highs in the low 70s on Nov. 2-3. Gardeners continued to harvest fruits and vegetables, and some perennials sent out spring blooms. Again, warm nights were significant: There were 145 records set for warm low daily temperatures across the state, and not a single record cold low. Winnebago (2.6 inches) and Faribault (2.45) set November single-day rainfall records Nov. 11. The Twin Cities’ first dip back into the 20s Nov. 20 was the latest such event in the 138-year old record book
</div></div>
<div class="monthBar" id="december">December<div class="summary chatter">
The Twin Cities had its third warmest December. Many records fell, including a Dec. 7 high of 50 at Grand Portage, and daily rainfalls topping an inch Dec. 13-14 across southern
Minnesota. Many lakes were ice-free in the year’s final week, forcing the U.S. Pond Hockey Championships to be postponed. The Twin Cities had its third brown Christmas in five years, but snow lovers were thrilled by a Dec. 28-29 storm that dropped 10 inches across southern Minn. The 5.5 inches in the Twin Cities was more than from any storm last winter. The Twin Cities had only one sunny day.
</div></div>
</div>

<div id="temperature" class="block">
<div class="icon"><img  src="img/thermostat.png" /></div>
<div class="bigTitle redswatch">Temperatures</div>
<div class="chartTitle">Temperatures <span class="thisYear">2015</span></div>
<div class="chatter">Average, minimum and maximum temperatures by day in Minnesota.</div>
<div class="highlights">
  <div class="highlightNum redswatch" id="maxTemp">0</div><div class="highlightNum lowswatch" id="minTemp">0</div>
  <div class="highlightBreak"></div>
  <div class="highlightText">High</div><div class="highlightText">Low</div>
</div>
<div class="chart" id="tempsChart"></div>
<div class="chartTitle">Average temperature over time</div>
<div class="chatter">Annual average temperatures by year in Minnesota tracing back more than a century.</div>
<div class="highlights">
  <div class="highlightNum redswatch" id="maxTempAll">0</div><div class="highlightNum lowswatch" id="minTempAll">0</div>
  <div class="highlightBreak"></div>
  <div class="highlightText">High</div><div class="highlightText">Low</div>
</div>
<div class="chart" id="tempsHistory"></div>
<div class="chartTitle">Days over 90&deg; by year</div>
<div class="chatter">Total number of very hot days by year in Minnesota tracing back more than a century.</div>
<div class="highlights">
  <div class="highlightNum redswatch" id="max90">0</div><div class="highlightNum lowswatch" id="min90">0</div>
  <div class="highlightBreak"></div>
  <div class="highlightText">Days: Most</div><div class="highlightText">Days: Least</div>
</div>
<div class="chart" id="over90History"></div>
</div>

<div class="breaker"></div>

<div id="snowfall" class="block">
<div class="icon"><img  src="img/snowflake.png" /></div>
<div class="bigTitle snowswatch">Snowfall</div>
<div class="chartTitle">Snowfall <span class="thisYear">2015</span></div>
<div class="chatter">The total snowfall in inches by day in Minnesota.</div>
<div class="highlights">
  <div class="highlightNum snowswatch" id="maxSnow">0</div><div class="highlightNum greyswatch" id="minSnow">0</div>
  <div class="highlightBreak"></div>
  <div class="highlightText">High</div><div class="highlightText">Low</div>
</div>
<div class="chart" id="snowChart"></div>
<div class="chartTitle">Total snowfall by year</div>
<div class="chatter">Total snowfall in inches by year in Minnesota tracing back more than a century.</div>
<div class="highlights">
  <div class="highlightNum snowswatch" id="maxSnowAll">0</div><div class="highlightNum greyswatch" id="minSnowAll">0</div>
  <div class="highlightBreak"></div>
  <div class="highlightText">High</div><div class="highlightText">Low</div>
</div>
<div class="chart" id="snowHistory"></div>
</div>

<div class="breaker"></div>

<div id="precipitation" class="block">
<div class="icon"><img  src="img/raindrop.png" /></div>
<div class="bigTitle precipswatch">Precipitation</div>
<div class="chartTitle">Precipitation <span class="thisYear">2015</span></div>
<div class="chatter">The total precipitation in inches by day in Minnesota.</div>
<div class="highlights">
  <div class="highlightNum greenswatch" id="maxPrecip">0</div><div class="highlightNum precipswatch" id="minPrecip">0</div>
  <div class="highlightBreak"></div>
  <div class="highlightText">High</div><div class="highlightText">Low</div>
</div>
<div class="chart" id="precipChart"></div>
<div class="chartTitle">Total precipitation by year</div>
<div class="chatter">The total precipitation in inches by year in Minnesota tracing back more than a century.</div>
<div class="highlights">
  <div class="highlightNum greenswatch" id="maxPrecipAll">0</div><div class="highlightNum precipswatch" id="minPrecipAll">0</div>
  <div class="highlightBreak"></div>
  <div class="highlightText">High</div><div class="highlightText">Low</div>
</div>
<div class="chart" id="precipHistory"></div>
<div class="chartTitle">Dewpoint highs by year</div>
<div class="chatter">Highest average dewpoint from June to August by year in Minnesota tracing back more than a century.</div>
<div class="highlights">
  <div class="highlightNum greenswatch" id="maxDew">0</div><div class="highlightNum precipswatch" id="minDew">0</div>
  <div class="highlightBreak"></div>
  <div class="highlightText">High</div><div class="highlightText">Low</div>
</div>
<div class="chart" id="dewChart"></div>
</div>

<div class="breaker"></div>

<div id="wind" class="block" style="display:none;">
<div class="icon"><img  src="img/wind.png" /></div>
<div class="bigTitle orangeswatch">Wind</div>
<div class="chartTitle">Windspeed <span class="thisYear">2015</span></div>
<div class="chatter">Maximum and average windspeed by day in Minnesota.</div>
<div class="highlights">
  <div class="highlightNum orangeswatch" id="maxWind">0</div><div class="highlightNum windswatch" id="minWind">0</div>
  <div class="highlightBreak"></div>
  <div class="highlightText">High</div><div class="highlightText">Low</div>
</div>
<div class="chart" id="windChart"></div>
</div>

  </div>

<a href="https://docs.google.com/spreadsheets/d/1-2zKGGKgPe9Xer1MrRBI74Zy5TUi15HuZShdT-eJFFs/pub?output=xlsx" target="new_"><button class="downloadButton">&nbsp;Download data</button></a>
</body>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
<script src="js/c3-master/c3.min.js"></script>
<script src="../_common_resources/stickies/jquery.sticky.js"></script>

<script>
// $("#selector").sticky({topSpacing:1});
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
<script>
//LIVE JSON MAGIC

//https://script.google.com/macros/s/AKfycbwG7mX6qPZaIhkwY2AJ2lU7kNarbm6OWIkWVfnmYZGYruIl40cu/exec?id=1-2zKGGKgPe9Xer1MrRBI74Zy5TUi15HuZShdT-eJFFs&sheet=weather2011
//https://script.google.com/macros/s/AKfycbwG7mX6qPZaIhkwY2AJ2lU7kNarbm6OWIkWVfnmYZGYruIl40cu/exec?id=1-2zKGGKgPe9Xer1MrRBI74Zy5TUi15HuZShdT-eJFFs&sheet=weather2012
//https://script.google.com/macros/s/AKfycbwG7mX6qPZaIhkwY2AJ2lU7kNarbm6OWIkWVfnmYZGYruIl40cu/exec?id=1-2zKGGKgPe9Xer1MrRBI74Zy5TUi15HuZShdT-eJFFs&sheet=weather2013
//https://script.google.com/macros/s/AKfycbwG7mX6qPZaIhkwY2AJ2lU7kNarbm6OWIkWVfnmYZGYruIl40cu/exec?id=1-2zKGGKgPe9Xer1MrRBI74Zy5TUi15HuZShdT-eJFFs&sheet=weather2014
//https://script.google.com/macros/s/AKfycbwG7mX6qPZaIhkwY2AJ2lU7kNarbm6OWIkWVfnmYZGYruIl40cu/exec?id=1-2zKGGKgPe9Xer1MrRBI74Zy5TUi15HuZShdT-eJFFs&sheet=weather2015
//https://script.google.com/macros/s/AKfycbwG7mX6qPZaIhkwY2AJ2lU7kNarbm6OWIkWVfnmYZGYruIl40cu/exec?id=1-2zKGGKgPe9Xer1MrRBI74Zy5TUi15HuZShdT-eJFFs&sheet=avgTemp
//https://script.google.com/macros/s/AKfycbwG7mX6qPZaIhkwY2AJ2lU7kNarbm6OWIkWVfnmYZGYruIl40cu/exec?id=1-2zKGGKgPe9Xer1MrRBI74Zy5TUi15HuZShdT-eJFFs&sheet=coolingDegree
//https://script.google.com/macros/s/AKfycbwG7mX6qPZaIhkwY2AJ2lU7kNarbm6OWIkWVfnmYZGYruIl40cu/exec?id=1-2zKGGKgPe9Xer1MrRBI74Zy5TUi15HuZShdT-eJFFs&sheet=over90
//https://script.google.com/macros/s/AKfycbwG7mX6qPZaIhkwY2AJ2lU7kNarbm6OWIkWVfnmYZGYruIl40cu/exec?id=1-2zKGGKgPe9Xer1MrRBI74Zy5TUi15HuZShdT-eJFFs&sheet=dewpointHighs
//https://script.google.com/macros/s/AKfycbwG7mX6qPZaIhkwY2AJ2lU7kNarbm6OWIkWVfnmYZGYruIl40cu/exec?id=1-2zKGGKgPe9Xer1MrRBI74Zy5TUi15HuZShdT-eJFFs&sheet=heatingDegree
//https://script.google.com/macros/s/AKfycbwG7mX6qPZaIhkwY2AJ2lU7kNarbm6OWIkWVfnmYZGYruIl40cu/exec?id=1-2zKGGKgPe9Xer1MrRBI74Zy5TUi15HuZShdT-eJFFs&sheet=hottestDecade
//https://script.google.com/macros/s/AKfycbwG7mX6qPZaIhkwY2AJ2lU7kNarbm6OWIkWVfnmYZGYruIl40cu/exec?id=1-2zKGGKgPe9Xer1MrRBI74Zy5TUi15HuZShdT-eJFFs&sheet=annualPrecip
//https://script.google.com/macros/s/AKfycbwG7mX6qPZaIhkwY2AJ2lU7kNarbm6OWIkWVfnmYZGYruIl40cu/exec?id=1-2zKGGKgPe9Xer1MrRBI74Zy5TUi15HuZShdT-eJFFs&sheet=annualSnow


//THESE LOAD DIFFERENT TABS OF THE GOOGLE SHEET INTO SEPERATE JSON STRINGS, USING THE ACTUAL URLS
<?php

$jsonData2011 = file_get_contents("https://script.googleusercontent.com/macros/echo?user_content_key=l5_aNeJYpzBLERNvsi086lXDhWdKV_rV-zIYfSJ3Kq-smFJm1GhXPjLjm7pSGJuROJrCDFolUPJJJvQOa15umibMWjlo-U3UOJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMWojr9NvTBuBLhyHCd5hHaxCoMjMSmZWLp6XAShvjQj50JtCfh4yP7n1RnEoDeOH7XqmOXgX8RYIyMAhIAtjnF9UDzNXGLr6TuemWiCPnYU3v6YF6IJkSFYyyTJG-HL6oSfmK20SEw86uyLwhxRZulMt4JgiTXzIzGetL3GQdFGtzSS3bVLNjDaoHaP2ix_cb&lib=MVcLnEUipyThKZcpmQKyqT_CoSfd4egCX");
$jsonData2012 = file_get_contents("https://script.googleusercontent.com/macros/echo?user_content_key=9bJ4W0EzeuC0jr3RkVN0_i6zYMyRVuSScqO6K3SkWJTuMfqTJPL5OHariSOO40qSf-wrA2-NGvnSXd2TDqLCRynTGdzah8lKOJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMWojr9NvTBuBLhyHCd5hHaxCoMjMSmZWLp6XAShvjQj50JtCfh4yP7n1RnEoDeOH7XqmOXgX8RYIyMAhIAtjnF9UDzNXGLr6TuemWiCPnYU3v6YF6IJkSFYyyTJG-HL6oSfmK20SEw86uyLwhxRZulMt4JgiTXzIzGetL3GQdFGtzSS3bVLNjDR_LfmYbIuwY&lib=MVcLnEUipyThKZcpmQKyqT_CoSfd4egCX");
$jsonData2013 = file_get_contents("https://script.googleusercontent.com/macros/echo?user_content_key=mdVJzUd9WHmfJBkXkYEw_4bm7jNY3ZQnyPGPwS5UlrQOPJpoLsGfmrploIYcXuUCUG4mxOfXrt8v2QzIHhbNAz_g48noQ1KzOJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMWojr9NvTBuBLhyHCd5hHaxCoMjMSmZWLp6XAShvjQj50JtCfh4yP7n1RnEoDeOH7XqmOXgX8RYIyMAhIAtjnF9UDzNXGLr6TuemWiCPnYU3v6YF6IJkSFYyyTJG-HL6oSfmK20SEw86uyLwhxRZulMt4JgiTXzIzGetL3GQdFGtzSS3bVLNjDSBXb84BGvRE&lib=MVcLnEUipyThKZcpmQKyqT_CoSfd4egCX");
$jsonData2014 = file_get_contents("https://script.googleusercontent.com/macros/echo?user_content_key=9B-AWywwxrR1TBeP9Ia3cXAIqYN1T86VynrSb5_fkHf9DL_z4AgKJPoSIuffDiHDfT_drofP9agv2QzIHhbNA2NX_mOIqL0rOJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMWojr9NvTBuBLhyHCd5hHaxCoMjMSmZWLp6XAShvjQj50JtCfh4yP7n1RnEoDeOH7XqmOXgX8RYIyMAhIAtjnF9UDzNXGLr6TuemWiCPnYU3v6YF6IJkSFYyyTJG-HL6oSfmK20SEw86uyLwhxRZulMt4JgiTXzIzGetL3GQdFGtzSS3bVLNjDQsWJUuuPAtW&lib=MVcLnEUipyThKZcpmQKyqT_CoSfd4egCX");
$jsonData2015 = file_get_contents("https://script.googleusercontent.com/macros/echo?user_content_key=Kor1VwDOmGgoy_JfeRUxKiQ27I6lkP3BrUSasfwBKdeItoWcKZ_ijnXzzah4FKqUuAOdANrkFI0v2QzIHhbNAxig1ykYg_tjOJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMWojr9NvTBuBLhyHCd5hHaxCoMjMSmZWLp6XAShvjQj50JtCfh4yP7n1RnEoDeOH7XqmOXgX8RYIyMAhIAtjnF9UDzNXGLr6TuemWiCPnYU3v6YF6IJkSFYyyTJG-HL6oSfmK20SEw86uyLwhxRZulMt4JgiTXzIzGetL3GQdFGtzSS3bVLNjDS7AWuiHuzI1&lib=MVcLnEUipyThKZcpmQKyqT_CoSfd4egCX");
$jsonDataTmp = file_get_contents("https://script.googleusercontent.com/macros/echo?user_content_key=vbmsyf5KREVq2ZYqQyEbRhbNrYZNewE28ZBxrPWb88KhGY2gURPkHmHAs0s9kiHTTFpiTp7nHE0jRkQ-X35H-cBijNEMrdFYOJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMWojr9NvTBuBLhyHCd5hHaxCoMjMSmZWLp6XAShvjQj50JtCfh4yP7n1RnEoDeOH7XqmOXgX8RYIyMAhIAtjnF9UDzNXGLr6TuemWiCPnYU3v6YF6IJkSFYyyTJG-HL6oSfmK20SEw86uyLwhxRZulMt4JgiTXzIzCybrZkpw6lssgaDZH-wzIA&lib=MVcLnEUipyThKZcpmQKyqT_CoSfd4egCX");
$jsonDataCool = file_get_contents("https://script.googleusercontent.com/macros/echo?user_content_key=6nyoUiL0ogAGtBuQrvxeu64CIZMJ-jlLqkPNKOCL57xQ4bN_Pp45qumEZs69wua-PbnC_7FDZnAjRkQ-X35H-d4atuqvRiuwOJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMWojr9NvTBuBLhyHCd5hHaxCoMjMSmZWLp6XAShvjQj50JtCfh4yP7n1RnEoDeOH7XqmOXgX8RYIyMAhIAtjnF9UDzNXGLr6TuemWiCPnYU3v6YF6IJkSFYyyTJG-HL6oSfmK20SEw86uyLwhxRZulMt4JgiTXzIzW0Ar8EAym2-rSLd6Kd3MhGoD-a8Q7Shx&lib=MVcLnEUipyThKZcpmQKyqT_CoSfd4egCX");
$jsonData90 = file_get_contents("https://script.googleusercontent.com/macros/echo?user_content_key=Sm3LMCfJhh_4ui1k1tgAsG3LpcGjWo58N9vLW0Hitxm4F-_zO0ny_H_4W-nY_KQTbkl3w8FAE_sjRkQ-X35H-Z19ZG2n3KUIOJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMWojr9NvTBuBLhyHCd5hHaxCoMjMSmZWLp6XAShvjQj50JtCfh4yP7n1RnEoDeOH7XqmOXgX8RYIyMAhIAtjnF9UDzNXGLr6TuemWiCPnYU3v6YF6IJkSFYyyTJG-HL6oSfmK20SEw86uyLwhxRZulMt4JgiTXzIz3SRbIqcu4Za0fnLkJQj8mg&lib=MVcLnEUipyThKZcpmQKyqT_CoSfd4egCX");
$jsonDataDew = file_get_contents("https://script.googleusercontent.com/macros/echo?user_content_key=R5SXWbFJdDkDYssFUlLvPkeWCZPpzLbzl_6PV2PiSx5NbSf6F02xGpW2rNWOY2g_R7cS4LGfdbAjRkQ-X35H-Wj6U1N-qGvkOJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMWojr9NvTBuBLhyHCd5hHaxCoMjMSmZWLp6XAShvjQj50JtCfh4yP7n1RnEoDeOH7XqmOXgX8RYIyMAhIAtjnF9UDzNXGLr6TuemWiCPnYU3v6YF6IJkSFYyyTJG-HL6oSfmK20SEw86uyLwhxRZulMt4JgiTXzIz3dzJzZTV7GibOBmgGRDvDAePdCTtDnUe&lib=MVcLnEUipyThKZcpmQKyqT_CoSfd4egCX");
$jsonDataHeat = file_get_contents("https://script.googleusercontent.com/macros/echo?user_content_key=bDx9446nsE_17BOWXpdCg88TQN1F8hiJigvS1OAp3QvthRP09Fn-g70V4tQFjE-8096_wSmLulZHGJOtJcWT_sRVhlD-fLluOJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMWojr9NvTBuBLhyHCd5hHaxCoMjMSmZWLp6XAShvjQj50JtCfh4yP7n1RnEoDeOH7XqmOXgX8RYIyMAhIAtjnF9UDzNXGLr6TuemWiCPnYU3v6YF6IJkSFYyyTJG-HL6oSfmK20SEw86uyLwhxRZulMt4JgiTXzIzSCWgToZmllYLAludXjgR92oD-a8Q7Shx&lib=MVcLnEUipyThKZcpmQKyqT_CoSfd4egCX");
$jsonDataDecade = file_get_contents("https://script.googleusercontent.com/macros/echo?user_content_key=inQ4H6msBBEe2lAuUmcihnvF_9T41FyWQpZfRLInrHzBv1WFR4VXLQRog--cgHi6mOUPZ6Do_TdHGJOtJcWT_qGr0FgEJyzOOJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMWojr9NvTBuBLhyHCd5hHaxCoMjMSmZWLp6XAShvjQj50JtCfh4yP7n1RnEoDeOH7XqmOXgX8RYIyMAhIAtjnF9UDzNXGLr6TuemWiCPnYU3v6YF6IJkSFYyyTJG-HL6oSfmK20SEw86uyLwhxRZulMt4JgiTXzIzSCWgToZmllbQp3vYj6SpyFwQpERPvs5H&lib=MVcLnEUipyThKZcpmQKyqT_CoSfd4egCX");
$jsonDataPrecip = file_get_contents("https://script.googleusercontent.com/macros/echo?user_content_key=-PIWqx5kMzKvhitTFnzAReTbLeF8ayn4t3smDKTRyg618IeHLVfNAuvI37QFTtuPzrxKnR3ps9VHGJOtJcWT_o5drkE28sTlOJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMWojr9NvTBuBLhyHCd5hHaxCoMjMSmZWLp6XAShvjQj50JtCfh4yP7n1RnEoDeOH7XqmOXgX8RYIyMAhIAtjnF9UDzNXGLr6TuemWiCPnYU3v6YF6IJkSFYyyTJG-HL6oSfmK20SEw86uyLwhxRZulMt4JgiTXzIzCybrZkpw6ls6fOqW35suTWBZtRnYfzDl&lib=MVcLnEUipyThKZcpmQKyqT_CoSfd4egCX");
$jsonDataSnow = file_get_contents("https://script.googleusercontent.com/macros/echo?user_content_key=uaAlUqxjSlon5e_C8c5IOzeeuQNOfi6s9HyU2a0brYaJVvdddqLmk37tkWKS-H9dbo-NdWzNbP1HGJOtJcWT_kBSc61GAoNPOJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMWojr9NvTBuBLhyHCd5hHaxCoMjMSmZWLp6XAShvjQj50JtCfh4yP7n1RnEoDeOH7XqmOXgX8RYIyMAhIAtjnF9UDzNXGLr6TuemWiCPnYU3v6YF6IJkSFYyyTJG-HL6oSfmK20SEw86uyLwhxRZulMt4JgiTXzIzCybrZkpw6lts1UOCsECMqBGQmSuaYtHQ&lib=MVcLnEUipyThKZcpmQKyqT_CoSfd4egCX");

?>

//THESE ADD THEM TO JAVASCRIPT VARIABLES WE CAN ACCESS THROUGHOUT THE DOCUMENT
var dataLoad2011 = <?php echo $jsonData2011; ?>;
var dataLoad2012 = <?php echo $jsonData2012; ?>;
var dataLoad2013 = <?php echo $jsonData2013; ?>;
var dataLoad2014 = <?php echo $jsonData2014; ?>;
var dataLoad2015 = <?php echo $jsonData2015; ?>;
var dataLoadTmp = <?php echo $jsonDataTmp; ?>;
var dataLoadCool = <?php echo $jsonDataCool; ?>;
var dataLoad90 = <?php echo $jsonData90; ?>;
var dataLoadDew = <?php echo $jsonDataDew; ?>;
var dataLoadHeat = <?php echo $jsonDataHeat; ?>;
var dataLoadDecade = <?php echo $jsonDataDecade; ?>;
var dataLoadPrecip = <?php echo $jsonDataPrecip; ?>;
var dataLoadSnow = <?php echo $jsonDataSnow; ?>;

data2011 = dataLoad2012.weather2011;
data2012 = dataLoad2012.weather2012;
data2013 = dataLoad2013.weather2013;
data2014 = dataLoad2014.weather2014;
data2015 = dataLoad2015.weather2015;
dataTmp = dataLoadTmp.avgTemp;
dataCool = dataLoadCool.coolingDegree;
data90 = dataLoad90.over90;
dataDew = dataLoadDew.dewpointHighs;
dataHeat = dataLoadHeat.heatingDegree;
dataDecade = dataLoadDecade.hottestDecade;
dataPrecip = dataLoadPrecip.annualPrecip;
dataSnow = dataLoadSnow.annualSnow;
</script>

<script>

$(".years li").on('click',function(){
$(".thisYear").text($(this).attr('year'));

var whatYear = $(this).attr('year');

if (whatYear == '2011') { var newData = data2011; }
if (whatYear == '2012') { var newData = data2012; }
if (whatYear == '2013') { var newData = data2013; }
if (whatYear == '2014') { var newData = data2014; }
if (whatYear == '2015') { var newData = data2015; }

var maxTemp = Math.max.apply(Math,newData.map(function(o){return o.Tmax;}))
var minTemp = Math.min.apply(Math,newData.map(function(o){return o.Tmin;}))
$("#maxTemp").html(Math.round(maxTemp) + "&deg;");
$("#minTemp").html(Math.round(minTemp) + "&deg;");
var maxSnow = Math.max.apply(Math,newData.map(function(o){return o.SnowFall;}))
var minSnow = Math.min.apply(Math,newData.map(function(o){return o.SnowFall;}))
$("#maxSnow").html(Math.round(maxSnow) + "in");
$("#minSnow").html(Math.round(minSnow) + "in");
var maxPrecip = Math.max.apply(Math,newData.map(function(o){return o.PrecipTotal;}))
var minPrecip = Math.min.apply(Math,newData.map(function(o){return o.PrecipTotal;}))
$("#maxPrecip").html(Math.round(maxPrecip) + "in");
$("#minPrecip").html(Math.round(minPrecip) + "in");
var maxWind = Math.max.apply(Math,newData.map(function(o){return o.Max5Speed;}))
var minWind = Math.min.apply(Math,newData.map(function(o){return o.Max5Speed;}))
$("#maxWind").html(Math.round(maxWind) + "mph");
$("#minWind").html(Math.round(minWind) + "mph");


    chartTemps.load({
            json: newData,
            keys: {
                x: 'DATE1',
                value: ['Tmax','Tmin','Tavg','Avg30yearHigh','Avg30yearLow']
            },
          unload: ['Tmax','Tmin','Tavg','Avg30yearHigh','Avg30yearLow']
    });

    chartSnow.load({
            json: newData,
            keys: {
                x: 'DATE1',
                value: ['SnowFall']
            },
          unload: ['SnowFall']
    });

    chartPrecip.load({
            json: newData,
            keys: {
                x: 'DATE1',
                value: ['PrecipTotal']
            },
          unload: ['PrecipTotal']
    });

    chartWind.load({
            json: newData,
            keys: {
                x: 'DATE1',
                value: ['AvgSpeed',"Max5Speed"]
            },
          unload: ['AvgSpeed',"Max5Speed"]
    });

});

var maxTemp = Math.max.apply(Math,data2015.map(function(o){return o.Tmax;}))
var minTemp = Math.min.apply(Math,data2015.map(function(o){return o.Tmin;}))
var maxTempAll = Math.max.apply(Math,dataTmp.map(function(o){return o.avgTemp;}))
var minTempAll = Math.min.apply(Math,dataTmp.map(function(o){return o.avgTemp;}))
var max90 = Math.max.apply(Math,data90.map(function(o){return o.daysOver90;}))
var min90 = Math.min.apply(Math,data90.map(function(o){return o.daysOver90;}))

$("#maxTemp").html(Math.round(maxTemp) + "&deg;");
$("#minTemp").html(Math.round(minTemp) + "&deg;");
$("#maxTempAll").html(Math.round(maxTempAll) + "&deg;");
$("#minTempAll").html(Math.round(minTempAll) + "&deg;");
$("#max90").html(Math.round(max90));
$("#min90").html(Math.round(min90));

var maxSnow = Math.max.apply(Math,data2015.map(function(o){return o.SnowFall;}))
var minSnow = Math.min.apply(Math,data2015.map(function(o){return o.SnowFall;}))
var maxSnowAll = Math.max.apply(Math,dataSnow.map(function(o){return o.totalSnow;}))
var minSnowAll = Math.min.apply(Math,dataSnow.map(function(o){return o.totalSnow;}))

$("#maxSnow").html(Math.round(maxSnow) + "in");
$("#minSnow").html(Math.round(minSnow) + "in");
$("#maxSnowAll").html(Math.round(maxSnowAll) + "in");
$("#minSnowAll").html(Math.round(minSnowAll) + "in");

var maxPrecip = Math.max.apply(Math,data2015.map(function(o){return o.PrecipTotal;}))
var minPrecip = Math.min.apply(Math,data2015.map(function(o){return o.PrecipTotal;}))
var maxPrecipAll = Math.max.apply(Math,dataPrecip.map(function(o){return o.annualPrecip;}))
var minPrecipAll = Math.min.apply(Math,dataPrecip.map(function(o){return o.annualPrecip;}))
var maxDew = Math.max.apply(Math,dataDew.map(function(o){return o.junetoAugAvg;}))
var minDew = Math.min.apply(Math,dataDew.map(function(o){return o.junetoAugAvg;}))

$("#maxPrecip").html(Math.round(maxPrecip) + "in");
$("#minPrecip").html(Math.round(minPrecip) + "in");
$("#maxPrecipAll").html(Math.round(maxPrecipAll) + "in");
$("#minPrecipAll").html(Math.round(minPrecipAll) + "in");
$("#maxDew").html(Math.round(maxDew));
$("#minDew").html(Math.round(minDew));

var maxWind = Math.max.apply(Math,data2015.map(function(o){return o.Max5Speed;}))
var minWind = Math.min.apply(Math,data2015.map(function(o){return o.Max5Speed;}))

$("#maxWind").html(Math.round(maxWind) + "mph");
$("#minWind").html(Math.round(minWind) + "mph");

var  padding = {
        top: 40,
        right: 40,
        bottom: 30,
        left: 40,
    };


var chartTemps = c3.generate({
        bindto: '#tempsChart',
        padding: padding,
        data: {
            json: data2015,
            keys: {
                x: 'DATE1',
                value: ['Tmax','Tmin','Tavg','Avg30yearHigh','Avg30yearLow']
            },
            names: {
              'Tmax': 'Max Temp',
              'Tmin': 'Min Temp',
              'Tavg': 'Average Temp',
              'Avg30yearHigh': '30-Year High',
              'Avg30yearLow': '30-Year Low'
            },
            types: {
            'Tmax': 'line',
            'Tmin': 'line',
            'Tavg': 'line',
            'Avg30yearHigh': 'bar',
            'Avg30yearLow': 'bar'
            }
        },
       bar: {
        width: {
            ratio: 0.5 // this makes bar width 50% of length between ticks
        }
      },
        axis: {
          y: {
            tick: {
             values: ['-23', '0', '20', '40', '60', '80'],
             format: d3.format('r')
            }
        },
        x: {
            type: 'timeseries',
            tick: {
                format: '%Y-%m-%d',
                count: 4,
                multiline: false
            }
          }
        },
      subchart: { show: true },
        color: { pattern: ['#801515', '#E7A9A9', '#333','#fbdfe7','#b8d3ea'] },
    });


var chartTempHistory = c3.generate({
        bindto: '#tempsHistory',
        padding: padding,
        data: {
            json: dataTmp,
            keys: {
                x: 'year',
                value: ['avgTemp']
            },
            names: {
              'avgTemp': 'Average Temperature'
            }
        },
        axis: {
          y: {
            tick: {
             values: ['0', '20', '40'],
             format: d3.format('r')
            }
        },
        x: {
           // type: 'categories',
            tick: {
                values: ['1895', '1924', '1953', '1982', '2011'],
                multiline: false
            }
          }
        },
      subchart: { show: true },
        color: { pattern: ['#333'] },
    });

var chartTempHot = c3.generate({
        bindto: '#over90History',
        padding: padding,
        data: {
            json: data90,
            keys: {
                x: 'year',
                value: ['daysOver90']
            },
            names: {
              'daysOver90': '90+ Degree Days'
            }
        },
        axis: {
          y: {
            tick: {
             values: ['0', '20', '40'],
             format: d3.format('r')
            }
        },
        x: {
           // type: 'categories',
            tick: {
                values: ['1873', '1924', '1953', '1982', '2011'],
                multiline: false
            }
          }
        },
         regions: [
        {axis: 'x', start: '1980', end: '1990', class: 'hottest'},
    ],
      subchart: { show: true },
        color: { pattern: ['#801515'] },
    });



var chartSnow = c3.generate({
        bindto: '#snowChart',
        padding: padding,
        data: {
            json: data2015,
            keys: {
                x: 'DATE1',
                value: ['SnowFall']
            },
            names: {
              'SnowFall': 'Snowfall'
            }
        },
        axis: {
          y: {
            tick: {
             values: ['0', '2', '4', '6', '8'],
             format: d3.format('r')
            }
        },
        x: {
            type: 'timeseries',
            tick: {
                count: 4,
                format: '%Y-%m-%d'
            }
          }
        },
      subchart: { show: true },
        color: { pattern: ['#96ADB0'] },
    });

var chartSnowHistory = c3.generate({
        bindto: '#snowHistory',
        padding: padding,
        data: {
            json: dataSnow,
            keys: {
                x: 'year',
                value: ['totalSnow']
            },
            names: {
              data1: 'Total Snow'
            }
        },
        axis: {
          y: {
            tick: {
             values: ['0', '20', '40', '60', '80', '100'],
             format: d3.format('r')
            }
        },
        x: {
            tick: {
                values: ['1884', '1924', '1953', '1982', '2011'],
                multiline: false
            }
          }
        },
      subchart: { show: true },
        color: { pattern: ['#96ADB0'] },
    });


var chartPrecip = c3.generate({
        bindto: '#precipChart',
        padding: padding,
        data: {
            json: data2015,
            keys: {
                x: 'DATE1',
                value: ['PrecipTotal']
            },
            names: {
              'PrecipTotal': 'Precipitation'
            }
        },
        axis: {
          y: {
            tick: {
             values: ['0', '2', '4'],
             format: d3.format('r')
            }
        },
        x: {
            type: 'timeseries',
            tick: {
                count: 4,
                format: '%Y-%m-%d'
            }
          }
        },
      subchart: { show: true },
        color: { pattern: ['#3D813D'] },
    });

var chartDewHistory = c3.generate({
        bindto: '#dewChart',
        padding: padding,
        data: {
            json: dataDew,
            keys: {
                x: 'year',
                value: ['junetoAugAvg']
            },
            names: {
              'junetoAugAvg': 'Dewpoint High June to August Average'
            }
        },
        axis: {
          y: {
            tick: {
             values: ['40', '50', '60'],
             format: d3.format('r')
            }
        },
        x: {
           type: 'categories',
            tick: {
                values: ['1903', '1924', '1953', '1982', '2011'],
                multiline: false
            }
          }
        },
      subchart: { show: true },
        color: { pattern: ['#3D813D'] },
    });

var chartPrecipHistory = c3.generate({
        bindto: '#precipHistory',
        padding: padding,
        data: {
            json: dataPrecip,
            keys: {
                x: 'year',
                value: ['annualPrecip']
            },
            names: {
              'annualPrecip': 'Total Precipitation'
            }
        },
        axis: {
          y: {
            tick: {
             values: ['0', '20', '40'],
             format: d3.format('r')
            }
        },
        x: {
            tick: {
                values: ['1891', '1924', '1953', '1982', '2011'],
                multiline: false
            }
          }
        },
      subchart: { show: true },
        color: { pattern: ['#3D813D'] },
    });

var chartWind = c3.generate({
        bindto: '#windChart',
        padding: padding,
        data: {
            json: data2015,
            keys: {
                x: 'DATE1',
                value: ['AvgSpeed',"Max5Speed"]
            },
            names: {
              'AvgSpeed': 'Average Speed',
              'Max5Speed': 'Max Speed'
            }
        },
        axis: {
          y: {
            tick: {
             values: ['0', '20', '40', '60'],
             format: d3.format('r')
            }
        },
        x: {
          type: 'timeseries',
            tick: {
                count: 4,
                format: '%Y-%m-%d'
            }
          }
        },
      subchart: { show: true },
        color: { pattern: ['#E7C6A9', '#AA6C38'] },
    });
</script>
</html>