function login() {
    const loginForm = document.getElementById("loginForm");
    const contract = loginForm.contract.value;
    const password = loginForm.password.value;
    axios
        .post("/models/Login.php", {
            contract,
            password
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
                //console.log(data);
                window.location.replace("/detail.php");
            }
        });
    loginForm.reset();
    event.preventDefault();
}