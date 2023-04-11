const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry)
        if (entry.isIntersecting) {
            entry.target.classList.add('show');
        } else {
            entry.target.classList.remove('show');
        }
    });
});
const observer2 = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry)
        if (entry.isIntersecting) {
            entry.target.classList.add('pop');
        } else {
            entry.target.classList.remove('pop');
        }
    });
});

const hiddenElements = document.querySelectorAll('.popularBooks');
hiddenElements.forEach((el) => observer.observe(el));
const hiddenElements2 = document.querySelectorAll('.aboutProject');
hiddenElements2.forEach((el1) => observer2.observe(el1));

function changeThemeColor() {
    const element = document.body;
    element.classList.toggle("light-mode");
    const genre = document.getElementsByClassName('genre');

    [...genre].forEach(e => {
        e.classList.toggle("light-mode");
    })
    
    const popular = document.getElementsByClassName('popular');

    [...popular].forEach(e => e.classList.toggle("light-mode"));

    const page = document.getElementsByClassName('page');

    [...page].forEach(e => {
        if(e.className !== 'current page') {
            if(e.style.color === 'black') e.style.color = 'white';
            e.style.color = 'black';
        }
    })
    if(element.classList.contains("light-mode")) {
        localStorage.setItem("theme", "light");
    } else {
        localStorage.setItem("theme", "dark");
    }
 }
 
 const theme = localStorage.getItem("theme");
 if (theme === "light") {
    changeThemeColor();
}

setTimeout(() => {
    const hiddenPool = document.getElementById('hideAlert');

    // 👇️ removes element from DOM
    hiddenPool.style.display = 'none';

    // 👇️ hides element (still takes up space on page)
    // box.style.visibility = 'hidden';
}, 5000); // 👈️ time in milliseconds

function increment() {
    let id = document.getElementsByClassName("hidden_id")[0].value;

    let xhr = new XMLHttpRequest();

    let url = './increment_download.php';

    let params = 'id=' + id;

    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
        }
    };
    xhr.send(params);
}

window.addEventListener('DOMContentLoaded', () => {
    const responsiveNav = document.createElement('div');
    const responsiveLayout = document.getElementById('responsiveNav');
    responsiveNav.id = 'cover';
    responsiveNav.style.position = 'fixed';
    responsiveNav.style.visibility = 'hidden';
    responsiveNav.style.left = '0';
    responsiveNav.style.top = '0';
    responsiveNav.style.bottom = '0';
    responsiveNav.style.right = '0';
    responsiveNav.style.opacity = '1.0';
    responsiveNav.style.transition = 'visibility 0s, opacity 0.5s';
    responsiveNav.style.zIndex = '20';
    responsiveNav.style.background = 'rgba( 0, 0, 0, 0.4)'; // Change this to your desired color
    responsiveNav.style.height = '100vh';
    responsiveNav.addEventListener('click', () => {
        responsiveLayout.style.right = '-280px';
        responsiveNav.style.visibility = 'hidden';
    });
    document.body.appendChild(responsiveNav);
});

const navSmall = document.getElementById('navSmall');

navSmall.addEventListener('click', () => {
    const responsiveNav = document.getElementById('cover');
    const alternate = document.getElementById('responsiveNav');
    alternate.style.right = "0";
    responsiveNav.style.visibility = 'visible';
})