document.querySelector("form").addEventListener("submit", async (event) => {
    event.preventDefault();

    const formData = new FormData(event.target);
    const password = formData.get("password");
    const confirmPassword = formData.get("confirmPassword");

    if (password !== confirmPassword) {
        alert("Passwords do not match!");
        return;
    }

    const response = await fetch("PHP/register.php", {
        method: "POST",
        body: formData,
    });

    const result = await response.json();

    if (result.status === "success") {
        alert("Registration successful!");
        window.location.href = "index.html";
    } else {
        alert(result.message || "Error registering");
    }
});