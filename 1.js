document.addEventListener("DOMContentLoaded", function() {
	var getNurses = document.getElementById("nurseBtn");
    
	getNurses.addEventListener("click", function() {
		var nurseId = document.getElementById("nurse-select").value;

        var xhr = new XMLHttpRequest();
		xhr.open("POST", "1.php");
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.onload = function() {
			if (xhr.status === 200) {
				document.getElementById("nurse").innerHTML = xhr.responseText;
			} else {
				console.log("Ошибка: " + xhr.statusText);
			}
		};
		xhr.onerror = function() {
			console.log("Ошибка сети");
		};
		xhr.send("nurse_id=" + nurseId);
	});
});
