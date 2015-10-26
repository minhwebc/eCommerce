<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sticker Search Results</title>
	<style type ="text/css">


dropdown_options {
	border: 0 !important;  
	-webkit-appearance: none;  
	-moz-appearance: none; 

	width: 100px; 
	text-indent: 0.01px; 
	text-overflow: ""; 

	color: #FFF;
	border-radius: 15px;
	padding: 5px;
	box-shadow: inset 0 0 5px rgba(000,000,000, 0.5);
}








		

	</style>
</head>
<body>


	<h1> Stickers </h1>
	<div id = "listings_header">
		<form class ="search_bar" method ="GET" action ="">
			<input type ="text" name ="search_product" placeholder ="Search for products">
			<input type = "hidden" name="order" value ="date_desc">
		</form>
		<div class ="sort_controls">
			<div class ="sort-options">
				<label> Sort by: </label>
				<div class ="dropdown">
					<div class ="dropdown_selected">
						<span> Most recent</span>
						<ul class = "dropdown_options">
							<span class ="pointer"></span>
							<li><a href =""</a></li>
							<li>Lowest - Highest<a href =""</a></li>
							<li>Highest-Lowest<a href =""</a></li>
						</ul>
						</div>
					</div>
				</div>
			</div>
			<div id ="listing_wrapper">
				<ul class ="clear_listings">
					<li id ="a001" class ="listing_card">
						<a class="listing-thumb" href="" title="A001 - Kawaii Halloween Stickers" data-palette-listing-image="">
                		<img src="http://goo.gl/C2ISm0" width="170" height="135" alt="A009 - Kawaii Fruity Popsicle Stickers"></a>
                		<div class ="listing_price">
                			<span class ="currency_symbol"> $ </span>
                			<span class ="currency_value"> 4.00 </span>
                			<span class ="currency_code"> USD </span>
                		</div>
                	</div>
                </li>
                <li id ="a001" class ="listing_card">
						<a class="listing-thumb" href="" title="A002 - Kawaii Bat Stickers" data-palette-listing-image="">
                		<img src="http://goo.gl/Hcql3v" width="170" height="135" alt="A009 - Kawaii Fruity Popsicle Stickers"></a>
                		<div class ="listing_price">
                			<span class ="currency_symbol"> $ </span>
                			<span class ="currency_value"> 4.00 </span>
                			<span class ="currency_code"> USD </span>
                		</div>
                	</div>
                </li>
            </div>
            





	
</body>
</html>