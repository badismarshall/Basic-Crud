let title = document.getElementById('title');
let price = document.getElementById('price');
let taxes = document.getElementById('texes');
let ads = document.getElementById('ads');
let discount = document.getElementById('discount');
let totle = document.getElementById('total');
let category = document.getElementById('category');
let submit = document.getElementById('submit');

console.log(title, price, taxes, ads, discount, totle, category);

function getTotle(){
    
    if(price.value != ''){
        let result = (+price.value + +taxes.value + +ads.value) 
        - +discount.value;

        totle.innerHTML = result;
        totle.style.background = '#040'
    }else{
        totle.innerHTML = '';
        totle.style.background = '#a00d02'

    }
}
