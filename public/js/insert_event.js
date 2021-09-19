window.addEventListener('load', function() {
    document.querySelector('input[type="file"]').addEventListener('change', function() {
        if (this.files && this.files[0]) {
            var img = document.querySelector('#Picture_small_URL');
            img.onload = () => {
                URL.revokeObjectURL(img.src);
            }

            img.src = URL.createObjectURL(this.files[0]);
        }
    });
  });

// Định dạng Tiền
var array_price = document.querySelectorAll('span.price-events');

var formatter = new Intl.NumberFormat('it-IT', {
    style: 'currency',
    currency: 'VND',
  });

for(let i = 0; i < array_price.length; i++) {
    array_price[i].innerHTML = formatter.format(array_price[i].textContent);
}

// var array_ticket = document.querySelectorAll('input.giave');

// for(let i = 0; i < array_ticket.length; i++) {
//     array_ticket[i].value = formatter.format(array_ticket[i].value);
// }

//    Tính tiền
  var decrement = document.getElementsByClassName('minus');
  var increment = document.getElementsByClassName('plus');

  let giave = parseInt(document.getElementById('gia_ve').value);
  let total = document.getElementById('total-price-order');

  let result = 0;

  for(var i = 0; i < increment.length; i++){
      var button = increment[i];
      button.addEventListener('click', function(event) {
          var buttonClick = event.target;
          var input = buttonClick.parentElement.children[2];
          var inputValue = input.value;
          var newValue = parseInt(inputValue) + 1;
          input.value = newValue;
          result += giave;
          total.innerHTML = formatter.format(result);
      })

  }

  for(var i = 0; i < decrement.length; i++){
      var button = decrement[i];
      button.addEventListener('click', function(event) {
          var buttonClick = event.target;
          var input = buttonClick.parentElement.children[2];
          var inputValue = input.value;
          var newValue = parseInt(inputValue) - 1;

          if(newValue >= 0) {
              input.value = newValue;
              result -= giave;
              total.innerHTML = formatter.format(result);
          }
          else {
              input.value = 0;
          }
      })
  }


