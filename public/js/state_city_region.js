////////////////////////////////////////////////////////////////////////////
// state_city_region.js ///////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////

var states = Object();

states['India'] = '|Andaman/Nicobar Islands|Andhra Pradesh|Arunachal Pradesh|Assam|Bihar|Chandigarh|Chhattisgarh|Dadra/Nagar Haveli|Daman/Diu|Goa|Gujarat|Haryana|Himachal Pradesh|Jammu/Kashmir|Jharkhand|Karnataka|Kerala|Lakshadweep|Madhya Pradesh|Maharashtra|Manipur|Meghalaya|Mizoram|Nagaland|Orissa|Pondicherry|Punjab|Rajasthan|Sikkim|Tamil Nadu|Tripura|Uttaranchal|Uttar Pradesh|West Bengal';
/*
states['Andhra Pradesh'] = '
    |Edlabad to Adilabad|
    |Bhagyanagaram - Hyderabad|
    |Elgandal to Karimnagar|
    |Indur to Nizamabad|
    |Metuku to Medak|
    |Paalamuru to Mahabubnagar|
    |Ellore to Eluru (change effective 1949)|
    |Waltair to Vizagapatam|
    |Vizagapatam to Visakhapatnam|
    |Bezawada to Vijayawada|
    |Cuddapah to kadapa to YSR district|
    |Ongole Dist. to Prakasam|
    |Nellore Dist. to Sri Potti Sri Ramulu Nellore district|
    |Cocanada to Kakinada|
    |Masulipatam to Machilipatnam|
    |Ekasilanagaram to vorugallu|
    |Vorugallu to Warangal';

states['Assam'] = '

    |Nowgong to Nagaon|
    |Gauhati to Guwahati (change effective 1983)|
    |Sibsagar to Sivasagar';

Gujarat

    Baroda to Vadodara (change effective 1974)
    Broach to Bharuch
    Cambay to Khambhat
    Bulsar to Valsad

Himachal Pradesh

    Simla to Shimla
    Mandav Nagar to Mandi

Karnataka

    Bangalore to Bengaluru
    Mysore to Mysuru
    Mangalore to Mangaluru
    Hubli to Hubballi
    Tumkur to Tumakuru
    Shimaga to Shivamogga
    Belgaum to Belagavi
    Bellary to Ballari

Kerala

    Trivandrum to Thiruvananthapuram (change effective from 1991)
    Cochin to Kochi (change effective from 1996)
    Calicut to Kozhikode
    Quilon to Kollam
    Trichur to Thrissur
    Cannanore to Kannur
    Palghat to Palakkad
    Alleppey to Alappuzha (change effective from 1990)
    Alwaye to Aluva
    Parur to North Paravur
    Cranganore to Kodungallur
    Tellicherry to Thalassery
    Badagara to Vatakara
    Palai to Pala
    Verapoly to Varapuzha
    Cherpalchery to Cherpulassery
    Koney to Konni

Madhya Pradesh

    Ahilyanagari/Indur to Indore
    Avantika to Ujjain
    Bhelsa to Vidisha
    Rassen to Raisen
    Saugor to Sagar
    Jubbulpore to Jabalpur
    Bhopal Bairagarh to Sant Hirda Ram Nagar, Bhopal
    Bellasgate to Bheraghat
    Ojjain to Ujjaini
    Mandu to Mandavgarh

Maharashtra

    Bombay to Mumbai
    Nasik to Nashik
    Poona to Pune
    Thana to Thane

Puducherry

    Pondicherry to Puducherry (change effective from 1 October 2006)
    Yanaon to Yanam (change effective from merger with Indian Union)

Punjab

    Jullunder to Jalandhar
    Ropar to Rupnagar
    Mohali to SAS Nagar
    Nawan Shahar to Shaheed Bhagat Singh Nagar

Rajasthan

    Ajaymeru to Ajmer

Tamil Nadu

    Periyar District to Erode (change effective 1996)
    Tinnevelly to Tirunelveli
    Tranquebar to Tharangambadi
    Trichinopoly to Tiruchirapalli (change effective 1971)
    Madras to Chennai (change effective August 1996)
    Tanjore to Thanjavur
    Tuticorin to Thoothukudi
    Cape Comorin to Kanyakumari
    Ootacamund to Udagamandalam
    Conjeevaram to Kanchipuram
    Virudupatti to Virudhunagar
    Potonovo to Parangipettai
    Mayavaram to Mayiladuthurai

Uttar Pradesh

    Cawnpore to Kanpur (change effective 1948)--posted by Upasana Yadav
    Banaras to Varanasi (change effective 1956)
    Kanpur Dehat to Ramabai Nagar district (change effective 2010)
    Ramabai Nagar to Kanpur Dehat (Change effective 2013)
    Prayag to Allahabad

West Bengal

    Calcutta to Kolkata (change effective from 1 January 2001)
    Burdwan to Bardhaman
    Chinsurah to Hugli-Chuchura

*/
////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////

function getStates()
{
	for (city in states)
		document.write('<option value="' + city + '">' + city + '</option>');
}

function set_country(oRegionSel, oCountrySel, oCity_StateSel)
{
	var countryArr;
	oCountrySel.length = 0;
	oCity_StateSel.length = 0;
	var region = oRegionSel.options[oRegionSel.selectedIndex].text;
	if (countries[region])
	{
		oCountrySel.disabled = false;
		oCity_StateSel.disabled = true;
		oCountrySel.options[0] = new Option('SELECT COUNTRY','');
		countryArr = countries[region].split('|');
		for (var i = 0; i < countryArr.length; i++)
			oCountrySel.options[i + 1] = new Option(countryArr[i], countryArr[i]);
		document.getElementById('txtregion').innerHTML = region;
		document.getElementById('txtplacename').innerHTML = '';
	}
	else oCountrySel.disabled = true;
}

function set_city_state(oCountrySel, oCity_StateSel)
{
	var city_stateArr;
	oCity_StateSel.length = 0;
	var country = oCountrySel.options[oCountrySel.selectedIndex].text;
	if (city_states[country])
	{
		oCity_StateSel.disabled = false;
		oCity_StateSel.options[0] = new Option('SELECT NEAREST DIVISION','');
		city_stateArr = city_states[country].split('|');
		for (var i = 0; i < city_stateArr.length; i++)
			oCity_StateSel.options[i+1] = new Option(city_stateArr[i],city_stateArr[i]);
		document.getElementById('txtplacename').innerHTML = country;
	}
	else oCity_StateSel.disabled = true;
}

function print_city_state(oCountrySel, oCity_StateSel)
{
	var country = oCountrySel.options[oCountrySel.selectedIndex].text;
	var city_state = oCity_StateSel.options[oCity_StateSel.selectedIndex].text;
	if (city_state && city_states[country].indexOf(city_state) != -1)
		document.getElementById('txtplacename').innerHTML = city_state + ', ' + country;
	else document.getElementById('txtplacename').innerHTML = country;
}