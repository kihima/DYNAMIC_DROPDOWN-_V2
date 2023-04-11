<!DOCTYPE html>
<html>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
<body>
<label>County:</label>
<select id="county" onchange="getConstituencies()">
  <option value="">-- Select County --</option>
</select>

<label>Constituency:</label>
<select id="constituency" onchange="getWards()">
  <option value="">-- Select Constituency --</option>
</select>

<label>Ward:</label>
<select id="ward" onchange="getPollings()">
  <option value="">-- Select Ward --</option>
</select>

<label>Polling Station:</label>
<select id="polling">
  <option value="">-- Select Polling Station --</option>
</select>

</body>
</html>
<script>
// Counties data in JSON format
var counties = [{"name": "Mombasa", 
                    "constituencies": [{
                      "name": "Changamwe", 
                        "wards": [{ 
                          "name": "Port Reitz", 
                            "pollings": [{"name": "Bomu Primary School"}, 
                                        {"name": "Mwijabu Primary School"}, 
                                        {"name": "Lilongwe Garden"}, 
                                        {"name": "Bomu Stadium"}, 
                                        {"name": "Bomu Secondary School"}, 
                                        {"name": "Full Gospel Church"}
                                    ]
                        },
                        {
                          "name": "Kipevu", 
                            "pollings": [{"name": "Umoja Primary School"}, 
                                        {"name": "Kisumu Ndogo Ground"},
                                        {"name": "Kwa Hola Primary"},
                                        {"name": "Cape Town Ground"},
                                        {"name": "Kaloleni Ground"},
                                        {"name": "Akamba Handcraft Coop. Society"}
                                    ]
                        },
                        {
                            "name": "Airport", 
                              "pollings": [{"name": "Bokole Nursery School"}, 
                                          {"name": "Baraka Village"},
                                          {"name": "Al-Irshadi Nursery"},
                                          {"name": "Mwindani Social Hall"},
                                          {"name": "Portreitz Nursery"}
                                      ]
                          },
                        {
                          "name": "Changamwe",
                            "pollings": [{"name": "Changamwe Social Hall"}, 
                                        {"name": "Changamwe Primary"},
                                        {"name": "St. Lwanga Primary"},
                                        {"name": "Changamwe Secondary"},
                                        {"name": "Gome Primary School"},
                                        {"name": "Magongo Primary"},
                                        {"name": "Baptist Church Primary"},
                                        {"name": "Bishop Mkala Academy"},
                                        {"name": "Kimbilio Academy"},
                                        {"name": "AIC Church Hall"}
                                    ]
                        },
                        {
                            "name": "Chaani",
                              "pollings": [{"name": "Chaani Social Hall"}, 
                                          {"name": "Kipevu Primary School"},
                                          {"name": "Mikidani Primary School"},
                                          {"name": "Chaani Secondary School"},
                                          {"name": "Chaani Primary School"},
                                          {"name": "Chaani Chief's Office"},
                                          {"name": "Kasarani Grounds"}
                                      ]
                          }
                      ]
                  },
                {
                    "name": "Jomvu", 
                    "wards": [{ 
                      "name": "Jomvu Kuu", 
                        "pollings": [{"name": "Miritini World Bank Primary School"}, 
                                    {"name": "Jomvu Kuu Primary School"}, 
                                    {"name": "Taratibu Social Hall"}, 
                                    {"name": "Mirironi Primary School"}, 
                                    {"name": "Jomvu Narcol Nursery School"}, 
                                    {"name": "Swaleh Khalid Social Hall"},
                                    {"name": "Nuru Community Based Rehab"},
                                    {"name": "Badi Twalib Primary School"},
                                    {"name": "Aldinnah Open Grounds"},
                                    {"name": "Misufini Open Grounds"}
                                ]
                    },
                    {
                      "name": "Miritini", 
                        "pollings": [{"name": "Abu-Ubaida Primary School"}, 
                                    {"name": "Miritini Primary School"},
                                    {"name": "Bamako Innitiative Miritini"},
                                    {"name": "Railway Station Hall"},
                                    {"name": "Mwamlai Primary School"},
                                    {"name": "Chabeat Open Ground-Chamuny"},
                                    {"name": "Maganda Primary School"}
                                ]
                    },
                    {
                        "name": "Mikindani", 
                          "pollings": [{"name": "Ministry of Water Tanks"}, 
                                      {"name": "Owino Uhuru Nursery School"},
                                      {"name": "Kwa Shee Primary School"},
                                      {"name": "Amani Primary School"},
                                      {"name": "St. Mary's Bangladesh Primary School"},
                                      {"name": "Mikindani Primary School"},
                                      {"name": "New Kibarani Primary School"},
                                      {"name": "Kajembe High School"},
                                      {"name": "Nazarene Nursery School"},
                                      {"name": "Mwembeni Open Grounds"}
                                  ]
                      }
                ] 
                }]
                  
                  }  
                
                
                
                ]


