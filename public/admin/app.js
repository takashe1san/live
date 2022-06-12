document.addEventListener('DOMContentLoaded', function () {
    var modeSwitch = document.querySelector('.mode-switch');
  
    modeSwitch.addEventListener('click', function () {                     document.documentElement.classList.toggle('dark');
      modeSwitch.classList.toggle('active');
    });
    
    var listView = document.querySelector('.list-view');
    var gridView = document.querySelector('.grid-view');
    var projectsList = document.querySelector('.project-boxes');
    
    listView.addEventListener('click', function () {
      gridView.classList.remove('active');
      listView.classList.add('active');
      projectsList.classList.remove('jsGridView');
      projectsList.classList.add('jsListView');
    });
    
    gridView.addEventListener('click', function () {
      gridView.classList.add('active');
      listView.classList.remove('active');
      projectsList.classList.remove('jsListView');
      projectsList.classList.add('jsGridView');
    });
    
    document.querySelector('.messages-btn').addEventListener('click', function () {
      document.querySelector('.messages-section').classList.add('show');
    });
    
    document.querySelector('.messages-close').addEventListener('click', function() {
      document.querySelector('.messages-section').classList.remove('show');
    });
  });

  const btnLic = document.querySelectorAll('.btnLic');

  btnLic.forEach((item)=>item.onclick = ()=>{
    let id = item.querySelector('i').innerHTML;
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "http://localhost:8000/validLic/"+id, true);
    xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          
          let data = xhr.response;
          console.log(`server say: ${data}`)
          item.classList.add('btnLic.check')
          // item.innerHTML = `<i class="bi bi-check-circle-fill"></i>`;
        }
    }
    }
    xhr.send();
// 
  })