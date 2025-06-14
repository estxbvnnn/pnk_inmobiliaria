document.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('form');

    forms.forEach(form => {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            const isValid = validateForm(form);
            if (isValid) {
                form.submit();
            }
        });
    });

    function validateForm(form) {
        let isValid = true;
        const inputs = form.querySelectorAll('input, select, textarea');

        inputs.forEach(input => {
            if (!input.value.trim()) {
                showError(input, 'Este campo es obligatorio');
                isValid = false;
            } else {
                clearError(input);
            }

            if (input.name === 'rut' && !validateRUT(input.value)) {
                showError(input, 'RUT no es válido');
                isValid = false;
            }

            if (input.name === 'email' && !validateEmail(input.value)) {
                showError(input, 'Email no es válido');
                isValid = false;
            }

            if (input.name === 'phone' && !validatePhone(input.value)) {
                showError(input, 'Número de teléfono no es válido');
                isValid = false;
            }
        });

        return isValid;
    }

    function showError(input, message) {
        const error = document.createElement('span');
        error.className = 'error-message';
        error.textContent = message;
        input.classList.add('error');
        input.parentNode.insertBefore(error, input.nextSibling);
    }

    function clearError(input) {
        input.classList.remove('error');
        const error = input.parentNode.querySelector('.error-message');
        if (error) {
            error.remove();
        }
    }

    function validateRUT(rut) {
        return true; 
    }

    function validateEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

    function validatePhone(phone) {
        const regex = /^\d{9}$/; 
        return regex.test(phone);
    }
});