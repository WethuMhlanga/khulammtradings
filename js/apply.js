document.getElementById("loanForm").addEventListener("submit", function(e) {
  e.preventDefault();

  const form = e.target;
  const data = new FormData(form);

  fetch(form.action, {
    method: "POST",
    body: data,
  })
    .then(response => response.text())
    .then(result => {
      document.getElementById("formResponse").textContent = result;
      form.reset();
    })
    .catch(error => {
      document.getElementById("formResponse").textContent = "Something went wrong. Try again.";
    });
});
