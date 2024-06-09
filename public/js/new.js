function decreaseQuantity(id) {
    var quantityInput = document.getElementById("quantity-input-" + id);
    var currentValue = parseInt(quantityInput.value);
    if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
        updatePrice(id);
    }
}

function increaseQuantity(id) {
    var quantityInput = document.getElementById("quantity-input-" + id);
    var currentValue = parseInt(quantityInput.value);
    quantityInput.value = currentValue + 1;
    updatePrice(id);
}

function updatePrice(id) {
    var quantityInput = document.getElementById("quantity-input-" + id);
    var quantity = parseInt(quantityInput.value);
    var itemRow = quantityInput.closest('.item-row');
    var priceElement = itemRow.querySelector('.item-price');
    var unitPrice = parseFloat(priceElement.getAttribute('data-price'));
    var newPrice = unitPrice * quantity;
    priceElement.textContent = "$" + newPrice.toFixed(2);
    updateOrderSummary();
}

function updateOrderSummary() {
    var subtotal = 0;
    var itemPrices = document.querySelectorAll('.item-price');
    itemPrices.forEach(function(priceElement) {
        subtotal += parseFloat(priceElement.textContent.replace('$', ''));
    });

    document.getElementById('subtotal').textContent = "$" + subtotal.toFixed(2);

    var shippingFee = subtotal > 0 ? 30.00 : 0;
    var total = subtotal + shippingFee;

    var shippingFeeElement = document.getElementById('shipping-fee');
    if (shippingFeeElement) {
        shippingFeeElement.textContent = "$" + shippingFee.toFixed(2);
    }

    document.getElementById('total').textContent = "$" + total.toFixed(2);
}

document.addEventListener('DOMContentLoaded', updateOrderSummary);
