<?php 
//Debugger::log($property);
//Debugger::log($images);

?>
<div class="inner" id = "craigslistForm">

<?php 


echo $this->Form->create('Property',array('class' => 'formee', 'action'=>'posttocraigslist'));
echo $this->Form->input("Property.id", array('type' => 'hidden', 'value' => $property['Property']['id']));
echo $this->Html->image('../images/'.AuthComponent::user('id').'/'.$property['Property']['id'].'/'.$images['big']['0'],array('class'=>'profile_picture'));
echo $this->Form->input('title',array('value'=>$property['Property']['title']));
echo $this->Form->input('description',array('value'=>$property['Property']['description'],'type'=>'textarea'));



 ?>


<?php echo $this->Form->end(); ?>







 <div id="userbody">
    <div>
      <b><font size="4">Interested? Got a question? <a href=
      "http://www.reservationresources.com/properties/viewproperty/<?php echo $property['Property']['id']; ?>" rel=
      "nofollow">Contact me here</a></font></b>
    </div>

    <table width="100%">
      <tr>
        <td align="left">
          <div>
		  	   
       
          </div>
        </td>
      </tr>
	    <tr>
                <td valign="top">
                  <div style = "height:400px;">
                    <a href=
                    "http://www.reservationresources.com/properties/viewproperty<?php echo $property['Property']['id']; ?>"
                    rel="nofollow"><img alt="<?php echo $property['Property']['title']; ?> height="330"
                    src=" <?php echo $this->webroot.'images/'.$property['Property']['user_id'].'/'.$property['Property']['id'].'/'.$property['Property']['default_image']; ?> " width=
                    "445" /></a>
					<div style = "position:relative;left:450px;bottom:360px;">
							     <div>
                    <b><font size="5">Description</font></b>
                  </div>

                  <div>
                    <font size="2"><?php echo  nl2br(substr($property['Property']['description'],0,200)); ?> <a href=
                    "http://www.reservationresources.com/properties/viewproperty/<?php echo $property['Property']['id']; ?>"
                    rel="nofollow">Read full description</a>.</font>
                  </div>
				     <div>
                    <b><font size="6"><?php echo $property['Property']['privacy']; ?></font></b>
                  </div><br />
				
                  </div>
				  <div style = "position:relative; left:820px; bottom:550px;">
				    	  <?php if(!empty($property['Property']['price_per_night'])){ ?>
                        <div>
                          <b><font size="6">$<?php echo $property['Property']['price_per_night']; ?>/per night</font></b>
                        </div>

                  
						<?php } else{
									if(!empty($property['Property']['price_per_week'])){ ?>
									<div>
										<b><font size="6">$<?php echo $property['Property']['price_per_week']; ?>/per week</font></b>
									</div>

								
						
						<?php 	} else{ ?>
								<div>
									<b><font size="6">$<?php echo $property['Property']['price_per_month']; ?>/per month</font></b>
								</div>

						<?php } 
						
							} ?>
					       <ul>
                          <li style="list-style: none; display: inline">
                            <div>
                             <b> <font size="2">Includes:</font></b>
                            </div>
                          </li>
						<?php if(!empty($property['Amenity']['bedroom_amenities'])){
							$bedroom_amenities = explode(';',$property['Amenity']['bedroom_amenities']);
							
							foreach($bedroom_amenities as $key => $value){
							
						?>
                         <li><?php echo $this->Html->image('success-amenity-icon.png'); ?><font size="2"><?php echo $value." bed"; ?></font></li>
						<?php }} ?>
                         	<?php if(!empty($property['Amenity']['kitchen_amenities'])){
							$kitchen_amenities = explode(';',$property['Amenity']['kitchen_amenities']);
							
							foreach($kitchen_amenities as $key => $value){
							
						?>
                         <li><?php echo $this->Html->image('success-amenity-icon.png'); ?><font size="2"><?php echo $value; ?></font></li>
						<?php }} ?>

                       <?php if(!empty($property['Amenity']['electronic_amenities'])){
							$electronic_amenities = explode(';',$property['Amenity']['electronic_amenities']);
							
							foreach($electronic_amenities as $key => $value){
							
						?>
                         <li><?php echo $this->Html->image('success-amenity-icon.png'); ?><font size="2"><?php echo $value; ?></font></li>
						<?php }} ?>
					 <?php if(!empty($property['Amenity']['service_amenities'])){
							$service_amenities = explode(';',$property['Amenity']['service_amenities']);
							
							foreach($service_amenities as $key => $value){
							
						?>
                         <li><?php echo $this->Html->image('success-amenity-icon.png'); ?><font size="2"><?php echo $value; ?></font></li>
						<?php }} ?>
					 <?php if(!empty($property['Amenity']['additional_amenities'])){
							$additional_amenities = explode(';',$property['Amenity']['additional_amenities']);
							
							foreach($additional_amenities as $key => $value){
							
						?>
                         <li><?php echo $this->Html->image('success-amenity-icon.png'); ?><font size="2"><?php echo $value; ?></font></li>
						<?php }} ?>
                        </ul>
						</div>
				</div>
		
			
				  <br />
		
				  <br />
                </td>
				
 
            
              </tr>
	  
	
    </table>
	
	  	<?php
		$counter = 1;//this will keep track of the inner for loop to interate of the pictures where we last left off
		for($i = 0; $i < 4; $i++){
		if($i % 2 == 0){
		?>
                    
		<?php for ($x = 1; $x <=2; $x++){?>
					
        <a href=
          "http://reservationresources.com/properties/viewproperty/<?php echo $property['Property']['id']; ?>"
           rel="nofollow"><img alt="Large" height="144" src=
           "<?php echo $this->webroot.'images/'.$property['Property']['user_id'].'/'.$property['Property']['id'].'/'.$images['big'][$counter]; ?>" width=
              "216" /></a>
			<?php 
			$counter++;
						
			} 
		?>
				
                
	<?php } }?>
  </div>

