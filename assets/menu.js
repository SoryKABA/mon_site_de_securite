(function () {
    let list = document.querySelectorAll('.button')
    for (let i = 0; i < list.length; i++) {
        let li = list[i]
        li.addEventListener('mouseover', function () {
            let num = this.getAttribute('data-tabtitle')
            console.log(this.getAttribute('data-tabtitle'))
            let active = document.querySelector('div.onglet.active')
            console.log(active)
            if(active.classList.contains('active')) {
                active.classList.remove('active')
                document.querySelector('#tab'+num).classList.add('active')
            }
            

        })
        li.addEventListener('mouseout', function () {
            if (li.classList.contains('active')) {
                li.classList.remove('active')
            }
        })
    }
})()