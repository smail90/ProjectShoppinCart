let addToCartB = document.getElementsByClassName('btn-primary')
let cartContainer = document.getElementsByTagName('tbody')[0]
let quantityFields = document.getElementsByClassName('num')
let delete_buttons = document.getElementsByClassName('uk-button-danger')

// picking up all the Add-To-Cart buttons
for(let Plus = 0; Plus < addToCartB.length; Plus++){
    addToCartB[Plus].addEventListener('click', addToCart)
    
}
// This function helps to add items to our cart
function addToCart(Add){

    
    let itemContainer = document.createElement('tr')
    let btn = Add.target
    let btnGrandParent = btn.parentElement.parentElement
    let btnParent = btn.parentElement
    let itemImage = btnGrandParent.children[0].src
    let itemName = btnParent.children[0].innerText
    let itemPrice = btnParent.children[1].innerText
    
    
    itemContainer.innerHTML = `
    <td><input class="uk-checkbox" type="checkbox"></td>
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
    for(let x = 0; x < delete_buttons.length; x++){
        delete_buttons[x].addEventListener('click', removeItem)
    }

    grandTotal()

   
}



// This function helps to multiply the quantity and the price
function totalCost(event){
    let quantity = event.target
    quantity_parent = quantity.parentElement.parentElement
    price_field = quantity_parent.getElementsByClassName('item-price')[0]
    total_field = quantity_parent.getElementsByClassName('total-price')[0]
    price_field_content = price_field.innerText.replace('$', '')
    total_field.children[0].innerText = '$' +  quantity.value * price_field_content
    grandTotal()
    if(isNaN(quantity.value)|| quantity.value <= 0){
        quantity.value = 1
    }

    
    
}

// This function helps to add up the total of the items
function grandTotal(){
    let total = 0
    let grand_total = document.getElementsByClassName('grand-total')[0]
    all_total_fields = document.getElementsByClassName('total-price')
    for(let i = 0; i < all_total_fields.length; i++){
        all_prices = Number(all_total_fields[i].innerText.replace('$', ''))
        total+=all_prices
    }
    grand_total.children[0].innerText = "$"+total
    grand_total.children[0].style.fontWeight = 'bold'
    console.log(total)
}


function removeItem(event){
    del_btn = event.target
    del_btn_parent = del_btn.parentElement.parentElement
    del_btn_parent.remove()
    console.log(del_btn)
    grandTotal()
    
}
// Function to calculate the grand total of items in the cart
function grandTotal() {
    let total = 0;
    const allTotalFields = document.getElementsByClassName('total-price');

    for (let i = 0; i < allTotalFields.length; i++) {
        const allPrices = Number(allTotalFields[i].innerText.replace('$', ''));
        total += allPrices;
    }

    const grandTotalElement = document.querySelector('.grand-total');
    grandTotalElement.innerText = `$${total.toFixed(2)}`;
}

// Call the grandTotal function initially to show existing products
grandTotal();

              

    


  


  
  
  