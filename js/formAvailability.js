flatpickr("#dateDeliver", {
    minDate: "today"
});
flatpickr("#dateDevolution", {
    minDate: "today"
});


function formAvailability() {
    const form = document.getElementById("formAvailability");
    const officeDeliverId = form.officeDeliver.value;
    const officeDevolutionId = form.officeDevolution.value;
    const dateDeliver = form.dateDeliver.value;
    const hourDeliver = form.hourDeliver.value;
    const hourDevolution = form.hourDevolution.value;
    const dateDevolution = form.dateDevolution.value;

    if (!dateDeliver || !dateDevolution) {
        Swal.fire({
            type: 'error',
            title: 'Error',
            text: 'Date input empty'
        });
        event.preventDefault();
        return false;
    }

    axios
        .post("/models/Availability.php", {
            officeDeliverId,
            officeDevolutionId,
            dateDeliver,
            hourDeliver,
            hourDevolution,
            dateDevolution
        })
        .then(response => {
            const data = response.data;
            if (data.faultstring) {
                Swal.fire({
                    type: 'error',
                    title: 'Error',
                    text: 'Something went wrong!'
                });
            } else {
                window.location.replace("/car.php");
            }
        });
    form.reset();
    event.preventDefault();
}