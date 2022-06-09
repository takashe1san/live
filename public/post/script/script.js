const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text"),
      btnGoToUp = document.querySelector(".btnGoToUp");


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})

modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");
    
    if(body.classList.contains("dark")){
        modeText.innerText = "Light mode";
    }else{
        modeText.innerText = "Dark mode";
        
    }
});

console.log(window.innerHeight)

window.onscroll = function()
{
    if(window.pageYOffset >= 400)
    {
        btnGoToUp.style.display = " block " ;
    }
    else
    {
        btnGoToUp.style.display = " none " ;
    }
}

btnGoToUp.onclick = ()=>
{
    window.scrollTo(0,0);
}

// let scrollToBottom = document.querySelector('#scroll-to-bottom');
// let pageBottom = document.querySelector('#page-bottom');

// scrollToBottom.addEventListener('click', function () {
  
//   pageBottom.scrollIntoView();
// })