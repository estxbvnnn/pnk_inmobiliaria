document.addEventListener('DOMContentLoaded', function() {
    const showAlert = (title, text, icon) => {
        Swal.fire({
            title: title,
            text: text,
            icon: icon,
            confirmButtonText: 'OK'
        });
    };

    const handleFormSubmission = (formId) => {
        const form = document.getElementById(formId);
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            showAlert('Success', 'Form submitted successfully!', 'success');
        });
    };

    handleFormSubmission('gestorForm'); 
    handleFormSubmission('propietarioForm'); 
});