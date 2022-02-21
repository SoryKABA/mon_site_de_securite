let listes = document.querySelectorAll("li")
for (let i = 0; i < listes.length; i++) {
    const li = listes[i];
    li.addEventListener('click', function () {
        document.querySelector('.active').classList.remove('active')
        this.classList.add('active')
    })
}