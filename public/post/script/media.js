const mediafile = document.querySelectorAll(".fFile"),
showMedia = document.querySelector(".showMedia"),
showAudio = document.querySelector(".showAudio"),
closeShowMedia = document.querySelector("#closeShowMedia"),
closeShowAudio = document.querySelector("#closeShowAudio"),
showMediaJs = document.querySelector(".showMediaJs"),
showAudioJs = document.querySelector(".showAudioJs");
closeShowMedia.onclick = ()=>{
  showMedia.classList.remove('showMediaRun')
  showMediaJs.innerHTML=``;
}
closeShowAudio.onclick = ()=>{
  showAudio.classList.remove('showAudioRun')
  showAudioJs.innerHTML=``;
}
mediafile.forEach((item)=>item.onclick =function MediaJs(){
  let type = this.querySelector(".mediaType").innerHTML,
  src = this.querySelector(".src").innerHTML;
  if (type == "audio") {
    showAudioJs.innerHTML=ShowMedia(type,src);
    showAudio.classList.add('showAudioRun')
  } else {
    showMediaJs.innerHTML=ShowMedia(type,src);
    showMedia.classList.add('showMediaRun')
  }
})
function ShowMedia(type,src) {
  let res = ``;
  if (type == "img") {
    res =`<img src="${src}">`
  } else if (type == "video") {
    res = `<video width="400" controls>
    <source src="${src}" type="video/mp4">
  </video>`
  } else if (type == "audio") {
    res = `<audio controls>
           <source src="${src}" type="audio/mpeg">
           </audio>`
  } else if(type == "pdf"){res = `<iframe src="${src}"></iframe>`}
  else {res = `File Not Found!!`}
    return res;
  }