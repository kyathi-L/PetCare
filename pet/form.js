function validateForm(event) {
    event.preventDefault();

    const name = document.getElementById('name').value;
    const age = document.getElementById('age').value;
    const email = document.getElementById('email').value;
    const pincode = document.getElementById('pincode').value;
    const password = document.getElementById('password').value;

    const errorMessages = [];

    if (!/^[A-Za-z ]+$/.test(name)) {
        errorMessages.push('Name should contain alphabets or spaces only.');
    }

    if (age < 18 || age > 60) {
        errorMessages.push('Age should be between 18 and 60.');
    }

    if (!validateEmail(email)) {
        errorMessages.push('Invalid email format.');
    }

    if (!/^\d{6}$/.test(pincode)) {
        errorMessages.push('PIN code should contain 6 digits.');
    }

    if (!/(?=.\d)(?=.[a-z])(?=.[A-Z])(?=.\W).{8,}/.test(password)) {
        errorMessages.push('Password must have a minimum length of 8 characters, at least one lower case letter, one upper case letter, one special character, and one digit.');
    }

    const errorDiv = document.getElementById('errorMessages');
    errorDiv.innerHTML = '';

    if (errorMessages.length > 0) {
        errorMessages.forEach(message => {
            const p = document.createElement('p');
            p.textContent = message;
            errorDiv.appendChild(p);
        });
    } else {
        alert('Registration successful!');
        document.getElementById('registrationForm').reset();
    }
}
function validateEmail(email) {
    const re = /\S+@\S+\.\S+/;
    return re.test(email);
}

