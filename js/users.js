// Add User Form
const addUserForm = document.getElementById('add_user_form');
if (addUserForm) {
    addUserForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(addUserForm);

        fetch('../api/users.php', {
            method: 'POST',
            body: formData, // Send form data directly
        })
        .then((response) => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then((data) => {
            if (data.success) {
                alert('User added successfully!');
                addUserForm.reset();
            } else {
                alert(`Error: ${data.error}`);
            }
        })
        .catch((error) => console.error('Error during Add User:', error));
    });
}

// Update User Form

const updateUserForm = document.getElementById('update_user_form');
if (updateUserForm) {
    updateUserForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(updateUserForm);
        const data = Object.fromEntries(formData);
        console.log('Data being sent for password update:', data); // Debugging log

        fetch('../api/users.php', {
            method: 'PUT',
            body: JSON.stringify(Object.fromEntries(formData)),
            headers: {
                'Content-Type': 'application/json',
            },
        })
        .then((response) => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then((data) => {
            console.log('Response from server:', data); // Debugging log
            if (data.success) {
                alert('Password updated successfully!');
                updateUserForm.reset();
            } else {
                alert(`Error: ${data.error}`);
            }
        })
        .catch((error) => console.error('Error during Password Update:', error));
    });
}


// Delete User Form
const deleteUserForm = document.getElementById('delete_user_form');
if (deleteUserForm) {
    deleteUserForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const userId = document.querySelector('[name="user_id"]').value;

        fetch('../api/users.php', {
            method: 'DELETE',
            body: JSON.stringify({ user_id: userId }), // Send JSON data
            headers: {
                'Content-Type': 'application/json', // Ensure the correct header is set
            },
        })
        .then((response) => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then((data) => {
            if (data.success) {
                alert('User deleted successfully!');
                deleteUserForm.reset();
            } else {
                alert(`Error: ${data.error}`);
            }
        })
        .catch((error) => console.error('Error during Delete User:', error));
    });
}

// View User Form
const viewUserForm = document.getElementById('view_user_form');
if (viewUserForm) {
    viewUserForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const userId = document.querySelector('[name="user_id"]').value;

        fetch(`../api/users.php?user_id=${userId}`)
        .then((response) => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then((data) => {
            if (data) {
                const userInfo = `
                    <h5>User Information</h5>
                    <p><strong>Username:</strong> ${data.username}</p>
                    <p><strong>Email:</strong> ${data.email}</p>
                `;
                document.getElementById('user_info').innerHTML = userInfo;
            } else {
                alert('User not found');
            }
        })
        .catch((error) => console.error('Error during View User:', error));
    });
}
