const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");
const typeb = document.querySelector('.select i img');
const typed = document.querySelector('.select_s i img');
const docB = document.querySelector("#Doc");
const userB = document.querySelector('#User');
const docA = document.querySelector("#Doc1");
const userA = document.querySelector('#User1');
userB.click();
userA.click();
function changeTypeUser(){
    typeb.classList.toggle('soso');
    typeb.classList.toggle('soosoo');
    typed.classList.toggle('soso');
    typed.classList.toggle('soosoo');
    userB.click();
    docB.click();
    userA.click();
    docA.click();
};

function changeTypeDoc(){
    docB.click();
    userB.click();
    docA.click();
    userA.click();
    typeb.classList.toggle('soso');
    typeb.classList.toggle('soosoo');
    typed.classList.toggle('soso');
    typed.classList.toggle('soosoo');
};

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});
