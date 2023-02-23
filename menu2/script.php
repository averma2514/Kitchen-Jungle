<!-- <script src="rq.js"></script> -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
var addToCartButtons = document.getElementsByClassName('btn-primary')
var cartContainer = document.getElementsByTagName('tbody')[0]
var quantityFields = document.getElementsByClassName('num')
var delete_buttons = document.getElementsByClassName('uk-button-danger')

// picking up all the Add-To-Cart buttons
for(let i = 0; i < addToCartButtons.length; i++){
    addToCartButtons[i].addEventListener('click', addToCart)
}
// This function helps to add items to our cart
function addToCart(event){

    var itemContainer = document.createElement('tr')
    var btn = event.target
    var btnGrandParent = btn.parentElement.parentElement
    var btnParent = btn.parentElement
    var itemImage = btnGrandParent.children[0].src
    var itemName = btnParent.children[0].innerText
    var itemPrice = btnParent.children[1].innerText
    
    
    itemContainer.innerHTML = `
    <td><img class="uk-preserve-width uk-border-circle" src=${itemImage} width="40" alt=""></td>
    <td class="uk-table-link">
        <h3 class = "item-name">${itemName}</h3>
    </td>
    <td class="uk-text-truncate item-price"><h3>${itemPrice}</h3></td>
    <td><input type = 'number' class = 'num' value = '1'></td>
    <td class="uk-text-truncate total-price"><h3>${itemPrice}</h3></td>
    <td><button class="uk-button uk-button-danger" type="button">Remove</button></td>
`

    cartContainer.append(itemContainer)

    // Accessing individual quantity fields
    for(let i = 0; i < quantityFields.length; i++){
        quantityFields[i].value = 1
        quantityFields[i].addEventListener('change', totalCost)
                
    }



// Accessing individual quantity fields
    for(let i = 0; i < delete_buttons.length; i++){
        delete_buttons[i].addEventListener('click', removeItem)
    }

    grandTotal()
    }
</script>

<script>
// This function helps to multiply the quantity and the price
function totalCost(event){
    var quantity = event.target
    quantity_parent = quantity.parentElement.parentElement
    price_field = quantity_parent.getElementsByClassName('item-price')[0]
    total_field = quantity_parent.getElementsByClassName('total-price')[0]
    price_field_content = price_field.innerText.replace('₹ ', '')
    total_field.children[0].innerText = '₹ ' +  quantity.value * price_field_content
    <?php $grand; ?>
    
    if(isNaN(quantity.value)|| quantity.value <= 0){
        quantity.value = 1
    }
}
</script>

<?php 

$grand = '<script> function grandTotal(){
    var total = 0
    let grand_total = document.getElementsByClassName('grand-total')[0]
    all_total_fields = document.getElementsByClassName('total-price')
    
    for(let i = 0; i < all_total_fields.length; i++){
        all_prices = Number(all_total_fields[i].innerText.replace('₹ ', ''))
        total+=all_prices
    }
    grand_total.children[0].innerText = "₹ "+total
    grand_total.children[0].style.fontWeight = 'bold'
    console.log(total)
}
 </script>';

?>


<script>
// This function helps to add up the total of the items
var test6=0
function grandTotal(){
    var total = 0
    let grand_total = document.getElementsByClassName('grand-total')[0]
    all_total_fields = document.getElementsByClassName('total-price')
    
    for(let i = 0; i < all_total_fields.length; i++){
        all_prices = Number(all_total_fields[i].innerText.replace('₹ ', ''))
        total+=all_prices
    }
    grand_total.children[0].innerText = "₹ "+total
    grand_total.children[0].style.fontWeight = 'bold'
    console.log(total)

    document.getElementsByClassName('hidden_grand').value = total
}
</script>

//test6
// test6 = total
// w()



    //tes1
    // function pass_value(){
    //     return(total);
    // }


    //test2
    // localStorage.setItem("grand", total);


    //test3
//     $.ajax({
//     type: 'POST',
//     url: 'order.php',
//     data: {abc: 5 //pass array to php 
//     },
//     success: function(data) {
//       alert("something");
//     }
//   });



//test4
    // function passVal(){
    //     var data = {
    //         fn: "filename",
    //         str: "this_is_a_dummy_test_string"
    //     };

    //     $.post("order.php", data);
    // }
    // passVal();


    //test5
//     function callPHP(params) {
//     var httpc = new XMLHttpRequest(); // simplified for clarity
//     var url = "order.php";
//     httpc.open("POST", url, true); // sending as POST

//     httpc.onreadystatechange = function() { //Call a function when the state changes.
//         if(httpc.readyState == 4 && httpc.status == 200) { // complete and no errors
//             alert(httpc.responseText); // some processing here, or whatever you want to do with the response
//         }
//     };
//     httpc.send(params);
// }




    


<script>
function removeItem(event){
    del_btn = event.target
    del_btn_parent = del_btn.parentElement.parentElement
    del_btn_parent.remove()
    console.log(del_btn)
    grandTotal()
    
}
</script>



<?php 
// echo "<script>console.log(pass_value()); </script>";
$grand1 = '<script>localStorage.getItem("grand");;</script>';
$grand2 = '<script> function w()=>{
    document.write(test6);
    } </script>';
?>