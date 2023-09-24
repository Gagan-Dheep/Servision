const loginForm = document.querySelector('#login-in');
const signUpForm = document.querySelector('#login-up');

const emailRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

// Validation of the login form.
loginForm.onsubmit = () => {
  const usernameField = document.querySelector('#login-in input[name="olduser"]');
  const passwordField = document.querySelector('#login-in input[name="oldpass"]');

  // Check for empty field.
  if (usernameField.value === '') {
    alert('Please enter your username.');
    return false;
  }

  if (passwordField.value === '') {
    alert('Please enter your password.');
    return false;
  }

  // If all fields are valid.
  return true;
};

// Validation of the sign up form.
signUpForm.onsubmit = () => {
  
    // Check for the username, email, and password fields are empty.
  const usernameField = document.querySelector('#login-up input[name="Username"]');
  const emailField = document.querySelector('#login-up input[name="Email"]');
  const passwordField = document.querySelector('#login-up input[name="Password"]');
  
  // Check for the empty field.
  if (usernameField.value === '') {
    alert('Please enter your username');
    return false;
  }

  if (emailField.value === '') {
    alert('Please enter your email.');
    return false;
  }

  if (passwordField.value === '') {
    alert('Please enter your password.');
    return false;
  }

  // Check if the email address is valid.
  if (!emailRegex.test(emailField.value)) {
    alert('Please enter a valid email address.');
    return false;
  }

  // If all fields are valid.
  return true;
};
