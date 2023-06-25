listenClick('.patient-delete-btn', function () {
    let patientId = $(this).attr('data-id')
    deleteItem(route('patients.destroy', patientId),
        Lang.get('messages.appointment.patient'))
})

listenChange('.patient-email-verified', function (e) {
    let patientRecordId = $(e.currentTarget).data('id')
    let value = $(this).is(':checked') ? 1 : 0
    $.ajax({
        type: 'POST',
        url: route('emailVerified'),
        data: {
            id: patientRecordId,
            value: value,
        },
        success: function (result) {
            livewire.emit('refresh')
            displaySuccessMessage(result.message)
        },
    })
})

listenClick('.patient-email-verification', function (event) {
    let userId = $(event.currentTarget).data('id')
    $.ajax({
        type: 'POST',
        url: route('resend.email.verification', userId),
        success: function (result) {
            displaySuccessMessage(result.message)
            setTimeout(function () {
                Turbo.visit(window.location.href);
            }, 5000);
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
})


listenClick('.patient-statusbar', function (event) {
    let recordId = $(event.currentTarget).data('id');
    let status = $(event.currentTarget).data('status');
    let msg = status == 1 ? 'Inactive' : 'Active';
    let nextStatus = status == 1 ? 0 : 1;
    $.ajax({
        type: 'PUT',
        url: route('patient.status'),
        data: { id: recordId },
        success: function (result) {
            displaySuccessMessage(result.message);
            $(event.currentTarget).data('status', nextStatus);
            $('#patient-statusbar-text-'+recordId).text(msg);
        },
    })
})