<b>Area</b>: 

<select id ="cl_locationselect">
<option value="318">aberdeen
<option value="364">abilene
<option value="512">acapulco
<option value="68">adelaide
<option value="450">ahmedabad
<option value="251">akron / canton
<option value="59">albany
<option value="637">albany, GA
<option value="50">albuquerque
<option value="533">alicante
<option value="355">altoona-johnstown
<option value="269">amarillo
<option value="445">ames, IA
<option value="82">amsterdam / randstad

<option value="51">anchorage / mat-su
<option value="172">ann arbor
<option value="460">annapolis
<option value="243">appleton-oshkosh-FDL
<option value="171">asheville
<option value="700">ashtabula
<option value="258">athens, GA
<option value="438">athens, OH
<option value="14">atlanta
<option value="372">auburn
<option value="69">auckland, NZ
<option value="256">augusta
<option value="15">austin
<option value="606">bacolod
<option value="406">baja california sur
<option value="63">bakersfield
<option value="534">baleares

<option value="34">baltimore
<option value="84">bangalore
<option value="295">bangladesh
<option value="83">barcelona
<option value="389">barrie
<option value="528">basel
<option value="494">bath
<option value="199">baton rouge
<option value="628">battle creek
<option value="264">beaumont / port arthur
<option value="154">beijing
<option value="296">beirut, lebanon
<option value="115">belfast
<option value="109">belgium
<option value="483">belleville, ON
<option value="217">bellingham
<option value="513">belo horizonte

<option value="663">bemidji
<option value="233">bend
<option value="108">berlin
<option value="529">bern
<option value="612">bhubaneswar
<option value="609">bicol region
<option value="535">bilbao
<option value="657">billings
<option value="248">binghamton
<option value="72">birmingham / west mids
<option value="127">birmingham, AL
<option value="666">bismarck
<option value="229">bloomington, IN
<option value="344">bloomington-normal
<option value="52">boise
<option value="578">bolivia
<option value="396">bologna

<option value="446">boone
<option value="412">bordeaux
<option value="4">boston
<option value="319">boulder
<option value="342">bowling green
<option value="658">bozeman
<option value="664">brainerd
<option value="626">brantford-woodstock
<option value="514">brasilia
<option value="522">bremen
<option value="398">brighton
<option value="66">brisbane
<option value="117">bristol
<option value="526">brittany
<option value="266">brownsville
<option value="570">brunswick, GA
<option value="153">budapest

<option value="114">buenos aires
<option value="40">buffalo
<option value="584">bulgaria
<option value="661">butte
<option value="536">cadiz
<option value="604">cagayan de oro
<option value="592">cairns
<option value="77">calgary
<option value="312">cambridge, UK
<option value="537">canarias
<option value="489">canberra
<option value="239">cape cod / islands
<option value="136">cape town
<option value="116">cardiff / wales
<option value="299">caribbean islands
<option value="621">cariboo
<option value="451">catskills

