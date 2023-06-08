document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("shiftForm").addEventListener("submit", function(event) {
        event.preventDefault();
        var shift = document.getElementById("shift-select").value;
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "3.php");
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var result = JSON.parse(xhr.responseText);                    
                    var shift = result;                    
                    var resultHtml = "";
                    for (var i = 0; i < shift.length; i++) {                        
                        resultHtml += "<div>" + shift[i].name + "</div>";
                    }                    
                } else {
                    console.log("Ошибка запроса: " + xhr.status);
                }
                document.getElementById("shift").innerHTML = resultHtml;

            }
        };
        xhr.onerror = function() {
            console.log("Ошибка сети");
        }
        var data = "shift=" + encodeURIComponent(shift)
        xhr.send(data);
    });
});