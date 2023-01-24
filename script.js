const observer = new IntersectionObserver((entries)=>{
    entries.forEach((entry) => {
        console.log(entry)
        if(entry.isIntersecting){
            entry.target.classList.add('show');
        } else{
            entry.target.classList.remove('show');
        }
    });
});
const observer2 = new IntersectionObserver((entries)=>{
    entries.forEach((entry) => {
        console.log(entry)
        if(entry.isIntersecting){
            entry.target.classList.add('pop');
        } else{
            entry.target.classList.remove('pop');
        }
    });
});

const hiddenElements = document.querySelectorAll('.popularBooks');
hiddenElements.forEach((el) => observer.observe(el));
const hiddenElements2 = document.querySelectorAll('.aboutProject');
hiddenElements2.forEach((el1) => observer2.observe(el1));

function changeThemeColor(){
    var element = document.body;
    element.classList.toggle("light-mode");
}

setTimeout(() => {
    const hiddenPool = document.getElementById('hideAlert');
  
    // 👇️ removes element from DOM
    hiddenPool.style.display = 'none';
  
    // 👇️ hides element (still takes up space on page)
    // box.style.visibility = 'hidden';
  }, 5000); // 👈️ time in milliseconds
