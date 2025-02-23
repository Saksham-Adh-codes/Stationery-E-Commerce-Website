function fetchAccountDetails() {
    fetch("fetch_account.php")
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                alert(data.error);
                window.location.href = "../index.html"; 
            } else {
                document.getElementById("userName").textContent = data.firstname;
                document.getElementById("userEmail").textContent = data.email;
                document.getElementById("useramt").textContent = "$"+data.purchased_amount;
            }
        })
        .catch(error => console.error("Error fetching account details:", error));
}

document.addEventListener("DOMContentLoaded", function () {
    let deleteAccountBtn = document.getElementById("deleteAccount");

    if (deleteAccountBtn) {
        deleteAccountBtn.addEventListener("click", function () {
            let confirmation = confirm("Are you sure you want to delete your account? This action cannot be undone.");
            if (confirmation) {
                fetch("delete_account.php", {
                    method: "POST",
                })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    if (data === "Account deleted successfully") {
                        window.location.href = "../index.html"; 
                    }
                })
                .catch(error => console.error("Error deleting account:", error));
            }
        });
    }

    let editEmailForm = document.getElementById("editEmailForm");
    
    if (editEmailForm) {
        editEmailForm.addEventListener("submit", function (event) {
            event.preventDefault(); 
            
            let formData = new FormData(editEmailForm);
            
            fetch("update_email.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert(data); 
                if (data.includes("successfully")) {
                    window.location.href = "account.html"; 
                }
            })
            .catch(error => console.error("Error:", error));
        });
    }  

    let editPasswordForm = document.getElementById("editPasswordForm");

    if (editPasswordForm) {
        editPasswordForm.addEventListener("submit", function (event) {
            event.preventDefault(); 
            
            let formData = new FormData(editPasswordForm);

            fetch("update_password.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert(data); 
                if (data.includes("successfully")) {
                    window.location.href = "account.html"; 
                }
            })
            .catch(error => console.error("Error:", error));
        });
    }
});
