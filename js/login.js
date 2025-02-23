document.querySelector("form").addEventListener("submit", async (event) => {
    event.preventDefault();

    const formData = new FormData(event.target);

    const response = await fetch("PHP/login.php", {
        method: "POST",
        body: formData,
    });

    const text = await response.text();

    if (text.startsWith("success:")) {
        const name = text.split(":")[1];
        window.location.href = "home.html";
        alert(`Welcome, ${name}`);
    } else {
        alert("Incorrect email or password");
    }
});
