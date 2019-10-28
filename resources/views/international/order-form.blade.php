@extends('user.masterint')
@section('styles')
	<link href="{{asset('css/floating.css')}}" rel="stylesheet">
@endsection
@section('content')
	<!-- ========================= SECTION PAGETOP ========================= -->
	<section class="section-pagetop bg-secondary">
		<div class="container clearfix">
			<h2 class="title-page">International Order</h2>
		</div> <!-- container //  -->
	</section>
	<!-- ========================= SECTION INTRO END// ========================= -->

	<!-- ========================= SECTION CONTENT ========================= -->
	<section class="section-content bg padding-y border-top">
		<div class="container">

			<div class="row">
				<main class="col-sm-8">
					@if($errors->all())
						<div class="alert alert-danger">
							@foreach($errors->all() as $error)
								<li>{{$error}}</li>
							@endforeach
						</div>
					@endif
					@if (session('success'))
						<div class="alert alert-success" role="alert">
							<button type="button" class="close" data-dismiss="alert">x</button>
							{{ session('success') }}
						</div>
					@endif
					@if (session('error'))
						<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismiss="alert">x</button>
							{{ session('error') }}
						</div>
					@endif
					<div class="card">
						<header class="section-heading" style="padding-left: 2%">
							<h3 class="title-section">
								Shop from overseas: Amazon, Ebay, Target, Zara ETC and have your delivery in Ghana
							</h3>
						</header>
						<form method="post" action="{{ route('user.int.place') }}" id="intShoppingForm">
							{{ csrf_field() }}
							<div class="billing_details">
								<div class="col-lg-12">
									<div class="form-group">
										<label for="p_link">Copy and paste URL of the items you want to buy <span>*</span></label>
										<input type="text" class="form-control" id="p_link" aria-describedby="name"
										       name="link" placeholder="https://example.com/laptop/1211111" required>
									</div>

									<div class="form-group">
										<label for="qty">Product Quantity <span>*</span></label>
										<input type="number" class="form-control" id="qty" aria-describedby="name"
										       name="quantity" min="1" required>
									</div>

									<div class="form-group">
										<label for="weight">Product Weight (kg) <span>*</span></label>
										<input type="number" class="form-control" id="weight" aria-describedby="name"
										       name="weight" required step="0.5" min="1" max="70.5">
									</div>

									<input type="hidden" name="price" value="" id="priceInput">

									<div class="form-group">
										<label for="origin">Product Origin <span>*</span></label>
										<select type="text" class="form-control" id="origin"
										        name="origin" required>
											<option value="United States">United States</option>
											<option value="United Kingdom">United Kingdom</option>
											<option value="China">China</option>
											<option value="Germany">Germany</option>
											<option value="Canada">Canada</option>
											<option value="France">France</option>
											<option value="India">India</option>
											<option value="Turkey">Turkey</option>
											<option value="UAE">UAE</option>
											<option value="Spain">Spain</option>
											<option value="South Africa">South Africa</option>
											<option value="Italy">Italy</option>
											<option value="Singapore">Singapore</option>
											<option value="Egypt">Egypt</option>
											<option value="Thailand">Thailand</option>
											<option value="Pakistan">Pakistan</option>
											<option value="Japan">Japan</option>
											<option value="South Korea">South Korea</option>
											<option value="Switzerland">Switzerland</option>
										</select>
									</div>

									<div class="form-group">
										<label for="destination">Product Destination <span>*</span></label>
										<input type="text" class="form-control" id="destination"
										       name="destination" placeholder="Ghana" value="Ghana" readonly>
									</div>

								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label for="order">Order Specification</label>
										<textarea class="form-control" id="order" rows="3"
										          name="other"></textarea>
									</div>

									<div class="form-group">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="shopper_assist" name="shopper_assist">
											<label class="custom-control-label" for="shopper_assist">
												Shopper Assist (If selected shoptins will buy on your behalf at a fee)
											</label>
										</div>
									</div>

									<div class="form-group">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="self_shopper" name="self_shopper">
											<label class="custom-control-label" for="self_shopper">
												Self Shopper (If selected shoptins will give you a free address to shop yourself)
											</label>
										</div>
									</div>
									@if(!session()->has('code'))
										<div class="form-group">
											<label for="order">Delivery Address (Optional)</label>
											<textarea class="form-control" id="order" rows="3" name="address"></textarea>
										</div>
									@endif
									<div class="form-group">
										<button class="btn btn-success btn-block" type="submit">
											<i class="fa fa-cart-plus"></i>
											Add to cart
										</button>
									</div>

								</div>
							</div>
						</form>
					</div> <!-- card.// -->
				</main>
				<aside class="col-sm-4">
					<div class="card" style="width: 100%">
						<div class="card-body">
							<p class="alert alert-warning">
								Add as many items as you want to cart, when you are done click on place your order
							</p>
							@if(session()->has('code'))
								<?php
								$check = \App\International::where('shopper_assist', 1)
											->where('code', session()->get('code'))->get();
									if(count($check) > 0){
										?>
										<dl class="dlist-align">
											<dt>Admin Fee:</dt>
											<dd class="text-right">GH&#8373;50</dd>
										</dl>
										<?php
									}else{
                                    ?>
									<dl class="dlist-align">
										<dt>Admin Fee:</dt>
										<dd class="text-right">GH&#8373; 0</dd>
									</dl>
                                    <?php
									}
								?>

							<dl class="dlist-align">
								<dt>Subtotal:</dt>
								<dd class="text-right">
									<?php
                                    $checkSub = \App\International::where('code', session()->get('code'))->get();
                                    $subTotal = 0;
									?>
									@foreach($checkSub as $c)
                                        <?php
                                            $subTotal = ($subTotal + $c->price) * $c->quantity;
                                        ?>
									@endforeach
									GH&#8373;{{ $subTotal }}
								</dd>
							</dl>
							<dl class="dlist-align h4">
								<dt>Total:</dt>
								<dd class="text-right">
									<strong>
										@if(count($check) > 0)
											GH&#8373;{{ $subTotal + 50 }}
										@else
											GH&#8373;{{ $subTotal }}
										@endif
									</strong>
								</dd>
							</dl>
							@endif

							<hr>
							<figure class="itemside mb-3">
								<aside class="aside">
									<a href="{{ route('user.int.payment') }}">
										<button class="btn btn-success btn-block">
											<i class="fa fa-hand-point-right"></i>
											Check Out
										</button>
									</a>

								</aside>
							</figure>
							@if(session()->has('code'))
							<div class="card">
								<table class="table table-hover shopping-cart-wrap" style="table-layout: fixed">
									<thead class="text-muted">
									<tr>
										<th style="width: 70%">Product</th>
										<th style="width: 30%">Action</th>
									</tr>
									</thead>
									<tbody>
										<?php
											$data = \App\International::where('code',session()->get('code'))->get();
										?>
										@foreach($data as $cart)
											<tr>
												<td style="width: 70%">
													<a href="{{$cart->link}}" target="_blank">{{ \Illuminate\Support\Str::limit($detail->link,35,'...') }}</a>
												</td>
												<td style="width: 30%">
													<a class="btn btn-danger" href="{{ route('int.clear.cart',$cart->id) }}">
														<i class="fa fa-trash"></i>
														Remove
													</a>
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							@endif
						</div>
					</div>
					<div class="list-group">
						<article class="list-group-item">
							<header class="filter-header">
								<a href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" class="">
									<i class="icon-action fa fa-chevron-down"></i>
									<h6 class="title">Process </h6>
								</a>
							</header>
							<div class="filter-content collapse show" id="collapse1" style="">
								<ol>
									<li>Provide details of what you want to purchase by filling form, add as many items as you want to cart</li>
									<li>Submit order and receive quote</li>
									<li>Self Shopper: We give you address to shop online and you</li>
									<li>pay shipping cost  when your items arrive in Ghana</li>
									<li>Shopper Assist: You pay for us to purchase online on your behalf at a fee, and you pay shipping cost when item arrives in Ghana</li>
								</ol>
							</div> <!-- collapse -filter-content  .// -->
						</article>
						<article class="list-group-item">
							<header class="filter-header">
								<a href="#" data-toggle="collapse" data-target="#collapse3" class="collapsed" aria-expanded="false">
									<i class="icon-action fa fa-chevron-down"></i>
									<h6 class="title">Benefits</h6>
								</a>
							</header>
							<div class="filter-content collapse" id="collapse3" style="">
								<ol>
									<li>Delivery within 5 -7 days</li>
									<li>Free insurance for items worth up to $100</li>
									<li>Option to purchase on behalf of client</li>
									<li>Best shipping rates on the planet, $20 for one Kg</li>
									<li>The bigger your package, the less you pay</li>
								</ol>
							</div>
						</article>
						<article class="list-group-item">
							<header class="filter-header">
								<a href="#" data-toggle="collapse" data-target="#importantPoints" class="collapsed" aria-expanded="false">
									<i class="icon-action fa fa-chevron-down"></i>
									<h6 class="title">Important points</h6>
								</a>
							</header>
							<div class="filter-content collapse" id="importantPoints" style="">
								<p>You may be required to show proof of purchase</p>
								<ol>
									<li>Please use Estimator to calculate your shipping cost before submitting order</li>
									<li>You may have to pay duties and taxes if your product is dutiable</li>
									<li>Full costs will have to be paid before your product is delivered
										to you or before documents are handed to you if you choose to clear yourself</li>
									<li>Processing charges may apply if you cancel order after making payment</li>
									<li>Returning a product to Supplier/Merchant at any stage and/or
										for reasons not caused by Shoptins or Affiliates may incur separate charges</li>
									<li>Our Delivery time is exclusive of the time it will take to receive item from Merchant/Store</li>
									<li>Free insurance is up to $100 of your item worth. Please contact us if you want to pay extra for full insurance</li>
									<li> For our Shopper Assist service please ensure the URL you share with us reflects the exact item you want
										and all specifications like weight and colour. You can contact us via support@shoptins.com to
										mention any additional requirements</li>
									<li>Providing an address to you to purchase online is free but purchasing online on your
										behalf comes with a GHC 50 admin fee</li>
									<li>Shipping fees are exclusive of import duty and handling charges</li>
								</ol>
							</div>
						</article>
						<article class="list-group-item">
							<header class="filter-header">
								<a href="#" data-toggle="collapse" data-target="#faq" class="collapsed" aria-expanded="false">
									<i class="icon-action fa fa-chevron-down"></i>
									<h6 class="title">FAQs</h6>
								</a>
							</header>
							<div class="filter-content collapse" id="faq" style="">
								<h4>Which countries do you cover ?</h4>
								<p>USA, China, India, Italy, Singapore, UK, Germany, Hong Kong, France, Canada, UAE ,Turkey, South Africa, Spain, Thailand, Japan, South Korea and Malaysia</p><br>
								<h4>Are there any Sign up fees?</h4>
								<p>No it is completely free to sign up</p><br>
								<h4>What is Merchant Shipping?</h4>
								<p>Merchant shipping is the cost of transporting the purchased item from
									the Merchants store/warehouse to our affiliate center at the origin.
									This is different from shipping cost.</p><br>
								<h4>What is shipping cost?</h4>
								<p>Shipping cost is the cost involved in transporting your purchased
									items from the origin to the destination. Please check shipping cost with
									estimator before you place order. Discounts may apply.</p><br>
								<h4>Duties & Taxes</h4>
								<p>Some items are duty free and so you wont have to pay duties, taxes and
									other clearing costs. Other items require duties, taxes and clearing charges.
									Dutiable and Non-Dutiable items are both determined by destination customs
									and so you will be informed about any obligations when your item(s) arrive.
									You can choose to clear yourself after you pay shipping cost, or let us clear
									on your behalf.</p><br>
								<h4>Delivery</h4>
								<p>You can come pickup your item(s) when they arrive in Ghana. If you want us to
									deliver to your doorstep be sure to select the option and provide delivery address</p>
							</div>
						</article>
						<article class="list-group-item">
							<header class="filter-header">
								<a href="#" data-toggle="collapse" data-target="#prohibitedItems" class="collapsed" aria-expanded="false">
									<i class="icon-action fa fa-chevron-down"></i>
									<h6 class="title">Prohibited Items</h6>
								</a>
							</header>
							<div class="filter-content collapse" id="prohibitedItems" style="">
								<h5>ITEMS THAT CANNOT BE SHIPPED FROM THE BELOW ORIGINS</h5>
								<h5>ALL ORIGINS</h5>
								<p>Flammable Batteries, Walkie Talkie, Drone Cameras, Lasers – as Laser Hair Removal or Laser Pens, Pets Supplements, Standalone

									Batteries, Power Banks, Government issued documents***<br>

									Damaged/broken phones of any kind (iPhone, Samsung etc.) Damaged/broken tablets of any kind, Hookah & Hookah Accessories,

									Samsung Note 7, Nail Polish, Any endangered species products (skin, hair,…etc.), All Liquids, Money, legal tender, Minerals</p><br>

								<h5>CHINA</h5>
								<p>Any shipment containing motors, magnets or pumps needs to undergo a magnetic inspection before it can be shipped, Powder items,

									Liquids not otherwise classed as Dangerous Goods, Anti-freeze, or Brake Fluid, or Wet Ice (Frozen Water), Items with Battery, Camphor,

									or Essential Oils (Eucalyptus), Cosmetic Liquid or Palette (please check with the local Sendit team for details), All Liquids</p><br>
								<h5>MALAYSIA</h5>
								<p>
									Dangerous Goods, Firearms, Money, Gold, silver, diamond etc.., Live Organs or Human Remains, Liquids or Chemicals
									Singapore Power Banks, Headphones, Electronic cigarettes and nicotine products
								</p><br>
								<h5>UAE</h5>
								<p>
									Telescopes, The procedure to ship prescription pills
								</p><br>
								<h5>USA</h5>
								<p>
									Items without prrof of purchase, As per Wildlife and Fish Department any endangered species products (skin, hair,…etc.) are not allowed, Electronic Cigarette Accessories
								</p><br>
								<h5>UK</h5>
								<p>
									Toner Cartridges, Car Key
								</p><br>
								<h5>SOUTH KOREA</h5>
								<p>
									All Liquids, Items with Battery

									Destinations Items that cannot be shipped to the below countries

									Azerbaijan Mobile Phones*
								</p><br>
								<h5>EGYPT</h5>
								<p>
									Any Glasses/Pens/Watches that contain Spy Cams, or Mobiles with Camera in a Watch Shape, Planes with Remote Control, or Any Remote

									Controlled shipments, Laptops that are manufactured 5 years prior to the current date are prohibited Only 2 new and 2 used Cell Phones can

									be shipped per year, Motorcycle parts and accessories, or Airplanes of any kind, Nail Polish, GPS Trackers

									GCC Radars
								</p>
								<h5>INDIA</h5>
								<p>
									Food Supplements and Proteins
								</p>
								<h5>JORDAN</h5>
								<p>
									All Small Cameras or all Cameras with Microphones
								</p>
								<h5>KUWAIT</h5>
								<p>
									Laser Pen, Any Games/Pens/Watches that contain Spy Cams Night Vision Goggles
								</p>
								<h5>LIBYA</h5>
								<p>
									Metal Detection Units, Night Vision Goggles, Scopes of any kind, Accessories for any kind of weapons, Sport Weapons,
									Drone Cameras, Walkie Talkies
								</p>
								<h5>OMAN</h5>
								<p>
									Binocular, Plane with or without camera or related to, Watches contain Spy Camera, Any Glasses, Pens, USB, GPS, Watches contain Spy
									Camera, Army or police printed Dresses. Prescription Pills
								</p>
								<h5>QATAR</h5>
								<p>
									Toy Remote Airplane with Camera, Remote Car with Camera, Any Product made in Israel, Hookah and its accessories, Night Vision
									Goggles, Drone Accessories, Telescopes, Scopes of any kind
								</p>
								<h5>SAUDI ARABIA</h5>
								<p>
									Toy Airplane goods with/without Camera, Hair Re-growth Tuner, Watches that contain Spy Cams Any product with hidden Camera such as
									Watches, Pens, etc. Beauty supplies containing Shea Butter and Scented Oils, Smart Watch with Camera
									Singapore Electronic cigarettes, pipes, cigars, tobacco and nicotine products
								</p>
								<h5>Somalia/Somaliland</h5>
								<p>
									Digital Watch, Automotive Parts, Camera, Camera Accessories, Car Electronics/Accessories, Deodorants, Electronics, Home Appliance,
									Home Supplies, Jewelry/Accessories, Lighter, Lighting/Electrical Accessories, Motorcycle Parts, Musical Instrument/Accessories, Nail Polish,
									Perfume, Sports/Exercise Equipment, Sprays, Tea, Tools
									Thailand Animal Supplement, Beauty Supplies, Candy, Cigars, Food/Grocery, Health/Medical Supplies, iPhone, Apple Watch, iPad, iPod, Lighter,
									Mobile/Cell Phone, Others, Perfume, Serums, Sprays, Supplements, Tablet, Tea, Hookah and hookah accessories
								</p>
								<h5>UAE</h5>
								<p>
									Hookah, Cockroach Gel, Tattoo Machines and Ink, Surgical Tools
									Category Items that cannot be shipped via Sendit
									Animals Live or Dead animals, Insects, Reptiles of any kind, Animal Products (Skins, Meat, Fur including Hair Products)
									Antiques Antiques<br>
								<h6>Antiques Antiques</h6>
								Artwork Any collectible painting, Sculpture or other work of Art Antiques
								Counterfeit Goods As per the Customs Law in China, fake/counterfeit goods are not allowed to be shipped out to other countries
								<h5>Corrosives</h5>
								Aluminum chloride, Caustic soda, Corrosive cleaning fluid, Corrosive rust remover/preventative, Corrosive paint remover, Acid (Hydrochloric
								acid, Nitric acid, Sulphuric acid, etc.) Substances which can cause severe damage by chemical action to living tissue, other freight, or the
								means of transport.
								</p>
								<h5>All corrosive substances are prohibited.</h5>
								<p>Drugs Cocaine, Cannabis Resin, LSD and Narcotics, Morphine and Opium, Psychotropic substances, Prescription drugs sent for medical or
									scientific purposes, drugs in prescription quantities may be sent by private individuals in the case of emergencies. etc.
									Electronics Laser (as Laser Hair Removals or Laser Pens), Walkie Talkie, Used Laptops manufactured before 2008 (not allowed in Egypt)</p>
								<h5>Explosives</h5>
								<p>Ammunition, Firearms (including parts), Blasting caps, Christmas cracker snaps, Party poppers, Theatrical flares, Fireworks (Skyrockets,
									Sparklers, Crackers), Flares, Fuses, Ignites, Nitro-glycerin, Any chemical compound, mixture or device capable of producing an explosivepyrotechnic
									effect, with substantial instantaneous release of heat and gas. All explosives are prohibited. etc.
									Fake/ Dummy Games Toy Weapons, Paint Ball Guns and BB guns, Antique weapons, Knives and Swords, Fake grenades,
									Items that could be used as weapons, etc.</p>
								<h5>Flammable liquids</h5>
								<p>
									Alcohol, Perfume, Acetone, Benzene, Kerosene, Motor fuels, Battery fluid, Gasoline, Lighter fuel, Cleaning compounds (Bleach,
									Disinfectants, Laundry detergents, Oven cleaners, etc.), Nail Polish, Paint thinners and removers, Petroleum, Adhesive products (Glue,
									Silicone, etc.) Turpentine, Solvents, Liquids, mixtures of liquids, or liquids containing solids in solution or suspension which give off a
									flammable vapor, etc.
								</p>
								<h5>Flammable solids</h5>
								<p>
									Calcium carbide, Cellulose nitrate products, Matches (any type including safety), Metallic magnesium, Nitro-cellulose based film,
									Phosphorous, Potassium, Sodium, Charcoal, Flint lighters, Hydride, Zinc powder, Zirconium hydride, Substances liable to spontaneous
									combustion. Substances which in contact with water, emit flammable gases. Solid materials which are liable to cause fire by friction,
									absorption of water, spontaneous chemical changes, or retained heat from manufacturing or processing, or which can be readily ignited and
									burn vigorously. etc.Fragile Glassware, Ceramics, Lighting (fluorescent tubes, neon lighting, x-ray tubes, light bulbs, etc.) Musical instruments, Plaster items (fibred clay)
									Gambling Lottery Tickets, Gambling Devices.Gases compressed,
									liquefied or dissolved
									under pressure
									All flammable compressed gases are prohibited (Blowlamps, Butane, Cigarette lighters), Ethane, Gas cylinders (Camping gas cylinders full
									or empty) Ammonia products, Hydrogen, Methane, Propane, etc. Permanent gases, which cannot be liquefied at ambient temperatures;
									liquefied gases, which can become liquid under pressure at ambient temperatures; dissolved gases, which are dissolved under pressure
									in a solvent.
								</p>
								<h5>Government Issued Documents</h5>
								<p>
									Including but not limited to Permanent Residence cards, Green Cards, Work Permits, Passports, Driver’s Licenses, Health Cards,
									Correspondence from respective countries tax authority (e.g., Revenue Canada, Internal Revenue Service, HM Revenue and Customs)
									Minerals Fossils, Jewelry, Stones or stoneware, Marble or any stone derivative
									Miscellaneous Asbestos, Dry ice (solid carbon dioxide), Magnetized material, Toner (Photocopier), etc.
									Negotiable Currency Bullion, Money, Fake/Dummy/Collectable Cash, Payment Cards, Traveler Cheques, Passports, IDs, Stamps
									Oxidizing substances and organic peroxides solids
								</p>
								<p>
									Dyes (Hair, Textile, etc.), Bromates, Chlorates, Components of fiberglass repair kits, Nitrates, Perchlorates, Permanganates, Peroxides,
									Fertilizers, Weed killers, Insecticides, etc. Though not necessarily combustible themselves, these substances may cause or contribute to
									combustion of other substances. They may also be liable to explosive decomposition, react dangerously with other substances, and be
									injurious to health. All oxidizing substances and organic peroxides are prohibited.
									Packaging Wet or leaking Parcels, Parcels emitting odor of any kind
									Perishables Foodstuffs, Perishable Food Articles, Beverages requiring refrigeration or other environmental control
									Plants Plants and Plant material, seeds Pornography Foul or disgusting Material, Pornography and/or obscene Material, Any unsolicited Indecent Item or representation of any kind
									Radioactive material Fissile material (Uranium 235, etc.) Radioactive waste material, Thorium or Uranium ores, etc. All material and samples that are classified as
									radioactive as in the International Civil Aviation Organization’s Technical Instructions are prohibited.
									Remains Human and animal remains, Ashes
									Sharp Tools/Weapons Scissors, Knives, Needles and Cartridges, Guns and Gun Accessories
									Tobacco Products Cigarettes, Cigars, Electronic Cigarettes, Tobacco, etc.
									Toxic and infectious substances	Arsenic, Beryllium, Cyanide, Fluorine, Hydrogen Solenoid, Mercury, Mercury salts, Mustard gas, Nitrobenzene, Nitrogen dioxide, Pesticides,
									Poisons Rat poison, Ebola, Foot and mouth disease, Environmental, clinical and medical waste. Substances liable to cause death or injury if
									swallowed or inhaled, or by skin contact. All toxic substances are prohibited.
									All toxic compressed gases are prohibited(Chlorine, Fluorine, etc.)
									All non-flammable compressed gases are prohibited (Carbon dioxide, Neon, Helium, Nitrogen, Fire extinguishers, etc.)
									All aerosols are prohibited (Hair Spray,Deodorant, etc.)
									Others Shipments - the transportation, exportation or importation of which is prohibited by any law, statute or regulation
									Unacceptable list:
									The following items are
									not eligible for shipping
									All packages are subject to customs inspection and clearance. To avoid shipment confiscation, we recommend you to avoid shipping the items given below.

									If you have queries regarding prohibited items that aren’t listed above, please contact your local Sendit office for assistance.

									* Mobile accessories are allowed

									** With regards to products that fall under the ‘Unacceptable item’ category in specific countries and are not mentioned in this list, we suggest you contact your local

									Sendit office for further details or email support@sendit.global

									*** Including but not limited to Permanent Residence Cards, Green Cards, Work Permits, Passports, Driving Licenses, Health Cards, Correspondence from a

									respective country’s tax authority, e.g. Revenue Canada, Internal Revenue Service, HM Revenue and Customs
								</p>
							</div>
						</article>
					</div> <!-- list-group.// -->

				</aside> <!-- col.// -->
			</div>

		</div> <!-- container .//  -->
	</section>
	<!-- ========================= SECTION CONTENT END// ========================= -->
	<button id="myBtn" data-toggle="modal" data-target="#exampleModal">
		<i class="fa fa-calculator fa-2x"></i>
	</button>
@endsection
