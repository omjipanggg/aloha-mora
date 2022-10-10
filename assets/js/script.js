$(document).ready(() => {
	let toast = document.querySelector('.toast');
	let toastMsg = document.querySelector('#toast-message');
	if (toastMsg) {
		toast.classList.add('show');
		setTimeout(() => {
			toast.classList.remove('show');
		}, 3600);
	}

	if (document.querySelector('section').offsetHeight < window.innerHeight) {
		document.querySelector('section').style.minHeight = (window.innerHeight - document.querySelector('#footer').offsetHeight - 7) + 'px';
	}
});

function showToast(event) {
	let target = document.querySelector('.toast');
	let container = document.querySelector('#toast-container');
	let clonedTarget = target.cloneNode(true);
	clonedTarget.children[1].innerHTML = event + ' has added.';
	container.appendChild(clonedTarget);
	const bsToast = bootstrap.Toast.getOrCreateInstance(clonedTarget);
	bsToast.show();
	setTimeout(() => {
		while (container.childNodes.length > 1) {
			container.removeChild(container.firstChild);
		}
	}, 9000);
}

document.querySelectorAll('.placement .filter-item').forEach((e, i) => {
	e.addEventListener('click', (event) => {
		let elem = [...document.querySelectorAll('.placement .filter-item')];
		let other = elem.filter((el) => {
			e !== el ? el.classList.remove('active') : null;
		});
		event.target.classList.add('active');
	})
});

function changeType(event) {
	let thisVal = $('.iconToggle');
	let open = 'fa-eye';
	let close = 'fa-eye-slash';

	thisVal.toggleClass(open);
	thisVal.toggleClass(close);

	let password = [...document.querySelectorAll('.password')];
	password.map((item) => {
		item.type = event.currentTarget.checked ? 'text' : 'password';
	});
}

document.querySelectorAll('.placement .filter-item').forEach((e, i) => {
	e.addEventListener('click', (event) => {
		let elem = [...document.querySelectorAll('.placement .filter-item')];
		let other = elem.filter((el) => {
			e !== el ? el.classList.remove('active') : null;
		});
		event.target.classList.add('active');
	})
});

let mixerContainer = document.querySelector('.placement .card-container'), mixer;
if (mixerContainer) {
	mixer = mixitup(mixerContainer, {
		selectors: { target: '.placement .mix' },
		animation: { duration: 480 },
	});
}

$('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') || location.hostname === this.hostname) {
        let target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
            $('html, body').animate({ scrollTop: target.offset().top - 0 }, 600);
            return false;
        }
    }
});

$('#saveToDB').click(() => {
	$('#fireThis').trigger('click');
});

function fetchAjax(event) {
	let date = event.currentTarget.value;
	$.ajax({
		type: "GET",
		url: "./config/daily.php",
		data: {
			date: date,
		},
		success: (response) => {
			$('#fetchData').html(response);
		},
	});
}

let shoppingCart = (function() {
    cart = [];

    function Item(id, name, price, count) {
        this.id = id;
        this.name = name;
        this.price = price;
        this.count = count;
    }
    
    function saveCart() { sessionStorage.setItem('cart', JSON.stringify(cart)); }
    
    function loadCart() { cart = JSON.parse(sessionStorage.getItem('cart')); }

    if (sessionStorage.getItem('cart') != null) { loadCart(); }

    let obj = {};

    obj.addItemToCart = function(id, name, price, count) {
        for (let item in cart) {
            if (cart[item].name === name) {
                cart[item].count++;
                saveCart();
                return;
            }
        }
        let item = new Item(Number(id), name, Number(price), count);
        cart.push(item);
        saveCart();
    }

    obj.setCountForItem = function(name, count) {
        for (let i in cart) {
            if (cart[i].name === name) {
                cart[i].count = count;
                break;
            }
        }
        saveCart();
    }
    
    obj.removeItemFromCart = function(name) {
        for (let item in cart) {
            if (cart[item].name === name) {
                cart[item].count--;
                if (cart[item].count === 0) {
                    cart.splice(item, 1);
                }
                break;
            }
        }
        saveCart();
    }

	obj.removeItemFromCartAll = function(name) {
        for (let item in cart) {
            if (cart[item].name === name) {
                cart.splice(item, 1);
                break;
            }
        }
        saveCart();
    }
	
	obj.clearCart = function() {
        cart = [];
        saveCart();
    }

    obj.totalCount = function() {
        let totalCount = 0;
        for (let item in cart) {
            totalCount += cart[item].count;
        }
        return totalCount;
    }

    obj.totalCart = function() {
        let totalCart = 0;
        for (let item in cart) {
            totalCart += cart[item].price * cart[item].count;
        }
        return Number(totalCart.toFixed(2));
    }

    obj.listCart = function() {
        let cartCopy = [];
        for (product in cart) {
            item = cart[product];
            itemCopy = {};
            for (index in item) {
                itemCopy[index] = item[index];
            }
            cartCopy.push(itemCopy)
        }
        return cartCopy;
    }
    return obj;
})();

