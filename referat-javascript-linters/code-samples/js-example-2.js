
function dayOfTheWeek(day) {
    switch (day) {
        case 'Friday':
            console.log('prepate for the weekend!')
            break

        case 'Saturday':
        case 'Sunday':
            console.log('weekend')
            break

        default:
            console.log('weekday')
            break
    }
}

myDay = 'Monday'

dayOfTheWeek(myDay)