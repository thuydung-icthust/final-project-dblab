function formValidation() {
  let uid = document.registration.username;
  let passid = document.registration.password;
  let uname = document.registration.name;
  let address = document.registration.address;
  let phone = document.registration.phone;
  if (validUsername(uid)) {
    if (validPass(passid)) {
      if (validName(uname)) {
        if (validAddress(address)) {
          if (validPhone(phone)) {
            return true;
          }
        }
      }
    }
  }
  return false;
}

function validUsername(uid) {
  let uid_len = uid.value.length;
  if (uid_len == 0) {
    alert("Username should not be empty");
    uid.focus();
    return false;
  }
  return true;
}

function validPass(passid) {
  let passid_len = passid.value.length;
  if (passid_len == 0) {
    alert("Password should not be empty");
    passid.focus();
    return false;
  }
  return true;
}

function validName(uname) {
  let letters = /^[A-Za-z]+$/;
  if (uname.value.length == 0) {
    alert("Name should not be empty");
    uname.focus();
    return false;
  }
  if (uname.value.match(letters)) {
    return true;
  } else {
    alert("Name must have alphabet characters only");
    uname.focus();
    return false;
  }
}

function validAddress(uadd) {
  if (uadd.value.length == 0) {
    alert("User address must not be blank!");
    uadd.focus();
    return false;
  }
  return true;
}

function validPhone(phone) {
  if (phone.value.length == 0) {
    alert("Phone must not be blank!");
    phone.focus();
    return false;
  }
  const phoneRegex =
    /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
  if (!phoneRegex.test(String(phone.value).toLowerCase())) {
    alert("Telephone is not in correct format!");
    phone.focus();
    return false;
  }
  return true;
}
