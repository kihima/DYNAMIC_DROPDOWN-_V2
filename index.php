<!DOCTYPE html>
<html>
    <title>Dynamic List</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<body>
<div class="regForm">
    <div class="containerForm">
		<div class="title">
            Kenya County, Constituency, Ward and Polling Station Dynamic Dropdown
		</div>

        <form action="" method="post">
            <label>County:</label>
            <select id="county" >
            <option value="">-- Select County --</option>
            </select>

            <label>Constituency:</label>
            <select id="constituency" >
            <option value="">-- Select Constituency --</option>
            </select>

            <label>Ward:</label>
            <select id="ward">
            <option value="">-- Select Ward --</option>
            </select>

            <label>Polling Station:</label>
            <select id="polling">
            <option value="">-- Select Polling Station --</option>
            </select>
        </form>
    </div>
</div>
</body>
</html>
<script>
// Counties data in JSON format
fetch("data.json")
  .then(function(response) {
    return response.json();
  })
  .then(function(data) {

    var counties = data;

    // Populate counties dropdown
    var countyDropdown = document.getElementById("county");
    for (var i = 0; i < counties.length; i++) {
    var countyOption = document.createElement("option");
    countyOption.value = counties[i].name;
    countyOption.text = counties[i].name;
    countyDropdown.add(countyOption);
    }

    // Populate constituencies dropdown
    countyDropdown.addEventListener("change", getConstituencies);
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
    constituencyDropdown.addEventListener("change", getWards);
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
        getPollings();
    }
    
    // Populate polling station dropdown
    var constituencyDropdown = document.getElementById("constituency");
    constituencyDropdown.length = 1;
    var wardDropdown = document.getElementById("ward");
    wardDropdown.length = 1;
    wardDropdown.addEventListener("change", getPollings);
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
})


</script>