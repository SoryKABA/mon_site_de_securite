(function () {
    let icon = document.querySelector('.icon i.fas')
    icon.addEventListener('click', function(){
        document.querySelector('ul.list').classList.toggle('active')
        //console.log(document.querySelector('ul.list.active'))

    })
    let list = document.querySelectorAll('.child .list > .list-item')
    for (let i = 0; i < list.length; i++) {
        let li = list[i]
        li.addEventListener('click', function () {
            document.querySelector('.list-item.active').classList.remove('active')
            //this.classList.add('active')
            console.log(this)
        })
    }
    var scrollY = function () {
        var supportPageOffset = window.pageXOffset !== undefined;
        var isCSS1Compat = ((document.compatMode || "") === "CSS1Compat");
        return supportPageOffset ? window.pageYOffset : isCSS1Compat ? document.documentElement.scrollTop : document.body.scrollTop;
    }
    let element = document.querySelector('.child')
    let rect = element.getBoundingClientRect()
    let top = rect.top + scrollY()
    // let fake = document.createElement('div')
    // fake.style.width = rect.width
    // fake.style.height = rect.height
    let width = rect.width
    let onScroll = function () {
        let hasScroll = element.classList.contains('fixed')        
        if (scrollY() > top && !hasScroll) {
            element.classList.add('fixed')
            element.style.width = rect.width + "px"
            
            
        }else if(scrollY() < top && hasScroll){
            element.classList.remove('fixed')
            // element.parentNode.removeChild(fake)
            // console.log('remove')
        }
    }
    // let onResize = function () {
    //     element.style.width = "auto"
    //     element.classList.remove('fixed')
    //     fake.style.display = "none"
    //     rect = element.getBoundingClientRect()
    //     top = rect.top + scrollY()
    //     fake.style.width = rect.width
    //     fake.style.height = rect.height
    //     fake.style.display = "block"
    //     onScroll()
    // }
    
    window.addEventListener('scroll', onScroll)
    // window.addEventListener('resize', onResize)
    
    
})()