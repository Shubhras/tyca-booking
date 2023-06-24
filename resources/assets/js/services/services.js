
listenClick('#serviceResetFilter', function () {
    $('#servicesStatus').val($('#allServices').val()).trigger('change')
})

listenChange('#servicesStatus', function () {
    window.livewire.emit('changeStatusFilter', $(this).val())
})

listenClick('.service-delete-btn', function (event) {
    let serviceRecordId = $(event.currentTarget).data('id')
    deleteItem(route('services.destroy', serviceRecordId), Lang.get('messages.common.service'))
})

listenClick('.service-statusbar', function (event) {
    let recordId = $(event.currentTarget).data('id')
    let status = $(event.currentTarget).data('status');
    let msg = status == 1 ? 'Inactive' : 'Active';
    let nextStatus = status == 1 ? 0 : 1;
    $.ajax({
        type: 'PUT',
        url: route('service.status'),
        data: { id: recordId },
        success: function (result) {
            displaySuccessMessage(result.message);
            $(event.currentTarget).data('status', nextStatus);
            $('#service-statusbar-text-'+recordId).text(msg);
        },
    })
})

