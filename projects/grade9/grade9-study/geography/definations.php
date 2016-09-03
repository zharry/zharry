<?php
//JACKY IS CURRENTLY EDITING THIS FILE
//GO ON SKYPE
	$query = $_GET["query"];
	$query = strtolower($query);
	//DEFINATION STANDARDS:
	//CASE/PUNCTUATION EXACT MATCH
	$keywords = array(
		"Aboriginal peoples" => "descendants of Canada's first inhabitants",
		"absolute measure" => "type of measure that does not consider total amounts in relation to population sizes",
		"acid precipitation" => "rain, snow, or fog created after sulphur dioxide and nitric oxides mix with water vapour in the atmosphere. Acid precipitation kills vegetation and turns lakes acidic, causing fish to die and wildlife to disappear.",
		"active layer" => "upper layer of permafrost that thaws only briefly in summertime",
		"aerial photo" => "photograph taken from the sky instead of the ground",
		"agribusiness" => "agricultural business. Operations include growing, storing, processing, and distributing food, and may be owned by a large corporation, a family, or an individual.",
		"air mass" => "large body of air having the same moisture and temperature conditions throughout",
		"air pressure" => "weight of air",
		"alphanumeric grid" => "grid that uses letters and numerals to identify squares of a grid pattern on a map",
		"alternative energy source" => "non-conventional energy source such as solar, wind, and biomass energy",
		"analog transmission" => "transmission of a continuously variable signal as compared to a discrete (digital) one. The problem with analog transmission is that they are subject to signal loss and distortions.",
		"anchor" => "large store, such as a department store or grocery store, that is located one at each end of the shopping mall and attracts great numbers of customers",
		"anticlinal trap" => "dome shaped structure of rock layers created by folding. Oil and gas are often found in these traps.",
		"aquaculture" => "production of fish and other marine products on fish farms",
		"ArcView" => "GIS program especially designed for map-making",
		"area symbol" => "coloured pattern representing a feature on a topographic map",
		"assimilate" => "to lose your culture and adopt the culture of the larger group within which you live (e.g., First Nations adopting broader Canadian culture)",
		"average annual temperature" => "monthly average temperatures added together and divided by 12",
		"balance of trade" => "difference between value of exports and value of imports. If exports exceed imports, there is a trade surplus. If imports exceeds exports, there is a trade deficit.",
		"band" => "an Aboriginal group that is recognized by the Canadian government. The government sets aside money and land (reserves) for use by the band. There are almost 600 bands in Canada.",
		"bankruptcy protection" => "a legal action that gives companies and individuals time to reorganize their operations and stops creditors from taking action against them",
		"banks" => "shallow areas of a continental shelf",
		"barren" => "without trees",
		"base map" => "map providing only an outline of the most basic features of a mapped area",
		"basic industry" => "industry that sells its products outside the community, bringing money into the community",
		"basic service" => "service provided by basic industries to people and businesses outside the community, thereby bringing money into the community from the outside and ensuring its survival",
		"bedrock" => "solid rock beneath the soil",
		"bias" => "distorted or misleading",
		"big-box store" => "very large store, often specializing in one kind of merchandise",
		"biomass energy" => "energy produced by combusting biomass materials suck as wood, peat, and manure",
		"birth rate" => "number of births per 1000 people",
		"bitumen" => "in oil sand deposits, each grain of sand is covered by a layer of water and a heavy oil or black tar called bitumen. Processed into synthetic crude oil.",
		"boreal and taiga forest" => "coniferous (needle-leaved) forest that stretches from east to west across Canada, south of the tundra but north of the grasslands and mixed forests",
		"branch plant" => "Canadian company controlled by a foreign company",
		"BSE (mad cow disease)" => "bovine spongiform encephalopathy forms holes in the brains of infected animals, crippling and eventually killing the animal. BSE is believed to be caused by contaminated feed made from a diseased animal.",
		"bulk cargo" => "things like wheat, coal, gravel, and iron ore shipped in loose form rather than in packages. They are usually of low value and must be shipped as cheaply as possible.",
		"calcification" => "process by which, in dry climates, water carrying dissolved minerals moves upward through the soil. At the surface, the water evaporates, leaving the minerals behind. The surface soil is then considered calcified.",
		"call centre" => "place of business where customer service telephone calls are received",
		"Canadian Shield" => "large area of Precambrian rock that forms the core of Canada",
		"canal" => "waterway dug across land on which boats and ships travel",
		"capillary action" => "movement of water upward through small spaces, as in soil",
		"carat" => "unit of mass of precious stones, especially diamonds, equal to 200 milligrams",
		"carbon cycle" => "movement of carbon through plants, animals, water, soil, air, and rocks",
		"carbon dioxide" => "greenhouse gas composed of one carbon atom and two oxygen atoms in each molecule, otherwise known as CO<sub>2</sub>",
		"carbon fixation" => "the process whereby carbon is trapped in fossil fuels or sedimentary rock for million of years. Fixed carbon does not contribute to global warming if we prevent its release into the atmosphere.",
		"carbon sink" => "a reservoir that stores carbon. The build-up of CO<sub>2</sub> in the atmosphere is moderated by carbon sinks, which remove carbon from the atmosphere and store it for a period of time. The oceans, growing vegetation, soil, and some sedimentary rock (e.g., limestone) are carbon sinks because more carbon moves into them than out of them.",
		"carbon source" => "an activity or location that gives off more CO<sub>2</sub> than it absorbs. Examples of carbon sources include volcanoes, burning forests, limestone weathering, decaying organic matter, the burning of fossil fuels, and breathing, all of which release CO<sub>2</sub> into the atmosphere.",
		"carrying capacity" => "number of people that could be supported at current living standards by Canada's productive land",
		"cash crop" => "crop that is grown by a farmer to be sold",
		"Cenozoic era" => "most recent era of geologic time, which began about 66 million years ago. See geologic time.",
		"census tract" => "smallest urban area used for census data collection",
		"Central Business District (CBD)" => "downtown area of a city or town, where most of the important commercial and government activities take place",
		"central place" => "village, town, or city that exists primarily to provide goods and service for a surrounding hinterland",
		"circumstance" => "in manufacturing, particular influences on the location of factories that are more general and difficult to measure",
		"clear-cutting" => "logging method whereby all trees in an area (except for very small ones) are cut at one time",
		"climate" => "weather conditions of a place averaged over a long period of time",
		"climate station" => "place where climate information is gathered",
		"commercial forest" => "part of a forest that has large enough trees and is close enough to a market to allow it to be harvested by the forest industry",
		"communications" => "transmission of information, especially by electronic or mechanical means",
		"commuter" => "person who travels daily between home and a place of work",
		"compass bearing" => "degrees on a compass, measured in clockwise direction from 0&deg; (North) to 360&deg;",
		"compass point" => "direction on a compass, such as north and south",
		"compass rose" => "diagram, in the shape of a flower, showing directions (compass points) and bearings (measured clockwise from north) used to indicate direction on maps",
		"component" => "one part of a program or system; in the Environmental Sustainability Index, one of five categories that measures the health of the environment, i.e., reducing human vulnerability, social and institutional capacity, global stewardship, environmental systems, and reducing environmental stresses",
		"comprehensive claim" => "claim available to First Nations who have never signed treaties in the past that deals with many issues, including land ownership, self-government, ownership and control of resources, hunting/fishing/trapping rights, and financial compensation",
		"comprehensive treaty" => "First Nations land treaty negotiated in an area where no other treaty has ever been signed, i.e., the first treaty for that area",
		"concession system" => "type of survey system used in southern Ontario, whereby land is divided by concession roads and side roads into squares and rectangles of varying sizes",
		"condensation" => "process whereby water vapour is cooled and changes from an invisible gas to liquid water. Condensed water vapour is what forms the clouds.",
		"coniferous trees" => "trees with cones and often needle-like leaves; evergreen",
		"container" => "metal box of standard size (2.4m X 2.4m x 4.9m or 9.8m) used for moving freight. The container is loaded at the point of shipment and remains sealed until it reaches its destination. Along the way, it may be moved by truck, train, plane, or ship.",
		"contaminant" => "substance that pollutes air, water, soil, or food",
		"continental drift" => "theory by German scientist Alfred Wegener stating that 300 million years ago all of Earth's land masses, which were in constant motion, collided to form one supercontinent called Pangaea. About 200 million years ago Pangaea broke apart and the continents have drifted apart to their present locations. According to his theory, only continents drifted.",
		"continentalist" => "A person who believes that Canadian and American cultures are so similar that there is no need to protect Canadian culture from American influences",
		"continental shelf" => "gently sloping outer edge of a continent that extends below the surface of the ocean to a maximum depth of about 200 metres",
		"convection current" => "circular movement in a gas or liquid created by uneven heating",
		"convectional precipitation" => "precipitation caused on hot summer days, when heated land causes the air above it to rise by convection. As the air rises, it cools and condensation occurs. Rain or hail may fall from thunderclouds that build up.",
		"conventional energy source" => "well-established source of energy such as oil, natural gas, coal, hydro- and nuclear-electricity",
		"convergent technologies" => "the merging of various communication technologies, such as the Internet and telephone communication",
		"craton" => "ancient geologic feature formed in Precambrian era, largely undisturbed by mountain-building for one billion years, containing kimberlite pipes in which diamonds are found",
		"culture" => "the characteristics of a way of life that, when put together, make a nation or people unique",
		"database" => "table of information in a computer program that can be searched for particular values or rearranged in variety of ways",
		"death rate" => "number of deaths per 1000 people",
		"deciduous trees" => "broad-leaved trees that shed their leaves annually in the fall",
		"demography" => "study of population numbers, distribution, trends, and issues",
		"dependency load" => "proportion of the population that is not in the workforce; total number of people 14 and under + 65 and over",
		"dependent variable" => "(graphing) variable that goes on the vertical axis of the graph and is, to a greater or lesser extent, caused or influenced by the independent variable",
		"deregulation" => "removal of regulations controlling certain parts of an industry. For example, deregulation of the airline industry removed rules controlling routes travelled and the price of seats.",
		"developed country" => "country with a highly developed economy. Its citizens have high income, abundant food, good housing, and can afford many luxuries. Sometimes called \"industrialized.\"",
		"developing country" => "country with a poorly developed economy. Its citizens have low incomes, shortage of food, poor housing, and cannot afford luxuries. Sometimes called \"less developed.\"",
		"differential erosion" => "process whereby softer sedimentary rocks erode more quickly than harder rock, shaping the surface of the landscape (e.g., tree different levels of elevation on the prairies)",
		"digital mapping" => "the location of geographic data (lines, points, areas, elevations, and numerical data such as census information) is digitized, placed in databases, and used in various combinations to create maps.",
		"digital transmission" => "a method of transmission that uses binary bits (zeros and ones) to increase television picture quality and the number of signals that can be carried per channel",
		"direct statement scale" => "words are used to describe the relationship between a distance on a map and a specific distance on Earth's surface (e.g., 1cm to 10km)",
		"discharge rate" => "amount of water that flows through a drainage basin. The discharge rate of a drainage basin may vary greatly from season to season depending on the weather conditions.",
		"diversified urban center" => "town or city that has a variety of basic urban functions",
		"doubling time" => "(demographics) how long it would take for a country's population to double at the country's current rate of population growth",
		"drainage" => "process whereby water is removed from an area by flowing out of depressions in the land such as lakes and rivers",
		"drainage basin" => "area drained by a river and its tributaries. One drainage basin is separated from another by an area of higher land called a watershed.",
		"Earth Charter" => "a UN document that lists values and principles that are thought to be necessary for creating a just, sustainable, and peaceful furture for the Earth. It was developed through international consultations and based on the four independent principles of Respect and Care for the Community of Line; Ecological Integrity; Social and Economic Justice; and Democracy, Non-violence, and Peace. The document has not been endorsed by the UN because of some concerns by a number of countries.",
		"easting" => "first three figures in a map reference giving the east-west location",
		"ecological footprint (EF)" => "measure of total human impact on an ecosystem",
		"ecological overshoot" => "the amount by which our resource demands exceed Earth's supply",
		"economic base" => "economic activities that allow a community to exist. For example, a town might exist because a mineral resource in the area is being developed.",
		"economic immigrant" => "category of Canadian immigrant that includes two groups: (a) skilled workers and (b) individuals with the ability to make a significant financial contribution through the establishment or purchase of a business or the making of an investment that creates jobs",
		"ecotourism" => "tourism industry promoting travel for the purpose of observing ecosystems",
		"ecozone" => "a distinct ecological region determined on the basis of physical, biological and human factors",
		"ecumene" => "permanently occupied or settled areas of a country",
		"emigrate" => "to leave your country of origin to live permanently in another country",
		"emigration rate" => "number of people per 1000 population in one year who emigrate",
		"entrepreneur" => "person who takes a risk by setting up a business in order to make a profit",
		"environmental stress" => "those factors that combine to cause the environment to deteriorate, such as pollution, overfishing, and deforestation",
		"Environmental Sustainability Index (ESI)" => "measurement, devised by the World Economic Forum, of current and future levels of environmental sustainbility in each of 146 countries",
		"eras" => "major division of geologic time (for example, the Paleozoic era). See geologic time.",
		"erosion" => "wearing away of Earth's surface followed by the movement to other locations of materials that have worn away",
		"escarpment" => "steep cliff formed by erosion or faulting",
		"evapotranspiration" => "the movement of water into the atmosphere by evaporation from the soil and by transpiration from plants",
		"export" => "product or service produced in one country for sale in another country",
		"extensive farming" => "type of farming in which small amounts of labour, machinery, and fertilizers are used on large farms. Yields per hectare are small.",
		"fair earthshare" => "measurement of productive land in the world divided by number of people in the world. This is how much of the productive land each person would be entitled to, if all of the world's productive land was shared equally.",
		"false colours" => "colours artificially added to satellite images of Earth, to make patterns more obvious. These colours would not actually be seen from space,",
		"family immigrant" => "category of Canadian immigrant in which family members and close relatives of Canadian citizens or landed immigrants can be brought to Canada",
		"fertilizer" => "substance, such as manure or a chemical, put on agricultural land to produce a greater crop yield",
		"First Nation" => "group of Aboriginal people who share the same culture and heritage",
		"fjord" => "long, narrow inlet of the sea with steep sides. Fjords were created by glaciers that scraped out valleys. When the glaciers melted, the sea flooded the valleys.",
		"foreign aid" => "financial assistance provided to developing countries from other countries, usually developed countries",
		"fossil fuel" => "any mineral that can be burned to produce energy (e.g., coal, natural gas, oil)",
		"free trade" => "trade without tariff barriers",
		"frontal rainfall" => "rainfall caused by lighter, warmer air being forced to rise over colder, denser air",
		"frost-free period" => "the number of days between the last frost in spring and the first frost in autumn",
		"GDP per capita" => "See gross domestic product (GDP) per capita",
		"gemstone diamond" => "diamond of high quality used in jewellery, prized because of its rarity and beauty",
		"Gender Empowerment Measure (GEM)" => "index designed to indicate the amount of economic and political power that a country's women have",
		"general-purpose map" => "map that contains many different types of information",
		"genetically modified organisms (GMOs)" => "organisms whose genetic structure has been changed to create a characteristic that is seen as desirable, e.g., resistance to a disease",
		"geocaching" => "hobby based on the use of a handheld GPS unit and maps to find a hidden cache (stash of items). The person who has hidden the cache places its location on the Internet so \"geocachers\" can search for it.",
		"geographic information system (GIS)" => "integrated software package for the input, management, analysis, and display of spatial information",
		"geographical systems" => "various interconnected systems that shape our world, e.g., forces that cause devastating earthquakes or why nations trade with each other",
		"geography" => "the study of Earth's physical and human systems and the relationships among them",
		"geologic time" => "history of Earth from its formation to the present. Earth's history may be divided into several major time periods, called eras: <br/><br/><dd>Cenozoic era (most recent 66 million years)</dd><br/><dd>Mesozoic era (245 million to 66 million years ago)</dd><br/><dd>Paleozoic era (570 million to 245 million years ago)</dd><br/><dd>Precambrian era (4600 million to 570 million years ago)</dd>",
		"geologist" => "scientist who studies the history, composition, and structure of Earth's crust",
		"geomatics" => "science and technology of gathering, analyzing, and manipulating geographic (geospatial) information",
		"geoscience" => "a general term used to describe a wide range of specialized scientific fields within the broad areas of geology and resource management",
		"geospatial" => "pertaining to the location of items that can be located on Earth's surface",
		"geostationary orbit" => "satellite orbiting about 36 000 km above Earth at a speed that keeps it exactly above the same place on Earth",
		"geotechnologies" => "new geographic technologies, such as remove sensing, GPS, and GIS, that have revolutionized the field of geography",
		"glaciation" => "the state of being covered by glaciers or massive ice sheets",
		"glaciers" => "slow-moving masses of ice",
		"global connections" => "economic, social, political, and geographic connections between and among countries around the world, e.g., economic connections such as buying shoes made in another country",
		
	);
	echo "<h2>Definition Results:</h2><hr/>";
	$nores = TRUE;
	foreach ($keywords as $key => $value){
		$keyl = strtolower($key);
		$loc = strpos($keyl, $query);
		if ($loc !== FALSE && $loc == 0){
			$nores = FALSE;
			$tosel = substr($key, 0, strlen($query));
			$postsel = substr($key, $loc + strlen($query));
			echo "<div class=\"res\"><h3><dl><dt><strong><b style='background-color: yellow'>{$tosel}</b>{$postsel}</strong></dt></h3><dd>{$value}</dd></dl></div>";	
		}
	}
	foreach ($keywords as $key => $value){
		$keyl = strtolower($key);
		$loc = strpos($keyl, $query);
		if ($loc !== FALSE && $loc != 0){
			$nores = FALSE;
			$presel = substr($key, 0, $loc);
			$tosel = substr($key, $loc, strlen($query));
			$postsel = substr($key, $loc + strlen($query));
			echo "<div class=\"res\"><h3><dl><dt><strong>{$presel}<b style='background-color: yellow'>{$tosel}</b>{$postsel}</strong></dt></h3><dd>{$value}</dd></dl></div>";
		}
	}
	if($nores){
		echo "No results... Try searching again!";
	}
	echo "<hr/>";
?>
