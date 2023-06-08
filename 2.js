document.addEventListener("DOMContentLoaded", function() {



	var getDepartament = document.getElementById("dep_btn");
	getDepartament.addEventListener("click", function() {
		var departament = document.getElementById("department_select").value;
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "2.php");
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.responseType = "document";
        console.log(xhr)
		xhr.onload = function() {
			if (xhr.status === 200) {
				var nurses = xhr.responseXML.getElementsByTagName("nurses");
                console.log(nurses)
				var result = "";
				for (var i = 0; i < nurses.length; i++) {
					var name = nurses[i].getElementsByTagName("name")[0].textContent;
					
					result += "<li>" + name + "</li>";
				}
				document.getElementById("dep").innerHTML = result;
			} else {
				console.log("Ошибка: " + xhr.statusText);
			}
		};
		xhr.onerror = function() {
			console.log("Ошибка сети");
		};
		xhr.send("department_id=" + departament);
	});
});