document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.getElementById("login-form");
    const errorMessage = document.getElementById("error-message");

    if (!loginForm) {
        console.error("Login form not found in the DOM.");
        return;
    }

    loginForm.addEventListener("submit", async function (event) {
        event.preventDefault();

        const userId = document.getElementById("user_id").value;
        const password = document.getElementById("password").value;

        try {
            const response = await fetch("../api/login.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ user_id: userId, password: password }),
            });

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const result = await response.json();

            if (result.success) {
                console.log(`Setting cookie: token=${result.token}; path=/`);
                document.cookie = `token=${result.token}; path=/;`;
                console.log("Redirecting to /medical_app/public/index.php");
                window.location.href = "/medical_app/public/index.php";
            } else {
                errorMessage.style.display = "block";
                errorMessage.textContent = result.message;
            }
        } catch (error) {
            console.error("Fetch Error:", error);
            errorMessage.style.display = "block";
            errorMessage.textContent = "An error occurred while processing your request.";
        }
    });
});