function displayCart() {
	let cartObj = shoppingCart.listCart(), output = "";

	for (let item in cartObj) {
		output += 
		`<tr>
			<td>`+ cartObj[item].name +`</td>
			<td>
			<span id="forPrint">`+ cartObj[item].count +`</span>
			<div class='input-group'>
				<button class='btn btn-sm btn-danger handle-minus' type='button' data-name='`+ cartObj[item].name +`'>
				<i class='fas fa-minus'></i>
				</button>
				<input type='text' onkeypress='return /[0-9]/i.test(event.key)' onkeyup='return /[0-9]/i.test(event.key)' class='form-control form-control-sm text-center item-count' data-name='`+ cartObj[item].name +`' value='`+ cartObj[item].count +`' autocomplete='off'/>
				<button class='btn btn-sm btn-primary handle-plus' type='button' data-name='`+ cartObj[item].name +`'>
				<i class='fas fa-plus'></i>
				</button>
			</div>
			</td>
			<td>`+ cartObj[item].price +`</td>
		</tr>`;
	}
	$('.show-cart').html(output);
	$('.total-cart').html(shoppingCart.totalCart());
	$('.total-count').html(shoppingCart.totalCount());
}

$('.item-carted').click((event) => {
	let id = event.currentTarget.dataset['id'];
	let name = event.currentTarget.dataset['name'];
	let price = event.currentTarget.dataset['price'];
	shoppingCart.addItemToCart(id, name, price, 1);
	showToast(name);
	setLink();
	displayCart();
});

$('.clear-cart').click((event) => {
	if (confirm("Are you sure?") === true) {
		shoppingCart.clearCart();
		console.log('Cleared list...');
	} else {
		event.preventDefault();
	}
	setLink();
	displayCart();
});

$('.show-cart').on('click', '.handle-minus', (event) => {
	let name = event.currentTarget.dataset['name'];
	shoppingCart.removeItemFromCart(name);
	setLink();
	displayCart();
});

$('.show-cart').on('click', '.handle-plus', (event) => {
	let name = event.currentTarget.dataset['name'];
	shoppingCart.addItemToCart(null, name, null, null);
	setLink();
	displayCart();
});

$('.show-cart').on('change', '.item-count', (event) => {
	let name = event.target.dataset['name'];
	let count = Number(event.target.value);
	shoppingCart.setCountForItem(name, count);
	setLink();
	displayCart();
});

$('.show-cart').on('click', '.handle-remove', (event) => {
	let name = event.target.dataset['name'];
	shoppingCart.removeItemFromCartAll(name);
	setLink();
	displayCart();
});

function setLink() {
	let jason = {};
	let thisDate = new Date();
	jason.id = new Date(thisDate.getFullYear(), (thisDate.getMonth()-1), thisDate.getDate()).getTime();
	jason.user = document.querySelector('.btn-print').getAttribute('data-user');
	jason.item = JSON.parse(sessionStorage.getItem('cart'));
	jason.datetime = (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().slice(0, 19).replace('T', ' ');
	jason.count = shoppingCart.totalCount();
	jason.subtotal = shoppingCart.totalCart();

	let header = "data:text/json;charset:utf-8," + encodeURIComponent(JSON.stringify(jason));
	let anchor = document.querySelector('#saveToLocal');
	anchor.setAttribute('href', header);
	anchor.setAttribute('download', "data.json");

	let context = document.querySelector('#context');
	context.value = JSON.stringify(jason);
}

function clock() {
	const month = [ "January", "February", "March", "April", "May", "June",
					"July", "August", "September", "October",
					"November", "December" ];

	let time = new Date(),    
		theDate = harold(time.getDate()) + ' ' + (month[time.getMonth()]) + ' ' + time.getFullYear(),
	    hours = time.getHours(),   
	    minutes = time.getMinutes(),
	    seconds = time.getSeconds();

	document.querySelector('#clock').innerHTML = theDate + ' ' + harold(hours) + ":" + harold(minutes) + ":" + harold(seconds);
  
	function harold(standIn) {
		if (standIn < 10) {
			standIn = '0' + standIn;
		} return standIn;
	}
}

const setClock = document.querySelector('#clock');
if (setClock) {
	setInterval(clock, 1000);
	// setInterval(() => console.log(new Date().toLocaleTimeString()),1000);
}

const checkout = document.querySelector('#checkout');
if (checkout) {
	setLink();
}

displayCart();