<option value="548">cebu
<option value="340">cedar rapids
<option value="644">central louisiana
<option value="434">central michigan
<option value="349">central NJ
<option value="190">champaign urbana
<option value="610">chandigarh
<option value="128">charleston, SC
<option value="439">charleston, WV
<option value="41">charlotte
<option value="290">charlottesville
<option value="484">chatham-kent
<option value="220">chattanooga
<option value="452">chautauqua
<option value="602">chengdu
<option value="182">chennai (madras)
<option value="11">chicago

<option value="187">chico
<option value="505">chihuahua
<option value="158">chile
<option value="701">chillicothe
<option value="601">chongqing
<option value="301">christchurch
<option value="35">cincinnati, OH
<option value="511">ciudad juarez
<option value="465">clarksville, TN
<option value="27">cleveland
<option value="653">clovis / portales
<option value="326">college station
<option value="313">cologne
<option value="393">colombia
<option value="210">colorado springs
<option value="222">columbia / jeff city
<option value="101">columbia, SC

<option value="42">columbus
<option value="343">columbus, GA
<option value="473">comox valley
<option value="670">cookeville
<option value="107">copenhagen
<option value="481">cornwall, ON
<option value="265">corpus christi
<option value="350">corvallis/albany
<option value="179">costa rica
<option value="495">coventry
<option value="546">croatia
<option value="705">cumberland valley
<option value="517">curitiba
<option value="600">dalian
<option value="21">dallas / fort worth
<option value="367">danville
<option value="491">darwin

<option value="547">davao city
<option value="131">dayton / springfield
<option value="238">daytona beach
<option value="569">decatur, IL
<option value="645">deep east texas
<option value="647">del rio / eagle pass
<option value="193">delaware
<option value="86">delhi
<option value="13">denver
<option value="496">derby
<option value="98">des moines
<option value="22">detroit metro
<option value="399">devon &amp; cornwall
<option value="617">dominican republic
<option value="467">dothan, AL

<option value="521">dresden
<option value="74">dublin
<option value="362">dubuque
<option value="255">duluth / superior
<option value="498">dundee
<option value="594">dunedin
<option value="303">durban
<option value="418">dusseldorf
<option value="402">east anglia
<option value="424">east idaho
<option value="400">east midlands
<option value="322">east oregon
<option value="713">eastern CO
<option value="281">eastern CT
<option value="674">eastern kentucky
<option value="335">eastern NC
<option value="444">eastern panhandle

<option value="328">eastern shore
<option value="242">eau claire
<option value="545">ecuador
<option value="75">edinburgh
<option value="78">edmonton
<option value="162">egypt
<option value="132">el paso
<option value="587">el salvador
<option value="652">elko
<option value="453">elmira-corning
<option value="275">erie, PA
<option value="523">essen / ruhr
<option value="497">essex
<option value="576">ethiopia
<option value="94">eugene
<option value="227">evansville
<option value="677">fairbanks

<option value="435">fargo / moorhead
<option value="568">farmington, NM
<option value="542">faro / algarve
<option value="273">fayetteville
<option value="293">fayetteville, AR
<option value="685">finger lakes
<option value="145">finland
<option value="244">flagstaff / sedona
<option value="259">flint
<option value="560">florence / muscle shoals
<option value="152">florence / tuscany
<option value="464">florence, SC
<option value="330">florida keys
<option value="287">fort collins / north CO
<option value="693">fort dodge
<option value="358">fort smith, AR
<option value="226">fort wayne

<option value="518">fortaleza
<option value="141">frankfurt
<option value="471">fraser valley
<option value="633">frederick
<option value="457">fredericksburg
<option value="43">fresno / madera
<option value="477">ft mcmurray
<option value="125">ft myers / SW florida
<option value="503">fukuoka
<option value="559">gadsden-anniston
<option value="219">gainesville
<option value="470">galveston
<option value="146">geneva
<option value="531">genoa
<option value="575">ghana
<option value="73">glasgow
<option value="686">glens falls

<option value="430">goa
<option value="590">gold coast
<option value="373">gold country
<option value="538">granada
<option value="667">grand forks
<option value="432">grand island
<option value="129">grand rapids
<option value="660">great falls
<option value="144">greece
<option value="241">green bay
<option value="61">greensboro
<option value="253">greenville / upstate
<option value="525">grenoble
<option value="404">guadalajara
<option value="245">guam-micronesia
<option value="431">guanajuato
<option value="409">guangzhou

