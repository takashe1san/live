      const container_post = document.querySelector(".container_post"),
      btnPost = container_post.querySelector("#btnPost"),
      privacy = container_post.querySelector(".post #formPost .privacy"),
      ii = privacy.querySelector(".ii"),
      pp = privacy.querySelector("input"),
      ss = privacy.querySelector("span"),
      arrowBack = container_post.querySelector(".audience .arrow-back"),
      stetp = document.querySelectorAll('.list li'),
      formPost = container_post.querySelector("form"),
      sendPost = container_post.querySelector("#sendPost"),
      fileImg= formPost.querySelector("#fileImg"),
      fileConfig= formPost.querySelector("#fileConfig"),
      inputfile= formPost.querySelector("#inputfile");
      
    //   formPost.onsubmit = (e)=>{
    //     e.preventDefault();
    // }
    fileImg.onclick = ()=>{
      inputfile.click();
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
    btnPost.onclick = ()=>{
      container_post.classList.toggle('Ac');
      container_post.classList.toggle('Sl');
      btnPost.classList.toggle('btnPostAc');
      btnPost.classList.toggle('btnPostSl');
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
        });
      privacy.onclick = () => {
       oo();
      };
      function oo(){
        container_post.classList.toggle("active");
        btnPost.classList.toggle("disNone");
      }
      arrowBack.onclick = () => {
        oo();
      };


      sendPost.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ss.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            
            let data = xhr.response;
             console.log(data)
          }
      }
    }
    let formData = new FormData(formPost);
    xhr.send(formData);
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