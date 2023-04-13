<!DOCTYPE html>
<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  </head>
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
                },
                {
                    "name": "Kisauni", 
                    "wards": [{ 
                      "name": "Junda", 
                        "pollings": [{"name": "Manyani Grounds"}, 
                                    {"name": "IFC Church"}, 
                                    {"name": "Emmas Academy"}, 
                                    {"name": "New Hope Secondary School"}, 
                                    {"name": "Assistant Chief's Camp-Machafuko"}, 
                                    {"name": "Junda Assistant Chief's Camp"}                
                                ]
                    },
                    {
                      "name": "Bamburi", 
                        "pollings": [{"name": "Kashani Primary School"}, 
                                    {"name": "Majaoni Primary School"},
                                    {"name": "Kiembeni Primary School"},
                                    {"name": "St. Elizabeth Academy"},
                                    {"name": "Mdengerekeni Primary School"}                                    
                                ]
                    },
                    {
                        "name": "Mwakirunge", 
                          "pollings": [{"name": "Marimani Primary School"}, 
                                      {"name": "Colorado Primary School"},
                                      {"name": "Voroni Community Primary School"},
                                      {"name": "Maunguja Primary School"},
                                      {"name": "Mwakirunge Primary School"}                                                                          
                                  ]
                      },
                      {
                        "name": "Mtopanga", 
                          "pollings": [{"name": "Kiembeni Baptist Primary School"}, 
                                      {"name": "Mtopanga Primary School"},
                                      {"name": "Concordia Primary School"},
                                      {"name": "Community of Christ Church"},
                                      {"name": "St. Josephs Herman Primary School"},
                                      {"name": "Perma Sharp Grounds"}                                                                         
                                  ]
                      },
                      {
                        "name": "Magogoni", 
                          "pollings": [{"name": "Mishomoroni Junior Academy"}, 
                                      {"name": "Mwandoni (Kishada) Play Ground"},
                                      {"name": "Barsheba Sokoni Grounds"},
                                      {"name": "Mwandoni Blue Bench Grounds"},
                                      {"name": "Mwanndoni Kwa Mtumwa Ground"},
                                      {"name": "Mjahidina Muslim School"}                                                                         
                                  ]
                      },
                      {
                        "name": "Shanzu", 
                          "pollings": [{"name": "Mikoroshoni Primary School"}, 
                                      {"name": "Utange Primary School"},
                                      {"name": "Zimlat Primary School"},
                                      {"name": "Bamburi Primary School"},
                                      {"name": "Shanzu Teachers Training School"},
                                      {"name": "Shimo la tewa Primary School"},
                                      {"name": "Mwembelegeza Primary School"}                                                                         
                                  ]
                      }
                ] 
                },
                {
                  "name": "Nyali", 
                  "wards": [{ 
                    "name": "Frere Town", 
                      "pollings": [{"name": "Khadija Primary School"}, 
                                  {"name": "Fadhil-Adhym Primary School"}, 
                                  {"name": "Mlaleo Primary School"}, 
                                  {"name": "Frere Town Primary School"}, 
                                  {"name": "Mwandoni Kadiria Grounds"}, 
                                  {"name": "Victoria Baptist Primary School"},
                                  {"name": "Sarajevo Grounds"},
                                  {"name": "Freretown Secondary School"},
                                  {"name": "Khadija Secondary School"}        
                              ]
                  },
                  {
                    "name": "Ziwa La Ng'ombe", 
                      "pollings": [{"name": "National Industrial Training"}, 
                                  {"name": "Ziwa La Ng'ombe Primary School"},
                                  {"name": "Olive Rehabilitation Centre"},
                                  {"name": "Tumaini Academy/Church of Christ"},
                                  {"name": "Kicodep Hall"},
                                  {"name": "Azhar Primary School"}                                   
                              ]
                  },
                  {
                      "name": "Mkomani", 
                        "pollings": [{"name": "Maweni Primary School"}, 
                                    {"name": "Ask Ground - Gate 'A'"},
                                    {"name": "Mkomani Grounds"},
                                    {"name": "Pentrose Community Primary School"},
                                    {"name": "Maweni Mixed Secondary School"}                                                                          
                                ]
                    },
                    {
                      "name": "Kongowea", 
                        "pollings": [{"name": "Kongowea Primary School"}, 
                                    {"name": "Kwa Karama Grounds"},
                                    {"name": "Kengeleni Primary School"},
                                    {"name": "Municipal Social Hall"},
                                    {"name": "Methodist Church"},
                                    {"name": "Kongowea Secondary School"}                                                                         
                                ]
                    },
                    {
                      "name": "Kadzandani", 
                        "pollings": [{"name": "Bombolulu Cultural Centre Work"}, 
                                    {"name": "Bahawani Primary School"},
                                    {"name": "Bashir Primary School"},
                                    {"name": "Kadzandani Primary School"},
                                    {"name": "Marianist Polytechnic"},
                                    {"name": "Soweto Grounds"},
                                    {"name": "Mwatamba Grounds"},
                                    {"name": "Kwa Bullo Primary/Secondary School"},
                                    {"name": "Teman Junior Academy"}                                                                                   
                                ]
                    }
              ] 
              },
              {
                "name": "Likoni", 
                "wards": [{ 
                  "name": "Mtongwe", 
                    "pollings": [{"name": "Mtongwe Primary School"}, 
                                {"name": "Longo Primary School"}, 
                                {"name": "Mtongwe Social Hall"}, 
                                {"name": "Vijiweni Primary School"}, 
                                {"name": "Mwangala Primary School"}, 
                                {"name": "Mweza Primary School"},
                                {"name": "Mkwajuni Market"},
                                {"name": "St. Joseph Nursery School"},
                                {"name": "Mtongwe Vocational Training"}        
                            ]
                },
                {
                  "name": "Shika Adabu", 
                    "pollings": [{"name": "Shika Adabu Primary School"}, 
                                {"name": "Consolata Primary School"},
                                {"name": "Vyemani Primary School"},
                                {"name": "Vijiweni Grounds"},
                                {"name": "Ujamaa Grounds"},
                                {"name": "Mishi Mboko Girls Secondary School"},
                                {"name": "Inspirations Primary School"},
                                {"name": "Shika Adabu Secondary School"}                                   
                            ]
                },
                {
                    "name": "Bofu", 
                      "pollings": [{"name": "Daru Ulum Madrasa"}, 
                                  {"name": "Jamvi La Wageni Primary School"},
                                  {"name": "Peleleza Primary School"},
                                  {"name": "Likoni Muslim Primary School"},
                                  {"name": "Bomani Football Ground"}                                                                         
                              ]
                  },
                  {
                    "name": "Likoni", 
                      "pollings": [{"name": "Likoni Primary School"}, 
                                  {"name": "Jesus Celebration Center (Soweto)"},
                                  {"name": "Likoni Secondary School"}                                                                      
                              ]
                  },
                  {
                    "name": "Timbwani", 
                      "pollings": [{"name": "Likoni Flats Social Hall"}, 
                                  {"name": "Consolata Nursery School"},
                                  {"name": "Timbwani Primary School"},
                                  {"name": "Mrima Primary School"},
                                  {"name": "Ushindi Baptist Primary School"},
                                  {"name": "Maji Safi Primary School"},
                                  {"name": "LICODEP"},
                                  {"name": "Timbwani Secondary School"},
                                  {"name": "Caltex Grounds"},
                                  {"name": "Timbwani Baptist Primary School"}                                                                                   
                              ]
                  }
            ] 
            },
            {
              "name": "Mvita", 
              "wards": [{ 
                "name": "Mji Wa", 
                  "pollings": [{"name": "Kaderbhoy Old Town Dispensary"}, 
                              {"name": "Fort Jesus Museum"}, 
                              {"name": "Coast Girls Secondary School"}, 
                              {"name": "Star of the Sea Primary School"}, 
                              {"name": "Mbaraki Primary School"}, 
                              {"name": "Sonara Social Hall"},
                              {"name": "Allidina Visram High School"},
                              {"name": "Hajam Jamaat Hall"},
                              {"name": "Serani Primary School"},
                              {"name": "Mombasa Primary School"},
                              {"name": "Kenya School of Government"},
                              {"name": "Tijara Gardens"}              
                          ]
              },
              {
                "name": "Tudor", 
                  "pollings": [{"name": "Tudor Village Hall"}, 
                              {"name": "St. Augustine Primary School"},
                              {"name": "Tudor Primary School"},
                              {"name": "R. G. Ngala Primary School"},
                              {"name": "Fahari Primary School"},
                              {"name": "Sparki Primary School"},
                              {"name": "Burhania Primary School"},
                              {"name": "Municipal Inspectorate Offices"},
                              {"name": "Tudor Day Secondary School"},
                              {"name": "KPA Hall Makande"},
                              {"name": "Khamisi Secondary School"}                                      
                          ]
              },
              {
                  "name": "Tononoka", 
                    "pollings": [{"name": "Mwembe-Tayari Public Health Clinic"}, 
                                {"name": "Kumbar Primary School"},
                                {"name": "Al-Amani Social Hall"},
                                {"name": "Shariff Nassir Secondary School"},
                                {"name": "Chandaria Hall"},
                                {"name": "Kikowani Primary School"},
                                {"name": "Tononoka Social Hall"},
                                {"name": "Tononoka Nursery School"},
                                {"name": "Municipal Stadium"},
                                {"name": "Central Girls Primary School"},
                                {"name": "Buxton Estate Hall"}                                                                            
                            ]
                },
                {
                  "name": "Shimanzi/Ganjoni", 
                    "pollings": [{"name": "Public Works Offices"}, 
                                {"name": "Makande KPA Nursery School"},
                                {"name": "Makupa Primary School"},
                                {"name": "Makande Primary School"},
                                {"name": "Shimanzi KPA Nursery School"},
                                {"name": "KPA Hall High Level"},
                                {"name": "Little Theatre Club"},
                                {"name": "Sacred Heart Primary School"},
                                {"name": "KPA Social Hall"},
                                {"name": "Bandari College"},
                                {"name": "Ganjoni Municipal Clinic"},
                                {"name": "Majengo Primary School"},
                                {"name": "King'orani Prison (Jela Baridi)"}                                                                                   
                            ]
                },
                {
                  "name": "Majengo", 
                    "pollings": [{"name": "Patel Samaj Hall"}, 
                                {"name": "Guru Nanak Primary School"},
                                {"name": "Mwembe-Tayari Public Health Department"},
                                {"name": "Koblenz Hall"},
                                {"name": "Uhuru Gardens"},
                                {"name": "Lohana Hall"},
                                {"name": "Lasco Social Hall (KPA)"},
                                {"name": "Majengo Village Hall"},
                                {"name": "Sakina Hall"},
                                {"name": "Mvita Primary School"},
                                {"name": "Mvita Boys Secondary School"}                                                                                    
                            ]
                }
          ] 
          }
            ]
                  
  },
  {"name": "Kwale", 
                    "constituencies": [{
                      "name": "Msambweni", 
                        "wards": [{ 
                          "name": "Gombato Bongwe", 
                            "pollings": [{"name": "Mwaroni Primary School"}, 
                                        {"name": "Mwakamba Primary School"}, 
                                        {"name": "Shamu Primary School"}, 
                                        {"name": "Mwamanga Primary School"}, 
                                        {"name": "Mabokoni Primary School"}, 
                                        {"name": "Bongwe Primary School"},
                                        {"name": "Mbuwani Primary School"},
                                        {"name": "Mwamambi Primary School"},
                                        {"name": "Jogoo Football Grounds"},
                                        {"name": "Ministry of Works Quarters"},
                                        {"name": "Mlungu Nipa Primary School"},
                                        {"name": "Mwanjamba Primary School"},
                                        {"name": "Vukani Primary School"},
                                        {"name": "NN'gori Primary School"},
                                        {"name": "Chidzangoni Nursery School"}
                                    ]
                        },
                        {
                          "name": "Ukunda", 
                            "pollings": [{"name": "Mwakigwena Primary School"}, 
                                        {"name": "Mkwakwani Primary School"},
                                        {"name": "Magutu Primary School"},
                                        {"name": "Mvindeni Primary School"},
                                        {"name": "Ukunda Secondary School"},
                                        {"name": "Malalani Primary School"},
                                        {"name": "Maweni Rainbow School"},
                                        {"name": "Chilolapwa B Nursery School"}
                                    ]
                        },
                        {
                            "name": "Kinondo", 
                              "pollings": [{"name": "Galu Primary School"}, 
                                          {"name": "Muhaka Primary School"},
                                          {"name": "Kinondo Primary School"},
                                          {"name": "Makongeni Primary School"},
                                          {"name": "Zigira Primary School"},
                                          {"name": "Mkwambani Primary School"},
                                          {"name": "Gazi Primary School"},
                                          {"name": "Magaoni Primary School"},
                                          {"name": "Mwaweche Trading Centre"},
                                          {"name": "Madago Primary School"},
                                          {"name": "Kilole Primary School"},
                                          {"name": "Mwabungo Primary School"},
                                          {"name": "Fihoni Primary School"},
                                          {"name": "Ganja La Simba Primary School"}
                                      ]
                          },
                        {
                          "name": "Ramisi",
                            "pollings": [{"name": "Vingujini Primary School"}, 
                                        {"name": "Msambweni Primary School"},
                                        {"name": "Jomo Kenyatta Primary School"},
                                        {"name": "Milalani Primary School"},
                                        {"name": "Mwagundu Nursery School"},
                                        {"name": "Nyumba Sita Nursery School"},
                                        {"name": "Gonjora Nursery School"},
                                        {"name": "Nganja Primary School"},
                                        {"name": "Mivumoni Primary School"},
                                        {"name": "Eshu Primary School"},
                                        {"name": "Mwachande Primary School"},
                                        {"name": "Fingirika Nursery School"},
                                        {"name": "Mafisini Primary School"},
                                        {"name": "Magodi Primary School"},
                                        {"name": "Kidzumbani Primary School"},
                                        {"name": "Maphombe Primary School"},
                                        {"name": "Munje Primary School"},
                                        {"name": "Funzi Primary School"},
                                        {"name": "Ramisi Primary School"},
                                        {"name": "Bodo Primary School"},
                                        {"name": "Shirazi Primary School"},
                                        {"name": "Fahamuni Primary School"},
                                        {"name": "Ndzovuni Nursery School"},
                                        {"name": "Vidungeni trading Centre"},
                                        {"name": "Kilulu Primary School"},
                                        {"name": "Dzibwage Primary School"},
                                        {"name": "Darigube Primary School"},
                                        {"name": "Marigiza Primary School"},
                                        {"name": "Mabatini Primary School"},
                                        {"name": "Munje Pwani Nursery"},
                                        {"name": "Sawa Sawa Nursery School"},
                                        {"name": "Mchinjirini Primary School"},
                                        {"name": "Kiungani Nursery School"}
                                    ]
                        }
                      ]
                  },
                {
                    "name": "Lungalunga", 
                    "wards": [{ 
                      "name": "Pongwe/Kikoneni", 
                        "pollings": [{"name": "Shimoni Primary School"}, 
                                    {"name": "Kichaka Mkwaju Primary School"}, 
                                    {"name": "Wasini Primary School"}, 
                                    {"name": "Mkwiro Primary School"}, 
                                    {"name": "Kidimu Primary School"}, 
                                    {"name": "Tswaka Primary School"},
                                    {"name": "Mzizima Primary School"},
                                    {"name": "Majoreni Primary School"},
                                    {"name": "Ganda Primary School"},
                                    {"name": "Mwangwei Primary School"},
                                    {"name": "Chiromo Nursery School"},
                                    {"name": "Mwazaro Nursery School"},
                                    {"name": "Mzizima Dispensary"},
                                    {"name": "Kikoneni Primary School"},
                                    {"name": "Mwandeo Primary School"},
                                    {"name": "Mabafweni Primary School"},
                                    {"name": "Vwivwini Primary School"},
                                    {"name": "Mwambalazi Primary School"},
                                    {"name": "Kigombero Primary School"},
                                    {"name": "Mshiu Primary School"},
                                    {"name": "Kiruku Primary School"},
                                    {"name": "Kanana Nursery School"},
                                    {"name": "Nikaphu Nursery School"},
                                    {"name": "Mwauga Nursery School"},
                                    {"name": "Bwiti Primary School"},
                                    {"name": "Mwarutswa Trading Centre"},
                                    {"name": "Magoma Nursery School"},
                                    {"name": "Pongwe Primary School"},
                                    {"name": "Mkono wa Ndugu Primary School"},
                                    {"name": "Kaogeswa Mangawani Nursery School"},
                                    {"name": "Nguzo Nursery School"},
                                    {"name": "Kivuleni Primary School"},
                                    {"name": "Kivindo Nursery School"}
                                ]
                    },
                    {
                      "name": "Dzombo", 
                        "pollings": [{"name": "Mwananyamala Primary School"}, 
                                    {"name": "Mwamba Primary School"},
                                    {"name": "Mrima Primary School"},
                                    {"name": "Mgome Primary School"},
                                    {"name": "Mwanguda Primary School"},
                                    {"name": "Vitsangalaweni Primary School"},
                                    {"name": "Menza Mwenye Primary School"},
                                    {"name": "Bengo Primary School"},
                                    {"name": "Kiranze Primary School"},
                                    {"name": "Dzombo Primary School"},
                                    {"name": "Kitungure Primary School"},
                                    {"name": "Kinyungu Primary School"},
                                    {"name": "Nguluku Primary School"},
                                    {"name": "Bandu Primary School"},
                                    {"name": "Kikonde Primary School"},
                                    {"name": "Makambani Trading Centre"}
                                ]
                    },
                    {
                        "name": "Mwereni", 
                          "pollings": [{"name": "Pangani Primary School"}, 
                                      {"name": "Kasemeni Primary School"},
                                      {"name": "Mzuri Nursery School"},
                                      {"name": "Mabambarani Primary School"},
                                      {"name": "Mwena Primary School"},
                                      {"name": "Maledi Primary School"},
                                      {"name": "Mwangulu Primary School"},
                                      {"name": "Manda Primary School"},
                                      {"name": "Mbuji Primary School"},
                                      {"name": "Kilimangodo Primary School"},
                                      {"name": "Magombani Primary School"},
                                      {"name": "Mwakalanga Primary School"},
                                      {"name": "Bidinimole Primary School"},
                                      {"name": "Mtumwa Primary School"},
                                      {"name": "Mteza Primary School"},
                                      {"name": "Mwereni Primary School"},
                                      {"name": "Maringoni Primary School"},
                                      {"name": "Mtsunga Primary School"},
                                      {"name": "Mwereni Secondary School"},
                                      {"name": "Kalalani Primary School"},
                                      {"name": "Mwamtsefu Primary School"},
                                      {"name": "Kidziweni Trading Centre"},
                                      {"name": "Kibaya ECDC"},
                                      {"name": "Dzirihini ECDC"},
                                      {"name": "Tingani ECDC"},
                                      {"name": "Maduduni ECDC"},
                                      {"name": "Vibandani Kwa Bita ECDC"},
                                      {"name": "Mwatoni ECDC"},
                                      {"name": "Chindi Primary School"},
                                      {"name": "Mikamini Primary School"},
                                      {"name": "Petulani ECDC"},
                                      {"name": "Mikuwani B ECDC"},
                                      {"name": "Naserian Primary School"},
                                      {"name": "Vichenjeleni Primary School"},
                                      {"name": "ADA ECDC"},
                                      {"name": "Lwayoni Primary School"}                   
                                      
                                  ]
                      },
                      {
                        "name": "Vanga", 
                          "pollings": [{"name": "Vanga Primary School"}, 
                                      {"name": "Kiwegu Primary School"},
                                      {"name": "Kidomaya Primary School"},
                                      {"name": "Mwamose Primary School"},
                                      {"name": "Tsuini Primary School"},
                                      {"name": "Mwalewa Primary School"},
                                      {"name": "Ngathini Primary School"},
                                      {"name": "Jego Primary School"},
                                      {"name": "Mgombezi Primary School"},
                                      {"name": "Mahuruni Primary School"},
                                      {"name": "Lunga Lunga Primary School"},
                                      {"name": "Perani Primary School"},
                                      {"name": "Makwenyeni Primary School"},
                                      {"name": "Godo Primary School"},
                                      {"name": "Jua Kali Nursery School"}                   
                                      
                                  ]
                      }
                ] 
                },
                {
                    "name": "Matunga", 
                    "wards": [{ 
                      "name": "Tsimba Golini", 
                        "pollings": [{"name": "Galana Nursery School"}, 
                                    {"name": "Mwananyahi Nursery School"}, 
                                    {"name": "Chirimani Primary School"}, 
                                    {"name": "Dima Primary School"}, 
                                    {"name": "Jorori Primary School"}, 
                                    {"name": "Mwamgunga Primary School"},
                                    {"name": "Vuga Primary School"},
                                    {"name": "Bila Shaka Primary School"},
                                    {"name": "Kwale Primary School"},
                                    {"name": "Ziwani Primary School"},
                                    {"name": "Golini Primary School"},
                                    {"name": "Vyongwani Primary School"},
                                    {"name": "Mteza Primary School"},
                                    {"name": "Mbuguni Primary School"},
                                    {"name": "Mwambara Primary School"},
                                    {"name": "Kitsanze Primary School"},
                                    {"name": "Godoni Chinarini Nursery School"},
                                    {"name": "Madrasa Iqra Nursery School"},
                                    {"name": "Mwanzwani Nursery School"},
                                    {"name": "Lunguma Primary School"},
                                    {"name": "Mwangaza Visionary Primary School"},
                                    {"name": "Kwale High School"},
                                    {"name": "Kwale Baraza Park Grounds"},
                                    {"name": "Public Works Workshop Zungu"},
                                    {"name": "Msulwa Primary School"},
                                    {"name": "Boyani Primary School"},
                                    {"name": "Kwale Medium Prison"},
                                    {"name": "Mbegani Nursery School"},
                                    {"name": "Gopha Primary School"},
                                    {"name": "Kwale Boma Primary School"},
                                    {"name": "Mkwadzuni Primary School"},
                                    {"name": "Mtsarani Nursery School"},
                                    {"name": "Mwachome Primary School"},
                                    {"name": "Bumbani Nursery School"},
                                    {"name": "Vidorini Nursery School"},
                                    {"name": "Magombani Primary School"}       
                                ]
                    },
                    {
                      "name": "Waa", 
                        "pollings": [{"name": "Jamia Nursery School"}, 
                                    {"name": "Kiteje Primary School"},
                                    {"name": "Ningawa Primary School"},
                                    {"name": "Mkumbi Primary School"},
                                    {"name": "Pungu Primary School"},
                                    {"name": "Zibani Primary School"},
                                    {"name": "Ng'ombeni Primary School"},
                                    {"name": "Denyenye Primary School"},
                                    {"name": "Waa Primary School"},
                                    {"name": "Mkokoni Primary School"},
                                    {"name": "Matuga Primary School"},
                                    {"name": "Yeje Primary School"},
                                    {"name": "Sheep and Goats Social Hall"},
                                    {"name": "Kombani Primary School"},
                                    {"name": "Bowa Primary School"},
                                    {"name": "Bararabu Nursery School"},
                                    {"name": "Voroni Primary School"},
                                    {"name": "Mbweka Primary School"},
                                    {"name": "Magaoni Nursery School"},
                                    {"name": "Kombani Social Hall"},
                                    {"name": "Chidzumu Primary School"},
                                    {"name": "Madibwani Nursery School"},
                                    {"name": "Pungu Nursery School"},
                                    {"name": "Mtakuja Adult Centre"},
                                    {"name": "Birikani Nursery School"}                                   
                                ]
                    },
                    {
                        "name": "Tiwi", 
                          "pollings": [{"name": "Vinuni Primary School"}, 
                                      {"name": "Chai Primary School"},
                                      {"name": "Mwaligulu Primary School"},
                                      {"name": "Tiwi Primary School"},
                                      {"name": "Kirudi Primary School"},
                                      {"name": "Mwadinda Primary School"},
                                      {"name": "Mwachema Primary School"},
                                      {"name": "Nimuyumba Primary School"},
                                      {"name": "Chongolo Primary School"},
                                      {"name": "Muungano Primary School"},
                                      {"name": "Mwamlongo Madrassa"},
                                      {"name": "Mwamivi Primary School"},
                                      {"name": "Tiwi Spot Madrassa"},
                                      {"name": "Chibwaga Nursery School"},
                                      {"name": "Ndugu Nursery School"},
                                      {"name": "Tiwi Sokoni Madrassa"},
                                      {"name": "Kivyogo Nursery School"}                                                                          
                                  ]
                      },
                      {
                        "name": "Kubo South", 
                          "pollings": [{"name": "Lukore Primary School"}, 
                                      {"name": "Mkanda Primary School"},
                                      {"name": "Kichaka Simba Primary School"},
                                      {"name": "Mwaluvanga Primary School"},
                                      {"name": "Mwagodzo Primary School"},
                                      {"name": "Kidongo Primary School"},
                                      {"name": "Kipambani Primary School"},
                                      {"name": "Shimba Hills Secondary School"},
                                      {"name": "Makobe Primary School"},
                                      {"name": "Stephen Kanja Primary School"},
                                      {"name": "Mwapala Primary School"},
                                      {"name": "Simanya Primary School"},
                                      {"name": "Kibuyuni Primary School"},
                                      {"name": "Mkanda 1 Nursery School"},
                                      {"name": "Mwaleni Nursery School"},
                                      {"name": "Mkundi Primary School"},
                                      {"name": "Mawia Adult Centre"},
                                      {"name": "Katangini Nursery School"},
                                      {"name": "Msulwa Village Trading Centre"},
                                      {"name": "Boyani Village Shopping Centre"},
                                      {"name": "Magwasheni Primary School"},
                                      {"name": "Mangawani Primary School"},
                                      {"name": "Mnyalatsoni Primary School"},
                                      {"name": "Mwanamkuu Primary School"},
                                      {"name": "Maji Moto Primary School"},
                                      {"name": "Mkunguni Nursery School"},
                                      {"name": "Maloloni Nursery School"},
                                      {"name": "Kaseveni Nursery School"}                                                                         
                                  ]
                      },
                      {
                        "name": "Mkongani", 
                          "pollings": [{"name": "Pumwani Nursery School"}, 
                                      {"name": "Maponda Primary School"},
                                      {"name": "Kibarani Nursery School"},
                                      {"name": "Mbararani Nursery School"},
                                      {"name": "Deri Nursery School"},
                                      {"name": "Mkomba Primary School"},
                                      {"name": "Tiribe Primary School"},
                                      {"name": "Mkongani Primary School"},
                                      {"name": "Mtsamviani Primary School"},
                                      {"name": "Mzinji Primary School"},
                                      {"name": "Miamba Primary School"},
                                      {"name": "Mbegani Primary School"},
                                      {"name": "Kizibe Primary School"},
                                      {"name": "Mirihini Primary School"},
                                      {"name": "Kajiweni Primary School"},
                                      {"name": "Miatsani Primary School"},
                                      {"name": "Mlafyeni Primary School"},
                                      {"name": "Tserezani Primary School"},
                                      {"name": "Mtsangatamu Primary School"},
                                      {"name": "Burani Primary School"},
                                      {"name": "Bahakanda Primary School"},
                                      {"name": "Mwaryarya Nursery School"},
                                      {"name": "Mwamtobo Nursery School"},
                                      {"name": "Kaoyeni Nursery School"},
                                      {"name": "Pengo Nursery School"},
                                      {"name": "Sabrina Primary School"},
                                      {"name": "Mbadzi Nursery School"},
                                      {"name": "Muyugutu Nursery School"},
                                      {"name": "Milalani Kizibe Nursery School"},
                                      {"name": "Mafusi Primary School"},
                                      {"name": "Miridzani Nursery School"},
                                      {"name": "Umoja Mwalolo Nursery School"},
                                      {"name": "Mwele Primary School"},
                                      {"name": "Mabanda Nursery School"},
                                      {"name": "Chanyiro Primary School"},
                                      {"name": "Vumirira Nursery School"},
                                      {"name": "Dzanikeni Nursery School"},
                                      {"name": "Boyani West Primary School"},
                                      {"name": "Chidzugani Primary School"}                                                                         
                                  ]
                      },
                      {
                        "name": "Ndavaya", 
                          "pollings": [{"name": "Ngauro Primary School"}, 
                                      {"name": "Mwalukombe Primary School"},
                                      {"name": "Magodzoni Primary School"},
                                      {"name": "Kifyonzo Primary School"},
                                      {"name": "Maphanga Primary School"},
                                      {"name": "Ndauni Primary School"},
                                      {"name": "Mabanda Primary School"},
                                      {"name": "Gulanze Primary School"},
                                      {"name": "Mwachanda Primary School"},
                                      {"name": "Gulanze Youth Polytechnic"},
                                      {"name": "Ndavaya Primary School"},
                                      {"name": "Gandini South Primary School"},
                                      {"name": "Bomani Primary School"},
                                      {"name": "Mkang'ombe Primary School"},
                                      {"name": "Mbita Primary School"},
                                      {"name": "Mwakijembe Primary School"},
                                      {"name": "Mwaluvuno Primary School"},
                                      {"name": "Vyogato Primary School"},
                                      {"name": "Dzoyahewa Nursery School"},
                                      {"name": "Mbuluni Primary School"},
                                      {"name": "Mwandimu Primary School"},
                                      {"name": "Bumani Primary School"},
                                      {"name": "Kawelu Nursery School"},
                                      {"name": "Mafundani Nursery School"},
                                      {"name": "Zia Ra Dundo"},
                                      {"name": "Mwangaure ECD"},
                                      {"name": "Jitegemee Primary School"},
                                      {"name": "Dudu ECDE"}                                                                         
                                  ]
                      },
                      {
                        "name": "Puma", 
                          "pollings": [{"name": "Chirima Cha Uha Primary School"}, 
                                      {"name": "Mazola Primary School"},
                                      {"name": "Mabamani Primary School"},
                                      {"name": "Gangani Primary School"},
                                      {"name": "Kisimani Primary School"},
                                      {"name": "Bang'a Primary School"},
                                      {"name": "Malungoni Primary School"},
                                      {"name": "Bishop Kalu Primary School"},
                                      {"name": "Rorogi Primary School"},
                                      {"name": "Vigurungani Primary School"},
                                      {"name": "Mwangoni Primary School"},
                                      {"name": "Maendeleo Primary School"},
                                      {"name": "Tata Primary School"},
                                      {"name": "Nyango Primary School"},
                                      {"name": "Mbilini Primary School"},
                                      {"name": "Kasageni Primary School"},
                                      {"name": "Dzimanya Primary School"},
                                      {"name": "Gozani Primary School"},
                                      {"name": "Bang'a Nursery School"},
                                      {"name": "Kideri Primary School"},
                                      {"name": "Wamasa Primary School"},
                                      {"name": "Mulingo Nursery School"},
                                      {"name": "Karyaka Primary School"},
                                      {"name": "Metani Nursery School"},
                                      {"name": "Magongoni Nursery School"}                                                         
                                  ]
                      },
                      {
                        "name": "Kinango", 
                          "pollings": [{"name": "Kinango Primary School"}, 
                                      {"name": "Gwadu Primary School"},
                                      {"name": "Amani Primary School"},
                                      {"name": "Amkeni Nursery School"},
                                      {"name": "St. Joseph Primary School"},
                                      {"name": "St. Luke's Primary School"},
                                      {"name": "Moyeni Primary School"},
                                      {"name": "Ng'onzini Primary School"},
                                      {"name": "Dumbule Primary School"},
                                      {"name": "Mwaluganje Primary School"},
                                      {"name": "Gandini Central Primary School"},
                                      {"name": "Chifusini Primary School"},
                                      {"name": "Lutsangani Primary School"},
                                      {"name": "Dzivani Primary School"},
                                      {"name": "Tsunza Primary School"},
                                      {"name": "Mkilo Primary School"},
                                      {"name": "Chizini Primary School"},
                                      {"name": "Sembe Primary School"},
                                      {"name": "Nzovuni Nursery School"},
                                      {"name": "Yapha Primary School"},
                                      {"name": "Kibandaongo Primary School"},
                                      {"name": "Mitangani Nursery School"},
                                      {"name": "Mikanjuni Nursery School"},
                                      {"name": "Dzendereni Primary School"},
                                      {"name": "Mwangani Primary School"},
                                      {"name": "Tsahuni Nursery School"},
                                      {"name": "Mbandi Primary School"},
                                      {"name": "Kidogoeni ECDE"},
                                      {"name": "Maili Nane ECDE"},
                                      {"name": "Sagalato ECDE"},
                                      {"name": "Mwanyundo ECDE"},
                                      {"name": "Chidunguni ECDE"}                                                         
                                  ]
                      },
                      {
                        "name": "Mackinnon Road", 
                          "pollings": [{"name": "Kilibasi Primary School"}, 
                                      {"name": "Busho Primary School"},
                                      {"name": "Mgalani Primary School"},
                                      {"name": "Jeffery Primary School"},
                                      {"name": "Cafgem Primary School"},
                                      {"name": "Bahakwenu Primary School"},
                                      {"name": "Fuleye Primary School"},
                                      {"name": "Magale Primary School"},
                                      {"name": "Taru Primary School"},
                                      {"name": "Gurujo Nursery School"},
                                      {"name": "Chigutu Primary School"},
                                      {"name": "Vinyunduni Primary School"},
                                      {"name": "Kituu Primary School"},
                                      {"name": "Makamini Primary School"},
                                      {"name": "Bumburi Primary School"},
                                      {"name": "Egu Primary School"},
                                      {"name": "Nyari Primary School"},
                                      {"name": "Meti Nursery School"},
                                      {"name": "Dzisuhuni Primary School"},
                                      {"name": "Mdomo Primary School"},
                                      {"name": "Meli-Kubwa Primary School"},
                                      {"name": "Mlunguni Primary School"},
                                      {"name": "Maiyini Primary School"},
                                      {"name": "Mwanatibu Railway Station"}                                                  
                                  ]
                      },
                      {
                        "name": "Chengoni/Samburu", 
                          "pollings": [{"name": "Silaloni Primary School"}, 
                                      {"name": "Mwarovesa Primary School"},
                                      {"name": "Shauri Moyo Primary School"},
                                      {"name": "Maji ya Chumvi Primary School"},
                                      {"name": "Chanzou Primary School"},
                                      {"name": "Mtulu Primary School"},
                                      {"name": "Chengoni Primary School"},
                                      {"name": "Ndohivyo Primary School"},
                                      {"name": "Samburu Primary School"},
                                      {"name": "Kinagoni Primary School"},
                                      {"name": "Mwangea Primary School"},
                                      {"name": "Kwa Kadogo Primary School"},
                                      {"name": "Kazamoyo Primary School"},
                                      {"name": "Mwembeni Primary School"},
                                      {"name": "Gora Primary School"},
                                      {"name": "Mwandoni Primary School"},
                                      {"name": "Mwambani Primary School"},
                                      {"name": "Mwangoloto Primary School"},
                                      {"name": "Chituoni Primary School"},
                                      {"name": "Kanyumbuni Primary School"}                                                  
                                  ]
                      },
                      {
                        "name": "Mwavumbo", 
                          "pollings": [{"name": "Mwabila Primary School"}, 
                                      {"name": "Chigombero Primary School"},
                                      {"name": "Matumbi Primary School"},
                                      {"name": "Chidzipwa Primary School"},
                                      {"name": "Pemba Primary School"},
                                      {"name": "Ni Hutu Primary School"},
                                      {"name": "Vitsakaviri Primary School"},
                                      {"name": "Mavirivirini Primary School"},
                                      {"name": "Mgandini Primary School"},
                                      {"name": "Madikoni Primary School"},
                                      {"name": "Mwashanga Primary School"},
                                      {"name": "Kafuduni Primary School"},
                                      {"name": "Maweu Primary School"},
                                      {"name": "Kaluweni Primary School"},
                                      {"name": "Kalalani Social Hall"},
                                      {"name": "Sega Primary School"},
                                      {"name": "Mwanda Primary School"},
                                      {"name": "Dzombo Primary School"},
                                      {"name": "Gwasheni Primary School"},
                                      {"name": "Kaphingo Primary School"},
                                      {"name": "Mariakani Roman Primary School"},
                                      {"name": "Julani Primary School"},
                                      {"name": "Kumbulu Primary School"},
                                      {"name": "Lutsangani-North Primary School"},
                                      {"name": "Mlola Nursery School"},
                                      {"name": "Mubande Primary School"},
                                      {"name": "Mavarata ECDE"}                                                  
                                  ]
                      },
                      {
                        "name": "Kasemeni", 
                          "pollings": [{"name": "Bofu Primary School"}, 
                                      {"name": "Mkanyeni Primary School"},
                                      {"name": "Nunguni Primary School"},
                                      {"name": "Gona Primary School"},
                                      {"name": "Guro Primary School"},
                                      {"name": "Mabesheni Primary School"},
                                      {"name": "Mtaa Primary School"},
                                      {"name": "Boyani Primary School"},
                                      {"name": "Mazeras Primary School"},
                                      {"name": "Mpirani Primary School"},
                                      {"name": "Fulugani Primary School"},
                                      {"name": "Mwamdudu Primary School"},
                                      {"name": "Bonje Primary School"},
                                      {"name": "Vikolani Primary School"},
                                      {"name": "Minyenzeni Primary School"},
                                      {"name": "Miyani Primary School"},
                                      {"name": "Mwache Primary School"},
                                      {"name": "Miguneni Primary School"},
                                      {"name": "Mbujani Primary School"},
                                      {"name": "Majengo Primary School"},
                                      {"name": "Chikuyu Primary School"},
                                      {"name": "Chikwakwani Primary School"},
                                      {"name": "Mabirikani Nursery School"},
                                      {"name": "Chidzuvini Nursery School"},
                                      {"name": "Mkulung'ombe Nursery School"},
                                      {"name": "Nyando Nursery School"},
                                      {"name": "Muungano Primary School"}                                                  
                                  ]
                      }
                ] 
              }

            ]
                  
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