<option value="585">guatemala
<option value="482">guelph
<option value="230">gulfport / biloxi
<option value="391">haifa
<option value="174">halifax
<option value="140">hamburg
<option value="213">hamilton-burlington
<option value="403">hampshire
<option value="48">hampton roads
<option value="709">hanford-corcoran
<option value="500">hangzhou
<option value="417">hannover
<option value="166">harrisburg
<option value="447">harrisonburg
<option value="44">hartford
<option value="374">hattiesburg
<option value="28">hawaii

<option value="639">heartland florida
<option value="519">heidelberg
<option value="659">helena
<option value="506">hermosillo
<option value="462">hickory / lenoir
<option value="288">high rockies
<option value="353">hilton head
<option value="504">hiroshima
<option value="630">holland
<option value="87">hong kong
<option value="643">houma
<option value="23">houston
<option value="249">hudson valley
<option value="189">humboldt county
<option value="442">huntington-ashland
<option value="231">huntsville / decatur
<option value="183">hyderabad

<option value="605">iloilo
<option value="455">imperial county
<option value="45">indianapolis
<option value="157">indonesia
<option value="549">indore
<option value="104">inland empire
<option value="339">iowa city
<option value="589">iran
<option value="588">iraq
<option value="201">ithaca
<option value="426">jackson, MI
<option value="134">jackson, MS
<option value="558">jackson, TN
<option value="80">jacksonville
<option value="634">jacksonville, NC
<option value="550">jaipur
<option value="553">janesville

<option value="561">jersey shore
<option value="161">jerusalem
<option value="185">johannesburg
<option value="425">jonesboro
<option value="423">joplin
<option value="618">kaiserslautern
<option value="261">kalamazoo
<option value="662">kalispell
<option value="381">kamloops
<option value="30">kansas city, MO
<option value="380">kelowna / okanagan
<option value="678">kenai peninsula
<option value="324">kennewick-pasco-richland
<option value="552">kenosha-racine
<option value="493">kent
<option value="582">kenya
<option value="410">kerala

<option value="327">killeen / temple / ft hood
<option value="385">kingston, ON
<option value="696">kirksville
<option value="214">kitchener-waterloo-cambridge
<option value="675">klamath falls
<option value="202">knoxville
<option value="672">kokomo
<option value="184">kolkata (calcutta)
<option value="474">kootenays
<option value="577">kuwait
<option value="363">la crosse
<option value="698">la salle co
<option value="283">lafayette
<option value="360">lafayette / west lafayette
<option value="284">lake charles
<option value="695">lake of the ozarks
<option value="376">lakeland

<option value="279">lancaster, PA
<option value="212">lansing
<option value="271">laredo
<option value="334">las cruces
<option value="26">las vegas
<option value="615">lausanne
<option value="347">lawrence
<option value="422">lawton
<option value="123">leeds
<option value="167">lehigh valley
<option value="520">leipzig
<option value="476">lethbridge
<option value="654">lewiston / clarkston
<option value="133">lexington, KY
<option value="413">lille
<option value="437">lima / findlay
<option value="282">lincoln

<option value="540">lisbon
<option value="100">little rock
<option value="118">liverpool
<option value="448">logan
<option value="415">loire valley
<option value="24">london
<option value="234">london, ON
<option value="250">long island
<option value="7">los angeles
<option value="58">louisville
<option value="267">lubbock
<option value="611">lucknow
<option value="544">luxembourg
<option value="366">lynchburg
<option value="150">lyon
<option value="257">macon / warner robins
<option value="165">madison

<option value="110">madrid
<option value="169">maine
<option value="539">malaga
<option value="297">malaysia
<option value="71">manchester
<option value="428">manhattan, KS
<option value="90">manila
<option value="421">mankato
<option value="436">mansfield
<option value="149">marseille
<option value="692">mason city
<option value="699">mattoon-charleston
<option value="509">mazatlan
<option value="263">mcallen / edinburg
<option value="706">meadville
<option value="216">medford-ashland
<option value="619">medicine hat

<option value="65">melbourne
<option value="46">memphis, TN
<option value="454">mendocino county
<option value="285">merced
<option value="641">meridian
<option value="91">mexico city
<option value="111">milan
<option value="47">milwaukee
<option value="19">minneapolis / st paul
<option value="656">missoula
<option value="200">mobile
<option value="96">modesto
<option value="565">mohave county
<option value="629">monroe
<option value="563">monroe, LA
<option value="192">montana (old)
<option value="102">monterey bay

