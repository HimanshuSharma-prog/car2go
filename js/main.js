const menuBtn = document.getElementById('menuBtn')
const mobNav = document.getElementById('mobNav')

let check = true

menuBtn.onclick = () => {
    if (check) {
        mobNav.style.display = 'flex'
        check = false
    } else {
        mobNav.style.display = 'none'
        check = true
    }
}

function hideNav() {
    mobNav.style.display = 'none'
    check = true
}

const phone_input=document.getElementById('phone_input')

phone_input.onchange=()=>{
    const _value=phone_input.value.slice(0,10)
    phone_input.value(_value)
}



const start_date = document.getElementById("start_date")
const end_date = document.getElementById("end_date")
const end_div = document.getElementById("end_div")
const date = new Date();
const year = date.getFullYear()
const month = date.getMonth()
const day = date.getDate()

window.addEventListener('load', () => {
    if (month < 10) {
        if (day < 10) {
            const cur_date = `${year}-0${month + 1}-0${day}`
            start_date.setAttribute('min', cur_date)
        } else {
            const cur_date = `${year}-0${month + 1}-${day}`
            start_date.setAttribute('min', cur_date)
        }

    } else {
        if (day < 10) {
            const cur_date = `${year}-${month + 1}-0${day}`
            start_date.setAttribute('min', cur_date)
        } else {
            const cur_date = `${year}-${month + 1}-${day}`
            start_date.setAttribute('min', cur_date)
        }
    }
})
start_date.onchange = () => {
    end_div.style.display = 'block'
    end_date.setAttribute('min', start_date.value)
}