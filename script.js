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

const hiddenElements = document.querySelectorAll('.popularBooks');
hiddenElements.forEach((el) => observer.observe(el));

function changeThemeColor(){
    var element = document.body;
    element.classList.toggle("light-mode");
}