<option value="408">monterrey
<option value="543">montevideo
<option value="207">montgomery
<option value="524">montpellier
<option value="49">montreal
<option value="440">morgantown
<option value="580">morocco
<option value="137">moscow
<option value="655">moses lake
<option value="85">mumbai
<option value="361">muncie / anderson
<option value="142">munich
<option value="554">muskegon
<option value="254">myrtle beach
<option value="501">nagoya
<option value="382">nanaimo
<option value="599">nanjing

<option value="151">napoli / campania
<option value="32">nashville
<option value="379">new brunswick
<option value="198">new hampshire
<option value="168">new haven
<option value="31">new orleans
<option value="291">new river valley
<option value="3">new york city
<option value="163">newcastle / NE england
<option value="591">newcastle, NSW
<option value="386">niagara region
<option value="586">nicaragua
<option value="306">nice / cote d'azur
<option value="527">normandy
<option value="638">north central FL
<option value="196">north dakota
<option value="170">north jersey

<option value="375">north mississippi
<option value="668">north platte
<option value="682">northeast SD
<option value="309">northern michigan
<option value="443">northern panhandle
<option value="631">northern WI
<option value="354">northwest CT
<option value="636">northwest GA
<option value="688">northwest KS
<option value="650">northwest OK
<option value="105">norway
<option value="492">nottingham
<option value="614">nuremberg
<option value="510">oaxaca
<option value="333">ocala
<option value="268">odessa / midland
<option value="351">ogden-clearfield

<option value="640">okaloosa / walton
<option value="429">okinawa
<option value="54">oklahoma city
<option value="466">olympic peninsula
<option value="55">omaha / council bluffs
<option value="684">oneonta
<option value="103">orange county
<option value="321">oregon coast
<option value="39">orlando
<option value="120">osaka-kobe-kyoto
<option value="76">ottawa-hull-gatineau
<option value="336">outer banks
<option value="487">owen sound
<option value="673">owensboro
<option value="211">oxford
<option value="294">pakistan
<option value="209">palm springs, CA

<option value="608">pampanga
<option value="298">panama
<option value="562">panama city, FL
<option value="81">paris
<option value="441">parkersburg-marietta
<option value="620">peace river country
<option value="203">pensacola
<option value="224">peoria
<option value="67">perth
<option value="159">peru
<option value="530">perugia
<option value="388">peterborough
<option value="17">philadelphia
<option value="18">phoenix
<option value="681">pierre / central SD
<option value="33">pittsburgh
<option value="338">plattsburgh-adirondacks

<option value="356">poconos
<option value="147">poland
<option value="555">port huron
<option value="9">portland, OR
<option value="541">porto
<option value="515">porto alegre
<option value="683">potsdam-canton-massena
<option value="138">prague
<option value="419">prescott
<option value="595">pretoria
<option value="304">prince edward island
<option value="383">prince george
<option value="292">provo / orem
<option value="508">puebla
<option value="315">pueblo
<option value="180">puerto rico
<option value="407">puerto vallarta

<option value="368">pullman / moscow
<option value="317">pune
<option value="307">quad cities, IA/IL
<option value="175">quebec city
<option value="36">raleigh / durham / CH
<option value="680">rapid city / west SD
<option value="278">reading
<option value="516">recife
<option value="475">red deer
<option value="188">redding
<option value="478">regina
<option value="92">reno / tahoe
<option value="579">reykjavik
<option value="38">rhode island
<option value="60">richmond
<option value="671">richmond, IN
<option value="139">rio de janeiro

<option value="289">roanoke
<option value="316">rochester, MN
<option value="126">rochester, NY
<option value="223">rockford
<option value="574">romania
<option value="121">rome
<option value="459">roseburg
<option value="420">roswell / carlsbad
<option value="12">sacramento
<option value="260">saginaw-midland-baycity
<option value="480">saguenay
<option value="232">salem, OR
<option value="690">salina
<option value="56">salt lake city
<option value="392">salvador, bahia
<option value="646">san angelo
<option value="53">san antonio

<option value="8">san diego
<option value="191">san luis obispo
<option value="449">san marcos
<option value="573">sandusky
<option value="62">santa barbara
<option value="218">santa fe / taos
<option value="710">santa maria
<option value="113">sao paulo
<option value="502">sapporo
<option value="237">sarasota-bradenton
<option value="532">sardinia
<option value="486">sarnia
<option value="176">saskatoon
<option value="485">sault ste marie, ON
<option value="205">savannah / hinesville
<option value="669">scottsbluff / panhandle
<option value="276">scranton / wilkes-barre

