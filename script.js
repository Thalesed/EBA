const trigger = document.querySelector('.titulo');
const balloon = document.querySelector('.menu-principal');

trigger.addEventListener('mouseover', () => {
  balloon.style.display = 'block';
  trigger.style.display = 'none';
});

trigger.addEventListener('mouseout', () => {
  balloon.style.display = 'none';
  trigger.style.display = 'flex';
});

balloon.addEventListener('mouseover', () => {
    balloon.style.display = 'block';
    trigger.style.display = 'none';
  });

balloon.addEventListener('mouseout', () => {
    balloon.style.display = 'none';
    trigger.style.display = 'flex';
  });


console.log("teste")
