password=document.querySelector('form.grid-container>input.pword');
passwordRepeat=document.querySelector('form.grid-container>input.pword-repeat');
submit=document.querySelector("form.grid-container>button.submit");
formerror=document.querySelector("form.grid-container>div.formerrors");

password.addEventListener('keyup', event=>{
    if (password.value===passwordRepeat.value){
        submit.disabled=false;
        submit.setAttribute("title", "Submit")
        formerror.style.display="none";
    }else{
        submit.disabled=true;
        submit.setAttribute("title", "Passwörter stimmen nicht überein")
        formerror.style.display="block";
        formerror.innerHTML="Passwörter stimmen nicht überein"
    }
})
passwordRepeat.addEventListener('keyup', event=>{
    if (password.value===passwordRepeat.value){
        submit.disabled=false;
        submit.setAttribute("title", "Submit")
        formerror.style.display="none";
    }else{
        submit.disabled=true;
        submit.setAttribute("title", "Passwörter stimmen nicht überein")
        formerror.style.display="block";
        formerror.innerHTML="Passwörter stimmen nicht überein"
    }
})
