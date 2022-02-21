(function () {
    let list = document.querySelectorAll('.button')
    for (let i = 0; i < list.length; i++) {
        let li = list[i]
        li.addEventListener('mouseover', function () {
            let active = document.querySelector('div.onglet.active')
            active.style.display = "block"
            active.style.boxShadow = "0 0 2px #ccc"
            active.style.padding = "1rem 2rem"
            active.style.width = "80%"
            active.style.border = "1px solid rgba(21, 21, 82, 0.7)"
            active.style.background = "rgba(240, 230, 230, 0.6)"
            let num = this.getAttribute('data-tabtitle')
            active.classList.remove('active')
            document.querySelector('#tab'+num).classList.add('active')

        })
    }
})()