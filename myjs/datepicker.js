function datewise() {
    var from =document.getElementById("fromdate").value;
    var to =document.getElementById("todate").value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("datewiseorder").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "vieworderdatewise.php?q="+from+"&r="+to, true);
    xmlhttp.send();
}