<option value="2">seattle-tacoma
<option value="596">sendai
<option value="119">seoul
<option value="395">sevilla
<option value="1" selected>SF bay area
<option value="135">shanghai
<option value="571">sheboygan, WI
<option value="401">sheffield
<option value="598">shenyang
<option value="499">shenzhen
<option value="390">sherbrooke
<option value="651">show low
<option value="206">shreveport
<option value="311">sicilia
<option value="468">sierra vista
<option value="89">singapore
<option value="341">sioux city, IA

<option value="679">sioux falls / SE SD
<option value="708">siskiyou county
<option value="461">skagit / island / SJI
<option value="623">skeena-bulkley
<option value="228">south bend / michiana
<option value="378">south coast
<option value="195">south dakota
<option value="20">south florida
<option value="286">south jersey
<option value="676">southeast alaska
<option value="691">southeast IA
<option value="689">southeast KS
<option value="566">southeast missouri
<option value="345">southern illinois
<option value="556">southern maryland
<option value="632">southern WV
<option value="687">southwest KS

<option value="572">southwest michigan
<option value="665">southwest MN
<option value="642">southwest MS
<option value="648">southwest TX
<option value="712">southwest VA
<option value="331">space coast
<option value="95">spokane / coeur d'alene
<option value="225">springfield, IL
<option value="221">springfield, MO
<option value="557">st augustine
<option value="369">st cloud
<option value="352">st george
<option value="305">st john's, NL
<option value="694">st joseph
<option value="29">st louis, MO
<option value="143">st petersburg, RU
<option value="277">state college

<option value="635">statesboro
<option value="433">stillwater
<option value="97">stockton
<option value="414">strasbourg
<option value="416">stuttgart
<option value="384">sudbury
<option value="622">sunshine coast
<option value="613">surat surat
<option value="707">susanville
<option value="106">sweden
<option value="64">sydney
<option value="130">syracuse
<option value="155">taiwan
<option value="186">tallahassee
<option value="37">tampa bay area
<option value="490">tasmania
<option value="160">tel aviv

<option value="348">terre haute
<option value="488">territories
<option value="359">texarkana
<option value="649">texoma
<option value="156">thailand
<option value="627">the thumb
<option value="387">thunder bay
<option value="181">tijuana
<option value="88">tokyo
<option value="204">toledo
<option value="280">topeka
<option value="397">torino
<option value="25">toronto
<option value="411">toulouse
<option value="332">treasure coast
<option value="323">tri-cities, TN
<option value="479">trois-rivieres

<option value="57">tucson
<option value="70">tulsa
<option value="581">tunisia
<option value="148">turkey
<option value="371">tuscaloosa
<option value="703">tuscarawas co
<option value="469">twin falls
<option value="704">twin tiers NY/PA
<option value="308">tyler / east TX
<option value="583">ukraine
<option value="215">united arab emirates
<option value="262">upper peninsula
<option value="247">utica-rome-oneida
<option value="427">valdosta
<option value="394">valencia
<option value="16">vancouver, BC
<option value="178">venezuela

<option value="310">venice / veneto
<option value="208">ventura county
<option value="507">veracruz
<option value="93">vermont
<option value="177">victoria
<option value="564">victoria, TX
<option value="122">vienna
<option value="314">vietnam
<option value="616">virgin islands
<option value="346">visalia-tulare
<option value="270">waco
<option value="10">washington, DC
<option value="567">waterloo / cedar falls
<option value="337">watertown
<option value="458">wausau
<option value="302">wellington
<option value="325">wenatchee

<option value="551">west bank
<option value="194">west virginia (old)
<option value="697">western IL
<option value="377">western KY
<option value="329">western maryland
<option value="173">western massachusetts
<option value="320">western slope
<option value="472">whistler, BC
<option value="625">whitehorse
<option value="99">wichita
<option value="365">wichita falls
<option value="463">williamsport
<option value="274">wilmington, NC
<option value="711">winchester
<option value="235">windsor
<option value="79">winnipeg
<option value="272">winston-salem

<option value="593">wollongong
<option value="240">worcester / central MA
<option value="597">wuhan
<option value="197">wyoming
<option value="603">xi'an
<option value="246">yakima
<option value="624">yellowknife
<option value="357">york, PA
<option value="252">youngstown
<option value="456">yuba-sutter
<option value="405">yucatan
<option value="370">yuma
<option value="607">zamboanga
<option value="702">zanesville / cambridge
<option value="112">zurich
</select>




<input style="float: right; " type = "button" class = 'btn btn-large btn-success' value = 'Post Now!' id= "postNowButton">



</div>

