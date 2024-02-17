const setEndDateForCheckIn = (checkOut) => {
    if (checkOut !== '') {
        let checkOutDate = new Date(checkOut);
        $('#check_in').datepicker('setEndDate', checkOutDate.addDays(-1));
    } else {
        $('#check_in').datepicker('setEndDate', new Date('9999-12-31'));
    }
}

const setStartDateForCheckOut = (checkIn) => {
    if (checkIn !== '') {
        let checkInDate = new Date(checkIn);
        $('#check_out').datepicker('setStartDate', checkInDate.addDays(1));
    } else {
        $('#check_out').datepicker('setStartDate', (new Date()).addDays(1));
    }
}
