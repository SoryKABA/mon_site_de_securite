function getMessages() {
    const requetAjax = new XMLHttpRequest()

    requetAjax.open('GET', 'validation.php')
    requetAjax.onload = function () {
        const resultat = JSON.parse(requetAjax.responseText)
        console.log(resultat)
    }
    requetAjax.send()
}