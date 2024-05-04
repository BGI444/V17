document.addEventListener('DOMContentLoaded', function() {
    var orderForm = document.getElementById('orderForm');
    var errorMessage = document.getElementById('error-message');

    orderForm.addEventListener('submit', function(event) {
        var isFormValid = true;
        var dishQuantities = orderForm.querySelectorAll('input[type="number"]');

        dishQuantities.forEach(function(input) {
            var maxQuantity = parseInt(input.max, 10);
            var currentValue = parseInt(input.value, 10);

            if (currentValue < 0 || currentValue > maxQuantity) {
                isFormValid = false;
                input.classList.add('error'); 
            } else {
                input.classList.remove('error');
            }
        });

        if (!isFormValid) {
        
            event.preventDefault();
            if (errorMessage) {
                errorMessage.textContent = 'Bitte überprüfen Sie die eingegebenen Mengen.';
                errorMessage.style.display = 'block';
            }
        } else {
            if (errorMessage) {
                errorMessage.textContent = 'Ihre Bestellung wird verarbeitet. Bitte warten...';
                errorMessage.style.display = 'block';
            }
        }
    });
});
