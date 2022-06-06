const container_post = document.querySelector(".container_post"),
Add = document.querySelector("#add"),
privacy = container_post.querySelector(".post #formPost .privacy"),
ii = privacy.querySelector(".ii"),
pp = privacy.querySelector("input"),
ss = privacy.querySelector("span"),
arrowBack = container_post.querySelector(".audience .arrow-back"),
stetp = document.querySelectorAll('.list li'),
formPost = container_post.querySelector("#formPost"),
sendPost = container_post.querySelector("#sendPost"),
fileImg= formPost.querySelector("#fileImg"),
fileConfig= formPost.querySelector("#fileConfig"),
inputfile= formPost.querySelector("#inputfile"),
postes = document.querySelectorAll(".postes"),
menu_links = document.querySelectorAll(".sle"),
po_sl = document.querySelectorAll(".po_sl"),
NotificationsSle = document.querySelectorAll(".NotificationsSle"),
btnNotifications = document.querySelector(".btnNotifications"),
showNotificationsv = document.querySelector(".showNotifications"),
btnpostssett= document.querySelector(".btnpostssett"),
AlertBox= document.querySelector(".AlertBox"),
AlertBoxI= document.querySelector(".AlertBox i"),
btnAlertBox= document.querySelector(".AlertBox button"),
AlertBoxP= document.querySelector(".AlertBox p"),
Fwrit_comment= document.querySelectorAll(".Fwrit-comment"),
backnot = document.querySelector(".backnot"),
Profile = document.querySelector(".profile"),
showProfile = document.querySelector("#showProfile"),
closeProfile = document.querySelector("#closeShowProfile"),
saveProfile = document.querySelector("#saveProfile"),
editProfile = document.querySelector("#editProfile"),
search_box = document.querySelector(".search-box"),
btneditImgProfile = document.querySelector("#btneditImgProfile"),
formProfile = document.querySelector("#formEditProfile");

formPost.onsubmit = (e)=>{
  e.preventDefault();
}
formProfile.onsubmit = (e)=>{
  e.preventDefault();
}
Fwrit_comment.forEach((item)=>item.onsubmit = (e)=>{
e.preventDefault();
})
fileImg.onclick = ()=>{
inputfile.click();
}
function refProfile(x) {
  if (x == "ok") {
    editProfile.classList.remove('btnOff')
    saveProfile.classList.add('btnOff')
    btneditImgProfile.classList.add('btnOff')
} else {
  console.log("ERROR")
  }}
showProfile.onclick= ()=>{
  showProfile.classList.add('showProfileRun')
  Profile.classList.add('showProfileRun')
}
closeProfile.onclick= ()=>{
  showProfile.classList.remove('showProfileRun')
  Profile.classList.remove('showProfileRun')
}
editProfile.onclick= ()=>{
  // showProfile.classList.add('showProfileRun')
  editProfile.classList.add('btnOff')
  saveProfile.classList.remove('btnOff')
  btneditImgProfile.classList.remove('btnOff')
}
saveProfile.onclick= ()=>{
  refProfile("ok")
  // let xhr = new XMLHttpRequest();
  // xhr.open("POST", "http://localhost:8000/test", true);
  // xhr.onload = ()=>{
  //   if(xhr.readyState === XMLHttpRequest.DONE){
  //       if(xhr.status === 200){
          
  //         let data = xhr.response;
  //          console.log(data)
  //         //  refProfile(x)
  //       }
  //   }
  // }
  // let formData = new FormData(formProfile);
  // xhr.send(formData);
  // // console.log(formData);
}

backnot.onclick = ()=>{
showNotificationsv.style.left = '100%';
backnot.classList.toggle('roro')

}
search_box.querySelector("input").onkeyup = ()=>{
let valSearch =  search_box.querySelector("input").value;
if (valSearch !='' || valSearch == '*') {
 search_box.classList.add('runSearch')
 
} else {
search_box.classList.remove('runSearch')
}
let xhr = new XMLHttpRequest();
xhr.open("GET", "http://localhost:8000/docsearch/"+valSearch, true);
xhr.onload = ()=>{
 if(xhr.readyState === XMLHttpRequest.DONE){
     if(xhr.status === 200){
       let data = xhr.response;
      //  document.querySelector(".search_box_sl").innerHTML = data;
      console.log(data)
       
     }
 }
}
//  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send();

}

