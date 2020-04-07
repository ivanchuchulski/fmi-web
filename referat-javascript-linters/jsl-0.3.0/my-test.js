function dayOfTheWeek(day) {
    switch (day) {
        case 'Friday':
            console.log('prepate for the weekend!');
            break;

        case 'Saturday':
        case 'Sunday':
            console.log('weekend, yeah!');

        default:
            console.log('weekday, work!');
            break;
    }
}

myDay = 'Sunday';

dayOfTheWeek(myDay)