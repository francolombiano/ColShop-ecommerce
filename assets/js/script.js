//Function Pour montrer et masquer le mot de passe du le formulaire 
let champMotPasse = document.getElementById("motPasse");
//console.log(champPasword);
let show = document.getElementById("toggleMotPasse");
//console.log(togglePassword);
let eyeIcon = document.querySelector(".iconeye");
//console.log(eyeIcon);

show.addEventListener("click", function() {
    if (champMotPasse.type === "password") {
        champMotPasse.type = "text";
        eyeIcon.classList.remove("bi-eye-slash");
        eyeIcon.classList.add("bi-eye");
    } else {
        champMotPasse.type = "password";
        eyeIcon.classList.remove("bi-eye");
        eyeIcon.classList.add("bi-eye-slash");
    }
});

//Function pour montrer et masquer la confirmation du le mot de pass du le formulaire 

let champConfirmMotPasse = document.getElementById("confirmMotPasse");
//console.log(champPasword);
let showConfirmMotPasse = document.getElementById("toggleConfirmMotPasse");
//console.log(togglePassword);
let eyeIconConfirmMotPasse = document.querySelector(".iconeye1");
//console.log(eyeIcon);

showConfirmMotPasse.addEventListener("click", function() {
    if (champConfirmMotPasse.type === "password") {
        champConfirmMotPasse.type = "text";
        eyeIconConfirmMotPasse.classList.remove("bi-eye-slash");
        eyeIconConfirmMotPasse.classList.add("bi-eye");
    } else {
        champConfirmMotPasse.type = "password";
        eyeIconConfirmMotPasse.classList.remove("bi-eye");
        eyeIconConfirmMotPasse.classList.add("bi-eye-slash");
    }
});

/********************Validation du le formulaire 1*****************/

let myForm = document.getElementById('form1');
//console.log(myForm);

 let inputNom = document.getElementById('nom');
// console.log(inputNom);
let nomError = document.getElementById('nomError');
 //console.log(nomError);

let inputTelephone = document.getElementById('telephone');
// //console.log(inputTelephone);
let telephoneError = document.getElementById('telephoneError');
// //console.log(telephoneError);

let inputEmail = document.getElementById('email');
// //console.log(inputEmail);
let emailError = document.getElementById('emailError');
// //console.log(emailError);

 let inputMotPasse = document.getElementById('motPasse');
// //console.log(motPasse);
 let motPasseError = document.getElementById('motPasseError');
// //console.log(motPasseError);

 let inputConfirmMotPasse = document.getElementById('confirmMotPasse');
// //console.log(inputConfirmPwd);
 let confirmMotPasseError = document.getElementById('confirmMotPasseError');
// //console.log(confirmPwdError);

 let inputCivility = document.getElementById('civility');
// //console.log(inputCivility);
 let civilityError = document.getElementById('civilityError');
// //console.log(civilityError);
let inputVille = document.getElementById('ville');
//console.log(inputAdresse);
let villeError = document.getElementById('villeError');
//console.log(adresseError);


myForm.addEventListener('submit', function(event){
            event.preventDefault();
    let valueNom = inputNom.value.trim();
    let valueTelephone = inputTelephone.value;
    let valueEmail = inputEmail.value.trim();
    let valueMotPasse = inputMotPasse.value;
    let valueConfirmMotPasse = inputConfirmMotPasse.value;
    let valueCivility = inputCivility.value;
    let valueVille = inputVille.value;

        nomError.textContent = '';
        telephoneError.textContent = '';
        emailError.textContent = '';
        motPasseError.textContent = '';
        confirmMotPasseError.textContent = '';
        civilityError.textContent = '';
        villeError.textContent = '';
    
//Vérifiez que le champ du nom n'est pas vide
  if (valueNom === '') {
    nomError.textContent = 'Veuillez entrer votre prenom';
    inputNom.focus();
    return;
}
//  Restriction pour le champ nom complet du le formulaire
if (valueNom.length < 3 || valueNom.length > 50) {
    nomError.textContent = 'Le prenom doit comporter entre 3 et 50 caractères..';
    inputNom.focus(); 
    return false;
    }

//Pour vérifier que le champ téléphone n'est pas vide et est correctement renseigné
if (valueTelephone.length <10) {
    telephoneError.textContent = "Veuillez saisir un numéro de téléphone contenant 10 chiffres";
  } else {
    telephoneError.textContent = "";
  }

//Pour vérifier que le champ email n'est pas vide
if (valueEmail === '') {
    emailError.textContent = 'Veuillez entrer votre email';
    inputEmail.focus();
     return;
     }

// Expression régulière pour valider le format de l'e-mail
let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

  if (!emailRegex.test(valueEmail)) { 
    emailError.textContent = 'Veuillez entrer un email valide';
    inputEmail.focus();
    return;
    }else {
        emailError.textContent = '';
     }

//Pour vérifier que le champ, mot de passe, n'est pas vide et est correctement renseigné
if (valueMotPasse === '') {
    motPasseError.textContent = 'Vous devez entrer un mot de passe valide';
    inputMotPasse.focus();
    return;
    }

    //Pour vérifier que le champ, confirm mot de passe, n'est pas vide et est correctement renseigné
if (valueConfirmMotPasse === '') {
    confirmMotPasseError.textContent = 'Vous devez confirmer le mot de passe';
    inputConfirmMotPasse.focus();
    return;
}

// Expression régulière pour valider le format du mot de passe, Le mot de passe doit comporter au moins 8 caractères, 1 lettre majuscule, 1 lettre minuscule, 1 chiffre et 1 caractère spécial (entre !@#$%^&*(),.?":{}|<>).

let passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

if (!passwordRegex.test(valueMotPasse)) {
    motPasseError.textContent = "Le mot de passe doit contenir au moins 8 caractères, 1 majuscule, 1 minuscule, 1 chiffre, et 1 caractère spécial.";
    inputMotPasse.focus();
    return;
} else {
    motPasseError.textContent = '';
}

// Pour valider la confirmation du mot de passe
    if (valueMotPasse  !== valueConfirmMotPasse) {
        confirmMotPasseError.textContent = "Les mots de passe ne correspondent pas.";
        inputConfirmMotPasse.focus();
        return;
    } else {
        confirmMotPasseError.textContent = '';
    }

// Pour vérifier que le champ civilité n'est pas vide
   if (valueCivility == "") {
    civilityError.textContent = 'Vous devez choisir une option';
       inputCivility.focus();
    return;
   }

   // Pour vérifier que le ville n'est pas vide 
  if (valueVille == "") {
    villeError.textContent = 'Vous devez préciser une Ville';
      inputVille.focus();
   return;
  }

    if (nomError.textContent === '' && telephoneError.textContent === '' && emailError.textContent === '' && motPasseError.textContent === '' && confirmMotPasseError.textContent === '' && civilityError.textContent === '' && villeError.textContent === '') {
        inputNom.style.borderColor = 'red';
        inputTelephone.style.borderColor = 'red';
        inputEmail.style.borderColor = 'red';
        inputMotPasse.style.borderColor = 'red';
        inputConfirmMotPasse.style.borderColor = 'red';
        inputCivility.style.borderColor = 'red';
        inputVille.style.borderColor = 'red';
    
        document.querySelector('form').submit();

        myForm.reset();
}
});