NotificationsSle.forEach((item)=>item.onclick = function og(){
// NotificationsSle.forEach((item)=>item.classList.remove('run'));
showNotificationsv.style.left = '0%';
backnot.classList.toggle('roro')
let time = this.querySelector('.timeNotsmal').innerHTML,
sub = this.querySelector('.subsmal').innerHTML,
sender = this.querySelector('.sendersmal').innerHTML,
img = this.querySelector('.imgNotsmal').src,
p = this.querySelector('.pNotsmal').innerHTML;
showNotificationsv.querySelector('.timeNotlarg').innerHTML =time;
showNotificationsv.querySelector('.sub').innerHTML=sub;
showNotificationsv.querySelector('.sender').innerHTML =sender;
showNotificationsv.querySelector('.imgNotlarg').src =img;
showNotificationsv.querySelector('.pNotlarg').innerHTML = p;
// console.log(time , sub , p ,img)
})
menu_links.forEach((item)=>
item.onclick = function activeLink(){
if(this.classList.contains('ac'))
{ this.classList.add('isac');}
else{ this.classList.remove('isac');}
menu_links.forEach((item)=>item.classList.remove('ac','run'));
if(this.classList.contains('isac'))
{ this.classList.remove('ac','run','isac');}
else{ this.classList.add('ac','run');}
 })
po_sl.forEach((item)=>
    item.onclick = function activeLink(){
      po_sl.forEach((item)=>item.classList.remove('ac','run'));
      this.classList.add('runsetting');
      btnpostssett.classList.remove('ac','run','isac')
       })
postes.forEach((item)=>
  item.querySelector(".btncomm").onclick =function ss(){
    let s =this.querySelector('i');
    this.classList.toggle('showcomm')
    this.classList.toggle('hiddcomm')
    this.classList.toggle('rrun')
    s.classList.toggle('bi-chat-left-text')
    s.classList.toggle('bi-chat-left-text-fill')
  })
postes.forEach((item)=>
  item.querySelector(".settPost").onclick =function ss(){
    this.classList.toggle('rrrun')
    this.classList.toggle('bi-three-dots-vertical')
    this.classList.toggle('bi-three-dots')
  })
  // Delet The Post
postes.forEach((item)=>
  item.querySelector(".PostDelet").onclick =function ss(){
    let id = this.querySelector('span').innerHTML,
    csrf = this.querySelector('input').value;
    let xhr = new XMLHttpRequest();
    xhr.open("get", "http://localhost:8000/delCon/"+id, true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            console.log(`server say: ${data}`)
          }
      }
    }
    xhr.send();
  })
postes.forEach((item)=>
  item.querySelector(".PostRep").onclick =function ss(){
    let id = this.querySelector('span').innerHTML;
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "http://localhost:8000/report/"+id, true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            console.log(`server say: ${data}`)
          }
      }
    }
    xhr.send();
  })
postes.forEach((item)=>
    item.querySelector(".btnlike").onclick =function ss(){
      let id = this.querySelector('span').innerHTML;
      let xhr = new XMLHttpRequest();
      xhr.open("GET", "http://localhost:8000/like/"+id, true);
      xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
              let data = xhr.response;
              let s =this.querySelector('i');
              this.classList.toggle('gitLike')
              this.classList.toggle('notlike')
              this.classList.toggle('rrun')
              s.classList.toggle('bi-hand-thumbs-up')
              s.classList.toggle('bi-hand-thumbs-up-fill')
              this.querySelector('likeCount').innerHTML = data;
              console.log(`server say: ${data}`)
            }
        }
      }
      xhr.send();
      
    })
postes.forEach((item)=>
      item.querySelector(".btnshear").onclick =function ss(){
        const s =this.querySelector('i'),
        url = this.querySelector("input");
        url.select();
        url.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(url.value);
        s.classList.add('bi-check-lg')
      })
      ///   This is Tha takekat
