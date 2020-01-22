function addToCart(productid, qty = null) {
    if (qty == null) {
        if ($("#myFormQty").valid()) {
            var qtyval = document.getElementById("qty").value;
        } else {
            alert("Please choose the Quantity");
        }
    } else {
        qtyval = 'index';
    }
    if (qtyval != undefined) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {
                alert("1 Item added Successfully in the Cart");
                document.getElementById("cartCount").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "addtoCart.php?q=" + productid + "&qty=" + qtyval, true);
        xmlhttp.send();
    }
}