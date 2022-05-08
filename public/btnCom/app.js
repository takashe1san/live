const bt = document.querySelectorAll(".box .x"),
box      = document.querySelectorAll(".box"),
form     = document.querySelectorAll(".box form");




for(let i = 0; i < bt.length; i++){
    bt[i].onclick = ()=>{
        if (box[i].classList.contains('open')) {
            setTimeout(() => {
                box[i].classList.toggle('boxAc');
                box[i].classList.toggle('open');
                bt[i].classList.toggle('spanAc');
                bt[i].classList.toggle('spanSl');
            }, 500);
            
            setTimeout(() => {
                form[i].classList.toggle('animeSl');
                form[i].classList.toggle('animeAc');
            }, 1);
        }else{
            setTimeout(() => {
                box[i].classList.toggle('boxAc');
                box[i].classList.toggle('open');
                bt[i].classList.toggle('spanAc');
                bt[i].classList.toggle('spanSl');
            }, 1);
            
            setTimeout(() => {
                form[i].classList.toggle('animeSl');
                form[i].classList.toggle('animeAc');
            }, 1000);
        }
        // bt.classList.toggle('ac');
    }  
    
    
}


const file = document.querySelector('#file-select');
file.addEventListener('change', (e) => {
  // Get the selected file
  const [file] = e.target.files;
  // Get the file name and size
  const { name: fileName, size } = file;
  // Convert size in bytes to kilo bytes
  const fileSize = (size / 1000).toFixed(2);
  // Set the text content
  const fileNameAndSize = `${fileName} - ${fileSize}KB`;
  document.querySelector('#file-select-text').textContent = fileNameAndSize;
});
// document.querySelector("html").classList.add('js');

// const fileInput  = document.querySelector( ".input-file" ),  
//     button     = document.querySelector( ".input-file-trigger" ),
//     the_return = document.querySelector(".file-return");
      
// button.addEventListener( "keydown", function( event ) {  
//     if ( event.keyCode == 13 || event.keyCode == 32 ) {  
//         fileInput.focus();  
//     }  
// });
// button.addEventListener( "click", function( event ) {
//    fileInput.focus();
//    return false;
// });  
// fileInput.addEventListener( "change", function( event ) {  
//     the_return.innerHTML = this.value;  
// });  