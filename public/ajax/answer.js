const forms   = document.querySelectorAll(".box form.answer"),
      submits = document.querySelectorAll("form.answer button"),
      fields  = document.querySelectorAll("form.answer textarea");

const cforms   = document.querySelectorAll(".box form.comment"),
      csubmits = document.querySelectorAll("form.comment button"),
      cfields  = document.querySelectorAll("form.comment textarea");


forms.forEach((f)=>{
    f.onsubmit = (e) => {
        e.preventDefault();
    }
})

cforms.forEach((f)=>{
    f.onsubmit = (e) => {
        e.preventDefault();
    }
})


for(let i = 0; i < forms.length; i++){
    submits[i].addEventListener("click", () => {
        let xhr = new XMLHttpRequest();
        xhr.onload = () => {
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    // msg.innerHTML = xhr.response;
                }
            }
        }
        xhr.open("post","./insertAns");
        let formdata = new FormData(forms[i]);
        xhr.send(formdata);
        fields[i].value = '';
    })
}


for(let i = 0; i < cforms.length; i++){
    csubmits[i].addEventListener("click", () => {
        let xhr = new XMLHttpRequest();
        xhr.onload = () => {
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    // msg.innerHTML = xhr.response;
                }
            }
        }
        xhr.open("post","./insertCom");
        let formdata = new FormData(cforms[i]);
        xhr.send(formdata);
        cfields[i].value = '';
    })
}