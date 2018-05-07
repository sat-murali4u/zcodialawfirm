function headerAppt_submit() {

    var error = false;
    var txtApptPhoneNumber = $("#txtApptPhoneNumber").val();
    var txtApptOpenDays = $("#txtApptOpenDays").val();
    var txtApptVacationDays = $("#txtApptVacationDays").val();
    var txtApptFAPhoneIcon = $("#txtApptFAPhoneIcon").val();
    var txtApptFAClockIcon = $("#txtApptFAClockIcon").val();
    var txtApptTimeBetween = $("#txtApptTimeBetween").val();

    if (!txtApptPhoneNumber) {
        info_msg('Phone Number is empty!!');
        error = true;
    } else if (!txtApptOpenDays) {
        info_msg('Appointment Open Days is empty!!');
        error = true;
    } else if (!txtApptVacationDays) {
        info_msg('Vacation Days is empty!!');
        error = true;
    } else if (!txtApptTimeBetween) {
        info_msg('Appointment Time is empty!!');
        error = true;
    }

    if (error == false) {
        var form_data = new FormData();
        form_data.append('appt_phone', txtApptPhoneNumber);
        form_data.append('appt_open_days', txtApptOpenDays);
        form_data.append('appt_vacation_days', txtApptVacationDays);
        form_data.append('appt_time_between', txtApptTimeBetween);
        form_data.append('appt_fa_phone_icon', txtApptFAPhoneIcon);
        form_data.append('appt_fa_clock_icon', txtApptFAClockIcon);

        form_data.append('appt_phone_image', $('#imgHeaderApptPhoneUpload').prop('files')[0]);
        form_data.append('appt_clock_image', $('#imgHeaderApptClockUpload').prop('files')[0]);

        $.ajax({
            method: "POST",
            url: "admin.php/header/update_appointment",
            data: form_data, contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data == 1) {
                    success_msg('Appointment Particulars Updated Successfully!!!');
                } else {
                    error_msg('Appointment Particulars not Updated!!!');
                }
            }
        });
    }
}