// Populate counties dropdown
var countyDropdown = document.getElementById("county");
for (var i = 0; i < counties.length; i++) {
  var countyOption = document.createElement("option");
  countyOption.value = counties[i].name;
  countyOption.text = counties[i].name;
  countyDropdown.add(countyOption);
}

// Populate constituencies dropdown
function getConstituencies() {
  var constituencyDropdown = document.getElementById("constituency");
  constituencyDropdown.length = 1;
  var selectedCounty = countyDropdown.value;
  if (selectedCounty !== "") {
    for (var i = 0; i < counties.length; i++) {
      if (counties[i].name === selectedCounty) {
        var constituencies = counties[i].constituencies;
        for (var j = 0; j < constituencies.length; j++) {
          var constituencyOption = document.createElement("option");
          constituencyOption.value = constituencies[j].name;
          constituencyOption.text = constituencies[j].name;
          constituencyDropdown.add(constituencyOption);
        }
      }
    }
  }
}

// Populate wards dropdown
var constituencyDropdown = document.getElementById("constituency");
  constituencyDropdown.length = 1;
function getWards() {
  var wardDropdown = document.getElementById("ward");
  wardDropdown.length = 1;
  var selectedCounty = countyDropdown.value;
  var selectedConstituency = constituencyDropdown.value;
  if (selectedCounty !== "" && selectedConstituency !== "") {
    for (var i = 0; i < counties.length; i++) {
      if (counties[i].name === selectedCounty) {
        var constituencies = counties[i].constituencies;
        for (var j = 0; j < constituencies.length; j++) {
          if (constituencies[j].name === selectedConstituency) {
            var wards = constituencies[j].wards;
            for (var k = 0; k < wards.length; k++) {
              var wardOption = document.createElement("option");
              wardOption.value = wards[k].name;
              wardOption.text = wards[k].name;
              wardDropdown.add(wardOption);
            }
          }
        }
      }
    }
  }
}
// Populate polling station dropdown
var wardDropdown = document.getElementById("ward");
  wardDropdown.length = 1;
function getPollings() {
  var pollingDropdown = document.getElementById("polling");
  pollingDropdown.length = 1;
  var selectedCounty = countyDropdown.value;
  var selectedConstituency = constituencyDropdown.value;
  var selectedWard = wardDropdown.value;
  if (selectedCounty !== "" && selectedConstituency !== "" && selectedWard !== "") {
    for (var i = 0; i < counties.length; i++) {
      if (counties[i].name === selectedCounty) {
        var constituencies = counties[i].constituencies;
        for (var j = 0; j < constituencies.length; j++) {
          if (constituencies[j].name === selectedConstituency) {
            var wards = constituencies[j].wards;
            for (var k = 0; k < wards.length; k++) {
              if (wards[k].name === selectedWard) {
                var pollings = wards[k].pollings;
                for (var l = 0; l < pollings.length; l++) {
                  var pollingOption = document.createElement("option");
                  pollingOption.value = pollings[l].name;
                  pollingOption.text = pollings[l].name;
                  pollingDropdown.add(pollingOption);
               }
              }
            }
          } 
        }
      }
    }
  }
}

</script>