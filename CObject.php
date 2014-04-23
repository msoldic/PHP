<?php
class CObject{
//Start CObject

private $m_id_object;
private $m_type;

private $m_id_house;
private $m_id_appartment;
private $m_name;
private $m_code;
private $m_location;
private $m_gmap_lat;
private $m_gmap_lon;
private $m_sleeps;
private $m_description;
private $m_descriptionEN;
private $m_descriptionDE;
private $m_descriptionIT;

private $m_distance_beach;
private $m_distance_shop;
private $m_distance_fitness;
private $m_distance_downtown;

private $m_area;
private $m_minimum_stay;
private $m_arrival_days;
private $m_smoking;
private $m_air_conditioning; 
private $m_air_conditioning_included; 
private $m_cot;
private $m_pets;
private $m_parking;
private $m_garden;
private $m_seaview;
private $m_microwave;
private $m_oven;
private $m_toaster;
private $m_bbq;
private $m_caffe_machine;
private $m_refrigerator;
private $m_freezer;
private $m_dish_washer;
private $m_washing_machine;
private $m_tv;
private $m_satellite_tv;
private $m_wifi;
private $m_single_bed;
private $m_twin_bed;
private $m_double_bed;
private $m_triple_bed;
private $m_livingroom_beds;
private $m_shower_wc;
private $m_bath_wc;
private $m_wc;
private $m_bidet;
private $m_balcony;
private $m_balcony_seaview;
private $m_terrace;
private $m_terrace_seaview;
private $m_livingroom;
private $m_kitchen;
private $m_diningroom;
private $m_total_beds;
private $m_akcija;
private $m_preporuceno;
private $m_villa;
private $m_pool;
private $quiet_area;
private $central_heating;

private $m_DB;
private $m_UserID;

public function __construct($n=-1) {
	global $Current;
	
	if (isset($Current['DBConnection']))
		$this->m_DB = &$Current['DBConnection'];
	else
		throw new CError('', 50);
		
	if (isset($Current['User']))
		$this->m_UserID = $Current['User'];
	else
		throw new CError('', 60);
}

public function SQLSaveObject() {
		
		if($this->m_type=='house') {
		
			if(isset($this->m_id_house)) { // Uređivanje
				$q='SELECT count(id_house) FROM houses WHERE id_house='.$this->m_DB->safe($this->m_id_house).';';
				$rez=$this->m_DB->svquery($q);
				
				if($rez) {
					
					//Update
					$q='UPDATE houses SET ';
					$q.='title = '.$this->m_DB->safe($this->m_name).', ';
					$q.='code = '.$this->m_DB->safe($this->m_code).', ';
					$q.='location = '.$this->m_DB->safe($this->m_location).', ';				
					$q.='gmap_lon = '.$this->m_DB->safe($this->m_gmap_lon).', ';
					$q.='gmap_lat = '.$this->m_DB->safe($this->m_gmap_lat).', ';
					$q.='description = '.$this->m_DB->safe($this->m_description).', ';
					$q.='description_en = '.$this->m_DB->safe($this->m_descriptionEN).', ';
					$q.='description_de = '.$this->m_DB->safe($this->m_descriptionDE).', ';
					$q.='description_it = '.$this->m_DB->safe($this->m_descriptionIT).', ';
					$q.='sleeps = '.$this->m_DB->safe($this->m_sleeps).', ';
					$q.='total_beds = '.$this->m_DB->safe($this->m_total_beds).', ';
					$q.='distance_beach = '.$this->m_DB->safe($this->m_distance_beach).', ';
					$q.='distance_shop = '.$this->m_DB->safe($this->m_distance_shop).', ';
					$q.='distance_fitness = '.$this->m_DB->safe($this->m_distance_fitness).', ';
					$q.='akcija = '.$this->m_DB->safe($this->m_akcija).', ';
					$q.='preporuceno = '.$this->m_DB->safe($this->m_preporuceno).', ';
					$q.='akcija = '.$this->m_DB->safe($this->m_akcija).', ';
					$q.='distance_downtown = '.$this->m_DB->safe($this->m_distance_downtown).' ';
					$q.=' WHERE id_house = '.$this->m_DB->safe($this->m_id_house).';';
					
					$rez=$this->m_DB->svquery($q);
				}
				else {
					die('ID House don\'t exist!');
				}
			}
			else { // Upisivanje
								
				// Upiši novi objekt u tablicu objekata			
				$q='INSERT INTO objects SET ';
				$q.='type = "house", ';
				$q.='publish = "false";';
				$this->m_DB->svquery($q);
				
				$q='SELECT LAST_INSERT_ID();';
				$this->m_id_object=$this->m_DB->svquery($q);
										
				// Upiši novu kuću i veži ju s upisanim objektom
				$q='INSERT INTO houses SET ';
				$q.='object_id = '.$this->m_DB->safe($this->m_id_object).', ';
				$q.='title = '.$this->m_DB->safe($this->m_name).', ';
				$q.='code = '.$this->m_DB->safe($this->m_code).', ';
				$q.='location = '.$this->m_DB->safe($this->m_location).', ';				
				$q.='gmap_lon = '.$this->m_DB->safe($this->m_gmap_lon).', ';
				$q.='gmap_lat = '.$this->m_DB->safe($this->m_gmap_lat).', ';
				$q.='description = '.$this->m_DB->safe($this->m_description).', ';
				$q.='description_en = '.$this->m_DB->safe($this->m_descriptionEN).', ';
				$q.='description_de = '.$this->m_DB->safe($this->m_descriptionDE).', ';
				$q.='description_it = '.$this->m_DB->safe($this->m_descriptionIT).', ';
				$q.='sleeps = '.$this->m_DB->safe($this->m_sleeps).', ';
				$q.='total_beds = '.$this->m_DB->safe($this->m_total_beds).', ';
				$q.='distance_beach = '.$this->m_DB->safe($this->m_distance_beach).', ';
				$q.='distance_shop = '.$this->m_DB->safe($this->m_distance_shop).', ';
				$q.='distance_fitness = '.$this->m_DB->safe($this->m_distance_fitness).', ';
				$q.='akcija = '.$this->m_DB->safe($this->m_akcija).', ';
				$q.='preporuceno = '.$this->m_DB->safe($this->m_preporuceno).', ';
				$q.='distance_downtown = '.$this->m_DB->safe($this->m_distance_downtown).'; ';
					
				$rez=$this->m_DB->svquery($q);
							
				$q='SELECT LAST_INSERT_ID();';
				$this->m_id_house=$this->m_DB->svquery($q);
			}
		}
		if($this->m_type=='appartment') {
			
			if(isset($this->m_id_appartment)) { // Uređivanje
				$q='SELECT count(id_appartment) FROM appartments WHERE id_appartment='.$this->m_DB->safe($this->m_id_appartment).';';
				$rez=$this->m_DB->svquery($q);
				
				if($rez) {
				
					//Update					
					$q='UPDATE appartments SET ';					
					$q.='title = '.$this->m_DB->safe($this->m_name).', ';
					$q.='code = '.$this->m_DB->safe($this->m_code).', ';	
					$q.='villa = '.$this->m_DB->safe($this->m_villa).', ';
					$q.='description = '.$this->m_DB->safe($this->m_description).', ';
					$q.='description_en = '.$this->m_DB->safe($this->m_descriptionEN).', ';
					$q.='description_de = '.$this->m_DB->safe($this->m_descriptionDE).', ';
					$q.='description_it = '.$this->m_DB->safe($this->m_descriptionIT).' ';
					$q.='WHERE id_appartment = '.$this->m_DB->safe($this->m_id_appartment).' ';
					$q.='AND object_id = '.$this->m_DB->safe($this->m_id_object).';';	
					$rez=$this->m_DB->svquery($q);			
															
					$q='UPDATE appartment_feature_lists SET ';
					$q.='area = '.$this->m_DB->safe($this->m_area).', ';
					$q.='minimum_stay = '.$this->m_DB->safe($this->m_minimum_stay).', ';
					$q.='arrival_days = '.$this->m_DB->safe($this->m_arrival_days).', ';
					$q.='smoking = '.$this->m_DB->safe($this->m_smoking).', ';
					$q.='air_conditioning = '.$this->m_DB->safe($this->m_air_conditioning).', ';
                    $q.='air_conditioning_included = '.$this->m_DB->safe($this->m_air_conditioning_included).', ';
					$q.='garden = '.$this->m_DB->safe($this->m_garden).', ';
					$q.='cot = '.$this->m_DB->safe($this->m_cot).', ';
					$q.='pets = '.$this->m_DB->safe($this->m_pets).', ';
					$q.='parking = '.$this->m_DB->safe($this->m_parking).', ';
					$q.='seaview = '.$this->m_DB->safe($this->m_seaview).', ';
					$q.='quiet_area = '.$this->m_DB->safe($this->m_quiet_area).', ';
					$q.='central_heating = '.$this->m_DB->safe($this->m_central_heating).', ';
					$q.='pool = '.$this->m_DB->safe($this->m_pool).', ';
					$q.='microwave = '.$this->m_DB->safe($this->m_microwave).', ';
					$q.='oven = '.$this->m_DB->safe($this->m_oven).', ';
					$q.='toaster = '.$this->m_DB->safe($this->m_toaster).', ';
					$q.='bbq = '.$this->m_DB->safe($this->m_bbq).', ';
					$q.='caffe_machine = '.$this->m_DB->safe($this->m_caffe_machine).', ';
					$q.='refrigerator = '.$this->m_DB->safe($this->m_refrigerator).', ';
					$q.='freezer = '.$this->m_DB->safe($this->m_freezer).', ';
					$q.='dish_washer = '.$this->m_DB->safe($this->m_dish_washer).', ';
					$q.='washing_machine = '.$this->m_DB->safe($this->m_washing_machine).', ';
					$q.='tv = '.$this->m_DB->safe($this->m_tv).', ';
					$q.='satellite_tv = '.$this->m_DB->safe($this->m_satellite_tv).', ';
                    $q.='wifi = '.$this->m_DB->safe($this->m_wifi).', ';
					$q.='total_beds = '.$this->m_DB->safe($this->m_total_beds).', ';
					$q.='single_bed = '.$this->m_DB->safe($this->m_single_bed).', ';
					$q.='twin_bed = '.$this->m_DB->safe($this->m_twin_bed).', ';
					$q.='double_bed = '.$this->m_DB->safe($this->m_double_bed).', ';
					$q.='triple_bed = '.$this->m_DB->safe($this->m_triple_bed).',';			
					$q.='livingroom_beds = '.$this->m_DB->safe($this->m_livingroom_beds).', ';
					$q.='shower_wc = '.$this->m_DB->safe($this->m_shower_wc).', ';
					$q.='bath_wc = '.$this->m_DB->safe($this->m_bath_wc).', ';
					$q.='wc = '.$this->m_DB->safe($this->m_wc).', ';
                    $q.='bidet = '.$this->m_DB->safe($this->m_bidet).', ';
					$q.='balcony = '.$this->m_DB->safe($this->m_balcony).', ';
					$q.='balcony_seaview = '.$this->m_DB->safe($this->m_balcony_seaview).', ';
					$q.='terrace = '.$this->m_DB->safe($this->m_terrace).', ';
					$q.='terrace_seaview = '.$this->m_DB->safe($this->m_terrace_seaview).', ';
					$q.='livingroom = '.$this->m_DB->safe($this->m_livingroom).', ';
					$q.='kitchen = '.$this->m_DB->safe($this->m_kitchen).', ';				
					$q.='diningroom = '.$this->m_DB->safe($this->m_diningroom).' ';
					$q.='WHERE appartment_id = '.$this->m_DB->safe($this->m_id_appartment).' ';
					$q.='AND object_id = '.$this->m_DB->safe($this->m_id_object).';';					
					$rez=$this->m_DB->svquery($q);				
				}
				else {
					die('ID Appartment don\'t exist!');
				}
			}
			else { // Upisivanje
								
				// Upiši novi objekt u tablicu objekata			
				$q='INSERT INTO objects SET ';
				$q.='type = "appartment", ';
				$q.='publish = "false";';
				$this->m_DB->svquery($q);
				
				$q='SELECT LAST_INSERT_ID();';
				$this->m_id_object=$this->m_DB->svquery($q);
										
				// Upiši novi apartman i veži ga s upisanim objektom
				$q='INSERT INTO appartments SET ';
				$q.='object_id = '.$this->m_DB->safe($this->m_id_object).', ';
				$q.='title = '.$this->m_DB->safe($this->m_name).', ';
				$q.='code = '.$this->m_DB->safe($this->m_code).', ';
				$q.='villa = '.$this->m_DB->safe($this->m_villa).', ';
				$q.='description = '.$this->m_DB->safe($this->m_description).', ';	
				$q.='description_en = '.$this->m_DB->safe($this->m_descriptionEN).', ';
				$q.='description_de = '.$this->m_DB->safe($this->m_descriptionDE).', ';
				$q.='description_it = '.$this->m_DB->safe($this->m_descriptionIT).';';				
								
				$rez=$this->m_DB->svquery($q);							
							
				$q='SELECT LAST_INSERT_ID();';
				$this->m_id_appartment=$this->m_DB->svquery($q);
				
				// Upiši featurese apartmana
				$q='INSERT INTO appartment_feature_lists SET ';
				$q.='object_id = '.$this->m_DB->safe($this->m_id_object).', ';
				$q.='appartment_id = '.$this->m_DB->safe($this->m_id_appartment).', ';
				$q.='area = '.$this->m_DB->safe($this->m_area).', ';
				$q.='minimum_stay = '.$this->m_DB->safe($this->m_minimum_stay).', ';
				$q.='arrival_days = '.$this->m_DB->safe($this->m_arrival_days).', ';
				$q.='smoking = '.$this->m_DB->safe($this->m_smoking).', ';
				$q.='air_conditioning = '.$this->m_DB->safe($this->m_air_conditioning).', ';
                $q.='air_conditioning_included = '.$this->m_DB->safe($this->m_air_conditioning_included).', ';
				$q.='garden = '.$this->m_DB->safe($this->m_garden).', ';
				$q.='cot = '.$this->m_DB->safe($this->m_cot).', ';
				$q.='pets = '.$this->m_DB->safe($this->m_pets).', ';
				$q.='parking = '.$this->m_DB->safe($this->m_parking).', ';
				$q.='seaview = '.$this->m_DB->safe($this->m_seaview).', ';
				$q.='quiet_area = '.$this->m_DB->safe($this->m_quiet_area).', ';
				$q.='central_heating = '.$this->m_DB->safe($this->m_central_heating).', ';
				$q.='pool = '.$this->m_DB->safe($this->m_pool).', ';				
				$q.='microwave = '.$this->m_DB->safe($this->m_microwave).', ';
				$q.='oven = '.$this->m_DB->safe($this->m_oven).', ';
				$q.='toaster = '.$this->m_DB->safe($this->m_toaster).', ';
				$q.='bbq = '.$this->m_DB->safe($this->m_bbq).', ';
				$q.='caffe_machine = '.$this->m_DB->safe($this->m_caffe_machine).', ';
				$q.='refrigerator = '.$this->m_DB->safe($this->m_refrigerator).', ';
				$q.='freezer = '.$this->m_DB->safe($this->m_freezer).', ';
				$q.='dish_washer = '.$this->m_DB->safe($this->m_dish_washer).', ';
				$q.='washing_machine = '.$this->m_DB->safe($this->m_washing_machine).', ';
				$q.='tv = '.$this->m_DB->safe($this->m_tv).', ';
				$q.='satellite_tv = '.$this->m_DB->safe($this->m_satellite_tv).', ';
                $q.='wifi = '.$this->m_DB->safe($this->m_wifi).', ';
				$q.='total_beds = '.$this->m_DB->safe($this->m_total_beds).', ';
				$q.='single_bed = '.$this->m_DB->safe($this->m_single_bed).', ';
				$q.='twin_bed = '.$this->m_DB->safe($this->m_twin_bed).', ';
				$q.='double_bed = '.$this->m_DB->safe($this->m_double_bed).', ';
				$q.='triple_bed = '.$this->m_DB->safe($this->m_triple_bed).',';			
				$q.='livingroom_beds = '.$this->m_DB->safe($this->m_livingroom_beds).', ';
				$q.='shower_wc = '.$this->m_DB->safe($this->m_shower_wc).', ';
				$q.='bath_wc = '.$this->m_DB->safe($this->m_bath_wc).', ';
				$q.='wc = '.$this->m_DB->safe($this->m_wc).', ';
                $q.='bidet = '.$this->m_DB->safe($this->m_bidet).', ';
				$q.='balcony = '.$this->m_DB->safe($this->m_balcony).', ';
				$q.='balcony_seaview = '.$this->m_DB->safe($this->m_balcony_seaview).', ';
				$q.='terrace = '.$this->m_DB->safe($this->m_terrace).', ';
				$q.='terrace_seaview = '.$this->m_DB->safe($this->m_terrace_seaview).', ';
				$q.='livingroom = '.$this->m_DB->safe($this->m_livingroom).', ';
				$q.='kitchen = '.$this->m_DB->safe($this->m_kitchen).', ';				
				$q.='diningroom = '.$this->m_DB->safe($this->m_diningroom).';';			
				$rez=$this->m_DB->svquery($q);	
			}			
		}
	
return true;
}

public function SQLLoadObject() { 
	
	if(isset($this->m_id_object)) {
		$q='SELECT type FROM objects WHERE id_object='.$this->m_DB->safe($this->m_id_object).';';
		$rez=$this->m_DB->svquery($q);
				
		if($rez) {			
			if($rez=='house') {
				//Provjera da li postoji
				$q='SELECT id_house FROM houses WHERE object_id='.$this->m_DB->safe($this->m_id_object).';';
				$this->m_id_house=$this->m_DB->svquery($q);
												
				if($this->m_id_house) {	
					$q='SELECT * FROM houses ';
					$q.='WHERE id_house = '.$this->m_DB->safe($this->m_id_house).';';
								
					//Izvrsavanje querya
					$rez=$this->m_DB->mvquery($q);
						
					//Spremanje vrijednosti u objekt
					$this->SetType('house');
					$this->SetName($rez['title']);
					$this->SetCode($rez['code']);
					$this->SetLocation($rez['location']);
					$this->SetGmapLon($rez['gmap_lon']);
					$this->SetGmapLat($rez['gmap_lat']);
					$this->SetDescription($rez['description']);
					$this->SetDescriptionEN($rez['description_en']);
					$this->SetDescriptionDE($rez['description_de']);
					$this->SetDescriptionIT($rez['description_it']);
					$this->SetSleeps($rez['sleeps']);
					$this->SetTotalBeds($rez['total_beds']);
					$this->SetDistanceBeach($rez['distance_beach']);
					$this->SetDistanceShop($rez['distance_shop']);
					$this->SetAkcija($rez['akcija']);
					$this->SetPreporuceno($rez['preporuceno']);
					$this->SetDistanceFitness($rez['distance_fitness']);
					$this->SetDistanceDowntown($rez['distance_downtown']);
				}
				else {
					//Error		
					die("Error - ID for specified house don't exist!");		
				}
			}
			if($rez=='appartment') {
				
				//Provjera da li postoji
				$q='SELECT id_appartment FROM appartments WHERE object_id='.$this->m_DB->safe($this->m_id_object).';';
				$this->m_id_appartment=$this->m_DB->svquery($q);
												
				if($this->m_id_appartment) {	
					
					// Dohvati osnovno o apartmanu
					$q='SELECT * FROM appartments ';
					$q.='WHERE id_appartment = '.$this->m_DB->safe($this->m_id_appartment).';';
					$rez=$this->m_DB->mvquery($q);
					
					// Dohvati featurese
					$q='SELECT * FROM appartment_feature_lists ';
					$q.='WHERE appartment_id = '.$this->m_DB->safe($this->m_id_appartment).';';
					$features=$this->m_DB->mvquery($q);
					
					//Spremanje vrijednosti u objekt
					$this->SetType('appartment');
					$this->SetName($rez['title']);
					$this->SetCode($rez['code']);
					$this->SetDescription($rez['description']);
					$this->SetDescriptionEN($rez['description_en']);
					$this->SetDescriptionDE($rez['description_de']);
					$this->SetDescriptionIT($rez['description_it']);
					$this->SetVilla($rez['villa']);
					$this->SetType('appartment');
					$this->SetArea($features['area']);
					$this->SetMinimumStay($features['minimum_stay']);
					$this->SetArrivalDays($features['arrival_days']);
					$this->SetSmoking($features['smoking']);
					$this->SetAirConditioning($features['air_conditioning']);
                    $this->SetAirConditioningIncluded($features['air_conditioning_included']);
					$this->SetGarden($features['garden']);
					$this->SetCot($features['cot']);
					$this->SetPets($features['pets']);
					$this->SetParking($features['parking']);
					$this->SetSeaview($features['seaview']);
					$this->SetCentralHeating($features['central_heating']);
					$this->SetQuietArea($features['quiet_area']);
					$this->SetPool($features['pool']);
					$this->SetMicrowave($features['microwave']);
                    $this->SetOven($features['oven']);
					$this->SetToaster($features['toaster']);
					$this->SetBBQ($features['bbq']);
					$this->SetCaffeMachine($features['caffe_machine']);
					$this->SetRefrigerator($features['refrigerator']);
					$this->SetFreezer($features['freezer']);
					$this->SetDishWasher($features['dish_washer']);
					$this->SetWashingMachine($features['washing_machine']);
					$this->SetTV($features['tv']);
					$this->SetSatelliteTV($features['satellite_tv']);
                    $this->SetWifi($features['wifi']);
					$this->SetTotalBeds($features['total_beds']);
					$this->SetSingleBed($features['single_bed']);
					$this->SetTwinBed($features['twin_bed']);
					$this->SetDoubleBed($features['double_bed']);
					$this->SetTripleBed($features['triple_bed']);
					$this->SetLivingroomBeds($features['livingroom_beds']);
					$this->SetShowerWC($features['shower_wc']);
					$this->SetBathWC($features['bath_wc']);
					$this->SetWC($features['wc']);
                    $this->SetBidet($features['bidet']);
					$this->SetBalcony($features['balcony']);
					$this->SetBalconySeaview($features['balcony_seaview']);
					$this->SetTerrace($features['terrace']);
					$this->SetTerraceSeaview($features['terrace_seaview']);
					$this->SetLivingroom($features['livingroom']);
					$this->SetKitchen($features['kitchen']);
					$this->SetDiningroom($features['diningroom']);
				}
				else {
					//Error		
					die("Error - ID for specified appartment don't exist!");		
				}
				
			}	
		}
		else {
			//Error		
			die("Error - ID for specified object don't exist!");
		}
	}
	else {
		die("In order to load object, it must be set!");
	}			
return true;
}

public function SQLDeleteObject() {
	
	if(isset($this->m_id_object)) {
		
		$q='SELECT type FROM objects WHERE id_object='.$this->m_DB->safe($this->m_id_object).';';
		$rez=$this->m_DB->svquery($q);
						
		if($rez) {		
			if($rez=='house') {							
				if(isset($this->m_id_house)) {
					$q = 'SELECT count(id_house) FROM houses WHERE id_house='.$this->m_DB->safe($this->m_id_house).';';
					$rez = $this->m_DB->svquery($q);
					
					if($rez){
												
						$q='DELETE FROM houses ';			
						$q.='WHERE id_house = '.$this->m_DB->safe($this->m_id_house).' ';
						$q.='AND object_id = '.$this->m_DB->safe($this->m_id_object).';';
						$this->m_DB->svquery($q);

						$q='DELETE FROM objects ';			
						$q.='WHERE id_object = '.$this->m_DB->safe($this->m_id_object).' ';
						$q.='AND type = "house";';							
						$this->m_DB->svquery($q);
					}
					else{
						//Error
						die("Error - Home don't exist!");
					}
				}
				else {
					die("In order to delete house, it must be set!");
				}				
			}
			if($rez=='appartment') {
				if(isset($this->m_id_appartment)) {
					$q = 'SELECT count(id_appartment) FROM appartments WHERE id_appartment='.$this->m_DB->safe($this->m_id_appartment).';';
					$rez = $this->m_DB->svquery($q);
									
					if($rez){											
						$q='DELETE FROM appartments ';			
						$q.='WHERE id_appartment = '.$this->m_DB->safe($this->m_id_appartment).' ';
						$q.='AND object_id = '.$this->m_DB->safe($this->m_id_object).';';
						$this->m_DB->svquery($q);
												
						$q='DELETE FROM objects ';			
						$q.='WHERE id_object = '.$this->m_DB->safe($this->m_id_object).' ';	
						$q.='AND type = "appartment";';
						$this->m_DB->svquery($q);
						
						$q='DELETE FROM object_parent_to_object_child ';			
						$q.='WHERE child_id = '.$this->m_DB->safe($this->m_id_object).';';
						$this->m_DB->svquery($q);
																		
						$q='DELETE FROM appartment_feature_lists ';			
						$q.='WHERE appartment_id = '.$this->m_DB->safe($this->m_id_appartment).' ';
						$q.='AND object_id = '.$this->m_DB->safe($this->m_id_object).';';
						$this->m_DB->svquery($q);

						$price = new CPrice();
						$price->SetIdObject($this->m_id_object);
						if($price->SQLLoadPrice()){
							$price->SQLDeletePrice();
						}
					}
					else{
						//Error
						die("Error - Appartment don't exist!");
					}
				}
				else {
					die("In order to delete appartment, it must be set!");
				}
			}
		}
		else {
			//Error		
			die("Error - ID for specified object don't exist!");
		}	
	}
	else {
		die("In order to delete object, it must be set!");
	}
	
return true;
}

// Standalone methods
public function SQLSetPublishStatus($id_object,$status) {
	
	$q='UPDATE objects SET ';
	$q.='publish = '.$this->m_DB->safe($status).' ';
	$q.='WHERE id_object = '.$this->m_DB->safe($id_object).';';
	
	$rez = $this->m_DB->svquery($q);

return $rez;
}
public function SQLGetPublishStatus() {
	
	$q='SELECT publish FROM objects WHERE id_object='.$this->m_id_object.';';
	$rez = $this->m_DB->svquery($q);
	
return $rez;
}

// Getters and setters

public function SetIdObject($idObject){
	$this->m_id_object=$idObject;
}
public function GetIdObject(){
	return $this->m_id_object;
}

public function SetIdHouse($idHouse){
	$this->m_id_house=$idHouse;
}
public function GetIdHouse(){
	return $this->m_id_house;
}

public function SetIdAppartment($idAppartment){
	$this->m_id_appartment=$idAppartment;
}
public function GetIdAppartment(){
	return $this->m_id_appartment;
}

public function SetName($name){
	$this->m_name=$name;
}
public function GetName(){
	return $this->m_name;
}

public function SetType($type){
	$this->m_type=$type;
}
public function GetType(){
	return $this->m_type;
}

public function SetCode($code){
	$this->m_code=$code;
}
public function GetCode(){
	return $this->m_code;
}
public function SetVilla($villa){
	$this->m_villa=$villa;
}
public function GetVilla(){
	return $this->m_villa;
}

public function SetLocation($location){
	$this->m_location=$location;
}
public function GetLocation(){
	return $this->m_location;
}

public function SetGmapLon($gmap_lon){
	$this->m_gmap_lon=$gmap_lon;
}
public function GetGmapLon(){
	return $this->m_gmap_lon;
}

public function SetGmapLat($gmap_lat){
	$this->m_gmap_lat=$gmap_lat;
}
public function GetGmapLat(){
	return $this->m_gmap_lat;
}

public function SetSleeps($sleeps){
	$this->m_sleeps=$sleeps;
}
public function GetSleeps(){
	return $this->m_sleeps;
}

public function SetDescription($description){
	$this->m_description=$description;
}
public function SetDescriptionEN($description){
	$this->m_descriptionEN=$description;
}
public function SetDescriptionDE($description){
	$this->m_descriptionDE=$description;
}
public function SetDescriptionIT($description){
	$this->m_descriptionIT=$description;
}
public function GetDescription(){
	return $this->m_description;
}
public function GetDescriptionEN(){
	return $this->m_descriptionEN;
}
public function GetDescriptionDE(){
	return $this->m_descriptionDE;
}
public function GetDescriptionIT(){
	return $this->m_descriptionIT;
}
public function SetDistanceBeach($distance_beach){
	$this->m_distance_beach=$distance_beach;
}
public function GetDistanceBeach(){
	return $this->m_distance_beach;
}

public function SetDistanceShop($distance_shop){
	$this->m_distance_shop=$distance_shop;
}
public function GetDistanceShop(){
	return $this->m_distance_shop;
}

public function SetDistanceFitness($distance_fitness){
	$this->m_distance_fitness=$distance_fitness;
}
public function GetDistanceFitness(){
	return $this->m_distance_fitness;
}

public function SetDistanceDowntown($distance_downtown){
	$this->m_distance_downtown=$distance_downtown;
}
public function GetDistanceDowntown(){
	return $this->m_distance_downtown;
}

// App feature getters & setters
public function SetArea($area){
	$this->m_area=$area;
}
public function GetArea(){
	return $this->m_area;
}

public function SetMinimumStay($minimum_stay){
	$this->m_minimum_stay=$minimum_stay;
}
public function GetMinimumStay(){
	return $this->m_minimum_stay;
}

public function SetArrivalDays($arrival_days){
	$this->m_arrival_days=$arrival_days;
}
public function GetArrivalDays(){
	return $this->m_arrival_days;
}

public function SetSmoking($smoking){
	$this->m_smoking=$smoking;
}
public function GetSmoking(){
	return $this->m_smoking;
}

public function SetAirConditioning($air_conditioning){
	$this->m_air_conditioning=$air_conditioning;
}
public function GetAirConditioning(){
	return $this->m_air_conditioning;
}

public function SetAirConditioningIncluded($air_conditioning_included){
	$this->m_air_conditioning_included=$air_conditioning_included;
}
public function GetAirConditioningIncluded(){
	return $this->m_air_conditioning_included;
}

public function SetGarden($garden){
	$this->m_garden=$garden;
}
public function GetGarden(){
	return $this->m_garden;
}

public function SetCot($cot){
	$this->m_cot=$cot;
}
public function GetCot(){
	return $this->m_cot;
}

public function SetPets($pets){
	$this->m_pets=$pets;
}
public function GetPets(){
	return $this->m_pets;
}

public function SetParking($parking){
	$this->m_parking=$parking;
}
public function GetParking(){
	return $this->m_parking;
}

public function SetSeaview($seaview){
	$this->m_seaview=$seaview;
}
public function GetSeaview(){
	return $this->m_seaview;
}
public function SetCentralHeating($heating){
	$this->m_central_heating=$heating;
}
public function GetCentralHeating(){
	return $this->m_central_heating;
}
public function SetQuietArea($quiet){
	$this->m_quiet_area=$quiet;
}
public function GetQuietArea(){
	return $this->m_quiet_area;
}
public function SetPool($pool){
	$this->m_pool=$pool;
}

public function GetPool(){
	return $this->m_pool;
}

public function SetMicrowave($microwave){
	$this->m_microwave=$microwave;
}
public function GetMicrowave(){
	return $this->m_microwave;
}

public function SetOven($oven){
	$this->m_oven=$oven;
}
public function GetOven(){
	return $this->m_oven;
}

public function SetToaster($toaster){
	$this->m_toaster=$toaster;
}
public function GetToaster(){
	return $this->m_toaster;
}

public function SetBBQ($bbq){
	$this->m_bbq=$bbq;
}
public function GetBBQ(){
	return $this->m_bbq;
}

public function SetCaffeMachine($caffe_machine){
	$this->m_caffe_machine=$caffe_machine;
}
public function GetCaffeMachine(){
	return $this->m_caffe_machine;
}

public function SetRefrigerator($refrigerator){
	$this->m_refrigerator=$refrigerator;
}
public function GetRefrigerator(){
	return $this->m_refrigerator;
}

public function SetFreezer($freezer){
	$this->m_freezer=$freezer;
}
public function GetFreezer(){
	return $this->m_freezer;
}

public function SetDishWasher($dish_washer){
	$this->m_dish_washer=$dish_washer;
}
public function GetDishWasher(){
	return $this->m_dish_washer;
}

public function SetWashingMachine($washing_machine){
	$this->m_washing_machine=$washing_machine;
}
public function GetWashingMachine(){
	return $this->m_washing_machine;
}

public function SetTV($tv){
	$this->m_tv=$tv;
}
public function GetTV(){
	return $this->m_tv;
}

public function SetSatelliteTV($satellite_tv){
	$this->m_satellite_tv=$satellite_tv;
}
public function GetSatelliteTV(){
	return $this->m_satellite_tv;
}
public function SetWifi($wifi){
	$this->m_wifi=$wifi;
}
public function GetWifi(){
	return $this->m_wifi;
}

public function SetTotalBeds($total_beds){
	$this->m_total_beds=$total_beds;
}
public function GetTotalBeds(){
	return $this->m_total_beds;
}

public function SetSingleBed($single_bed){
	$this->m_single_bed=$single_bed;
}
public function GetSingleBed(){
	return $this->m_single_bed;
}

public function SetTwinBed($twin_bed){
	$this->m_twin_bed=$twin_bed;
}
public function GetTwinBed(){
	return $this->m_twin_bed;
}

public function SetDoubleBed($double_bed){
	$this->m_double_bed=$double_bed;
}
public function GetDoubleBed(){
	return $this->m_double_bed;
}

public function SetTripleBed($triple_bed){
	$this->m_triple_bed=$triple_bed;
}
public function GetTripleBed(){
	return $this->m_triple_bed;
}

public function SetLivingroomBeds($livingroom_beds){
	$this->m_livingroom_beds=$livingroom_beds;
}
public function GetLivingroomBeds(){
	return $this->m_livingroom_beds;
}

public function SetShowerWC($shower_wc){
	$this->m_shower_wc=$shower_wc;
}
public function GetShowerWC(){
	return $this->m_shower_wc;
}

public function SetBathWC($bath_wc){
	$this->m_bath_wc=$bath_wc;
}
public function GetBathWC(){
	return $this->m_bath_wc;
}

public function SetWC($wc){
	$this->m_wc=$wc;
}
public function GetWC(){
	return $this->m_wc;
}

public function SetBidet($bidet){
	$this->m_bidet=$bidet;
}
public function GetBidet(){
	return $this->m_bidet;
}

public function SetBalcony($balcony){
	$this->m_balcony=$balcony;
}
public function GetBalcony(){
	return $this->m_balcony;
}

public function SetBalconySeaview($balcony_seaview){
	$this->m_balcony_seaview=$balcony_seaview;
}
public function GetBalconySeaview(){
	return $this->m_balcony_seaview;
}

public function SetTerrace($terrace){
	$this->m_terrace=$terrace;
}
public function GetTerrace(){
	return $this->m_terrace;
}

public function SetTerraceSeaview($terrace_seaview){
	$this->m_terrace_seaview=$terrace_seaview;
}
public function GetTerraceSeaview(){
	return $this->m_terrace_seaview;
}

public function SetLivingroom($livingroom){
	$this->m_livingroom=$livingroom;
}
public function GetLivingroom(){
	return $this->m_livingroom;
}

public function SetKitchen($kitchen){
	$this->m_kitchen=$kitchen;
}
public function GetKitchen(){
	return $this->m_kitchen;
}
public function SetAkcija($akcija){
	$this->m_akcija=$akcija;
}
public function GetAkcija(){
	return $this->m_akcija;
}
public function SetPreporuceno($preporuceno){
	$this->m_preporuceno=$preporuceno;
}
public function GetPreporuceno(){
	return $this->m_preporuceno;
}
public function SetDiningroom($diningroom){
	$this->m_diningroom=$diningroom;
}
public function GetDiningroom(){
	return $this->m_diningroom;
}

//End CHome
}