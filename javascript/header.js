const toggleButton = document.querySelector('#btn');

toggleButton.addEventListener('click', (e)=>{
  e.stopImmediatePropagation();
  alert('cliqué')
})