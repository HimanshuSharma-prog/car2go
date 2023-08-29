<script>
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

    // const phone_input = document.getElementById('phone_input')

    // phone_input.onchange = () => {
    //     const _value = phone_input.value.slice(0,10)
    //     phone_input.setAttribute('value',_value)
    // }

    const start_date = document.getElementById("start_date")
    const end_date = document.getElementById("end_date")
    const end_div = document.getElementById("end_div")
    const date = new Date();
    const year = date.getFullYear()
    const month = date.getMonth()
    const day = date.getDate()
    const loginBtn = document.getElementById('loginBtn')
    const userBtn = document.getElementById('userBtn')
    const empBtn = document.getElementById('empBtn')


    const car_cat = document.getElementById('carCategory')
    const suv = document.getElementById('suv')
    const hatchback = document.getElementById('hatchback')
    const sedan = document.getElementById('sedan')

    const rentForm = document.getElementById('rentForm')
    const rentBtn = document.getElementById('rentBtn')

    const tripDiv=document.getElementById('tripDiv')
    const tripText=document.getElementById('tripDaysText')
    const tripInput=document.getElementById('tripInput')
    
    const userIdInput=document.getElementById('userIdInput')

    window.addEventListener('load', () => {

        const user = localStorage.getItem('user')
        if (user) {
            const _user = JSON.parse(user)
            if (_user.type == 'user') {
                loginBtn.style.display = 'none'
                userBtn.style.display = 'flex'
                userBtn.setAttribute('href', `./userdashboard.php?u_id=${_user.u_id}`)
                empBtn.style.display = 'none'
                rentForm.style.display = 'block'
                rentBtn.style.display = 'none'
                userIdInput.setAttribute('value',_user.u_id)
            } else {
                loginBtn.style.display = 'none'
                empBtn.style.display = 'flex'
                userBtn.style.display = 'none'
                empBtn.setAttribute('href', `./agen_dashboard.php?emp_id=${_user.u_id}`)
                rentForm.style.display = 'none'
                rentBtn.style.display = 'flex'
            }

        } else {
            loginBtn.style.display = 'flex'
            userBtn.style.display = 'none'
            empBtn.style.display = 'none'
        }

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
    end_date.onchange = () => {
        const date1 = new Date(start_date.value);
        const date2 = new Date(end_date.value);
        const diffTime = Math.abs(date2 - date1);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        console.log(diffTime + " milliseconds");
        console.log(diffDays + " days");

        tripDiv.style.display='flex'
        tripText.innerHTML=`${diffDays} days of trip`
        tripInput.setAttribute('value',parseInt(diffDays))
    }

    function logout() {
        localStorage.clear()
        window.location.replace('index.php')
    }

    function carCat(data) {
        if (data == 'suv') {
            car_cat.setAttribute('value', data)
            suv.classList.add('activeBtn');
            hatchback.classList.remove('activeBtn')
            sedan.classList.remove('activeBtn')
        } else if (data == 'hatchback') {
            car_cat.setAttribute('value', data)
            suv.classList.remove('activeBtn');
            hatchback.classList.add('activeBtn')
            sedan.classList.remove('activeBtn')
        } else if (data == 'sedan') {
            car_cat.setAttribute('value', data)
            suv.classList.remove('activeBtn');
            hatchback.classList.remove('activeBtn')
            sedan.classList.add('activeBtn')
        }
    }
</script>
</body>

</html>