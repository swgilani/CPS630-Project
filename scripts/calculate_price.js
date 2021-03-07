// document.getElementById('cart').querySelectorAll('li')[1].querySelector('input').value


function total_price(){
var list = document.getElementById('cart').querySelectorAll('li');
var items = [];
var prices = [];
var total_price = 0;

if (list){
    console.log(list);
    for (var i =0; i<list.length;i++) {
        item = list[i].querySelector('input').value;
        items.push(item);
    }
}

for (var i =0; i<items.length;i++) {
    prices.push(parseFloat(items[i].split(',')[1]));
}

for (var i =0; i<prices.length;i++) {
    total_price = total_price + prices[i];
}


document.getElementById("items_price").innerHTML = "Total Price: $"+total_price;
document.getElementById("form_price").value = total_price;
}


function calculate_ride_distance() {
    var distance = Math.random() * (1 - 49) + 49;
    distance = distance.toFixed(2);
    document.getElementById("distance").innerHTML = "Total Distance: " +distance+" KM";
    document.getElementById("form_distance").value = distance;

}