<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Project and Location</title>
</head>
<body>
<h1>Create Location Project</h1>
<form action="http://localhost:8080/locationProject" method="post" id="locationProjectForm">
    <label for="project">Select Project:</label>
    <select name="proyek_id" id="project" required>
        <!-- Options will be populated dynamically from the /project API -->
    </select><br>

    <label for="location">Select Location:</label>
    <select name="lokasi_id" id="location" required>
        <!-- Options will be populated dynamically from the /location API -->
    </select><br>

    <button type="button" id="cancelButton">Cancel</button>
    <button type="submit">Submit</button>
</form>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Fetch projects and populate the project dropdown
    fetch('http://localhost:8080/project')
        .then(response => response.json())
        .then(data => {
            const projectSelect = document.getElementById('project');
            data.forEach(project => {
                const option = document.createElement('option');
                option.value = project.id;
                option.textContent = project.namaProyek;  // Display project name
                projectSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error fetching projects:', error));

    // Fetch locations and populate the location dropdown
    fetch('http://localhost:8080/location')
        .then(response => response.json())
        .then(data => {
            const locationSelect = document.getElementById('location');
            data.forEach(location => {
                const option = document.createElement('option');
                option.value = location.id;
                option.textContent = location.namaLokasi;  // Display location name
                locationSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error fetching locations:', error));

    // Handle form submission to send data as JSON
    document.getElementById('locationProjectForm').addEventListener('submit', function (event) {
        event.preventDefault();

        const projectId = document.getElementById('project').value;
        const locationId = document.getElementById('location').value;

        const payload = {
            proyek: { id: parseInt(projectId) },
            lokasi: { id: parseInt(locationId) }
        };

        fetch('http://localhost:8080/locationProject', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(payload)
        })
        .then(response => response.json())
        .then(data => {
            console.log('Success:', data);
            alert('Data submitted successfully!');
            window.location.href = '<?php echo site_url("/"); ?>';  // Redirect to the root route
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error submitting data.');
        });
    });

    // Handle cancel button click
    document.getElementById('cancelButton').addEventListener('click', function () {
        window.location.href = '<?php echo site_url("/"); ?>';  // Redirect to the root route
    });
});
</script>

</body>
</html>