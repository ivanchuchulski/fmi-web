function dayOfTheWeek(day) {
    switch (day) {
        case 'Friday':
            console.log('prepare for the weekend!');
            break;

        case 'Saturday':
        case 'Sunday':
            console.log('weekend, yeah!');
            break;

        default:
            console.log('weekday, work!');
            break;
    }
}

var myDay = 'Sunday';
dayOfTheWeek(myDay);