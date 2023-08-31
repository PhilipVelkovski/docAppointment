let form = document.querySelector("#bookAppointmentForm");
let formUpdate = document.querySelector("#bookedForm");

if (form) {
  form.addEventListener("submit", (e) => {
    e.preventDefault();
    const formData = new FormData(form);

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "/addAppointment.php", true);

    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          console.log("Success:", xhr.responseText);
          form.reset();
          document.getElementById("successMessage").innerHTML =
            "<h1>Appointment Booked</h1>";
        } else {
          console.log("Error:", xhr.status, xhr.statusText);
        }
      }
    };

    xhr.send(formData);
  });
}

if (formUpdate) {
  formUpdate.addEventListener("submit", (e) => {
    e.preventDefault();
    const formData = new FormData(formUpdate);

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "/updateAppointment.php", true);

    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          console.log("Success:", xhr.responseText);
          document.getElementById("successMessage").innerHTML =
            "<h1>Appointment Updated</h1>";
        } else {
          console.log("Error:", xhr.status, xhr.statusText);
        }
      }
    };

    xhr.send(formData);
  });
}
