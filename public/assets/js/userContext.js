// window.onload=function (){escapeContext()};
// function escapeContext(){
    //let release=document.querySelectorAll("body:not(.contextBox)");
    // let release=document.querySelector("body");
    // let element=document.querySelector("aside.withcontext>div.contextBox");
    // release.addEventListener('click', function (){
    //     console.log("poop");
    //     if(element.classList.contains("nodisplay")){
    //         element.classList.add("nodisplay");
    //     }
    // })
    //console.log(release);
    // release.addEventListener('click', function (){console.log('release')})
// }
function openUserContext(){
    let element=document.querySelector("aside.withcontext>div.contextBox");
    element.classList.toggle('nodisplay')
}
