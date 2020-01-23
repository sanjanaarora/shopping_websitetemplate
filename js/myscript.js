function addToCart(productid, qty = null) {
    if (qty == null) {
        if ($("#myFormQty").valid()) {
            var qtyval = document.getElementById("qty").value;
        } else {
            alert("Please choose the Quantity less than stock");
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

function changeQty(productid, type, stock) {
    var quantity = parseInt(document.getElementById("quantity-" + productid).value);
    var flag;
    if (type == 'plus') {
        if (quantity >= stock) {
            document.getElementById("plusicon-" + productid).className = "fa fa-plus disabled";
            flag = 0;
        } else {
            document.getElementById("minusicon-" + productid).className = "fa fa-minus";
            document.getElementById("plusicon-" + productid).className = "fa fa-plus";
            quantity += 1;
        }
    } else if (type == 'minus') {
        if (quantity > 1) {
            quantity -= 1;
            document.getElementById("minusicon-" + productid).className = "fa fa-minus";
        } else {
            document.getElementById("minusicon-" + productid).className = "fa fa-minus disabled";
            flag = 0;
        }
    }
    if (flag != 0) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {
                var output = (JSON.parse(this.responseText));
                console.log(output);
                document.getElementById("quantity-" + productid).value = output.qty;
                document.getElementById("netprice-" + productid).innerHTML = output.netPrice;
                document.getElementById("grandTotal").innerHTML = output.grandTotal;
            }
        };
        xmlhttp.open("GET", "changeQty.php?q=" + productid + "&qty=" + quantity, true);
        xmlhttp.send();
    }
}


function lessqty(productid) {

}