postes.forEach((item)=>{
      const form = item.querySelector(".Fwrit-comment");
    postes.forEach((item)=>
      item.querySelector(".btnFwrit-comment").onclick =function ss(){
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "http://localhost:8000/test", true);
        xhr.onload = ()=>{
          if(xhr.readyState === XMLHttpRequest.DONE){
              if(xhr.status === 200){
                
                let data = xhr.response;
                 console.log(data)
                 form.querySelector('.comm_content').value='';
              }
          }
        }
        let formData = new FormData(form);
        //  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(formData);
        // console.log(formData);
      })})
Add.onclick = ()=>{
container_post.classList.toggle('container_postSl');
container_post.classList.toggle('container_postAc');
Add.classList.toggle('ac');
}
inputfile.onchange = (e) => {
// Get the selected file
let [file] = e.target.files;
// Get the file name and size
let { name: fileName, size } = file;
// Convert size in bytes to kilo bytes
// let fileSize = (size / 1000).toFixed(2);
let fileSize = formatSizeUnits(size);
// Set the text content
let fileNameAndSize = `${fileName} - ${fileSize}`;
fileConfig.textContent = fileNameAndSize;
}
stetp.forEach((item)=>
item.onclick = function activeLink(){
    stetp.forEach((item)=>item.classList.remove('active'));
    this.classList.add('active');
    oo();
    let detailsP = this.querySelector(".details p").innerHTML,
        detailsI = this.querySelector(".icon i").classList[1],
        iiClass = ii.classList[2];
    // var 
    ii.classList.replace(iiClass,detailsI)
    ss.innerHTML = detailsP;
    pp.value = detailsP[0];
    console.log(ss.innerHTML = detailsP
      , pp.value = detailsP[0])
  });
privacy.onclick = () => {
 oo();
};
function oo(){
  container_post.classList.toggle("active");
  // btnPost.classList.toggle("disNone");
}
arrowBack.onclick = () => {
  oo();
};


sendPost.onclick = ()=>{
let xhr = new XMLHttpRequest();
let url = "";
if(formPost.querySelector('#postType').innerHTML=="user"){
   url = "insertCon";
}else{
   url = "insertInfo";
}
// console.log(url);
xhr.open("POST", "http://localhost:8000/"+url, true);
xhr.onload = ()=>{
if(xhr.readyState === XMLHttpRequest.DONE){
    if(xhr.status === 200){
      
      let data = xhr.response;
       console.log(`server say: ${data}`)
       formPost.querySelector('textarea').value='';
    }
}
}
let formData = new FormData(formPost);
xhr.send(formData);
// 
}

function formatSizeUnits(bytes){
if      (bytes >= 1073741824) { bytes = (bytes / 1073741824).toFixed(2) + " GB"; }
else if (bytes >= 1048576)    { bytes = (bytes / 1048576).toFixed(2) + " MB"; }
else if (bytes >= 1024)       { bytes = (bytes / 1024).toFixed(2) + " KB"; }
else if (bytes > 1)           { bytes = bytes + " bytes"; }
else if (bytes == 1)          { bytes = bytes + " byte"; }
else                          { bytes = "0 bytes"; }
return bytes;
}

btnAlertBox.onclick = ()=>{AlertBox.classList.remove('runAlertBox')}
function alertBox(str,color) {
  if (color == 'G') {
    AlertBox.classList.add('runAlertBox')
    AlertBoxI.classList.remove('bi-exclamation-circle-fill','bi-x-circle-fill','error3','error2')
    AlertBoxI.classList.add('bi-check-circle-fill','error1')
    AlertBoxP.innerHTML = str;
   } else if(color == 'R'){
    AlertBox.classList.add('runAlertBox')
    AlertBoxI.classList.remove('bi-check-circle-fill','bi-exclamation-circle-fill','error1','error3')
    AlertBoxI.classList.add('bi-x-circle-fill','error2')
    AlertBoxP.innerHTML = str;
   }else{
    AlertBox.classList.add('runAlertBox')
    AlertBoxI.classList.remove('bi-check-circle-fill','bi-x-circle-fill','error1','error2')
    AlertBoxI.classList.add('bi-exclamation-circle-fill','error3')
    AlertBoxP.innerHTML = str;
   }
  
}