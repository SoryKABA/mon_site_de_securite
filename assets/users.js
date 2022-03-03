let forms = document.querySelectorAll('.input')
let button = document.querySelector('.btn')
button.disabled = true
for (let i = 0; i < forms.length; i++) {
    const input = forms[i];
    input.addEventListener('change', function () {
        console.log(document.querySelector('textarea.input').value)
        if (document.querySelector('input.input').value === "" || document.querySelector('textarea.input').value === "") {
            button.disabled = true
        }else {
            button.disabled = false
        }
    })
    
    
}