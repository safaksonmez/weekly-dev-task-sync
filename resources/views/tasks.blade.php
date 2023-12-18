<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider Selection</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @extends('welcome')
    @section('content')
    <div class="container mt-5">
        <div class="form-group">
            <label for="providerSelect">Select a Provider:</label>
            <select class="form-control" id="providerSelect">
                <option value="">Select a provider</option>
                <option value="select_all">Select All</option>
            </select>
        </div>
        <button id="generateButton" class="btn btn-primary" style="display: none;">Generate</button>

        <!-- Results container will be hidden initially and shown after Generate button is clicked -->
        <div class="container mt-5" id="resultsContainer" style="display: none;">
            <h2>Total Weeks To Complete Providers Tasks => <span id="totalWeeks"></span></h2>

            <table class="table table-bordered mt-3 assignment-table">
                <thead class="thead-light">
                    <tr>
                        <th>Week</th>
                        <th>Developer</th>
                        <th>Tasks</th>
                    </tr>
                </thead>
                <tbody id="assignmentTableBody">
                    <!-- Data will be populated here -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectBox = document.getElementById('providerSelect');
            const generateButton = document.getElementById('generateButton');

            fetch('/api/providers')
                .then(response => response.json())
                .then(data => {
                    data?.data?.forEach(provider => {
                        const option = new Option(provider.name, provider.id);
                        selectBox.add(option);
                    });
                });

            generateButton.addEventListener('click', function() {
                const value = selectBox.value;
                const selectedProviderId = value === 'select_all' ? '' : value;
                const url = selectedProviderId ? `/api/task-assignments?provider_id=${selectedProviderId}` : '/api/task-assignments';
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('resultsContainer').style.display = 'block';
                        const totalWeeksSpan = document.getElementById('totalWeeks');
                        totalWeeksSpan.textContent = data?.data?.total_weeks;

                        const assignmentTableBody = document.getElementById('assignmentTableBody');
                        assignmentTableBody.innerHTML = ''; // Clear previous table body
                        Object.keys(data?.data?.assignment).forEach(week => {
                            Object.keys(data?.data?.assignment[week]).forEach(developer => {
                                const row = document.createElement('tr');
                                row.innerHTML = `
                                    <td>${week}</td>
                                    <td>${developer}</td>
                                    <td>${data?.data?.assignment[week][developer].join(', ')}</td>
                                `;
                                assignmentTableBody.appendChild(row);
                            });
                        });
                    });
            });

            selectBox.addEventListener('change', function() {
                generateButton.style.display = this.value ? 'block' : 'none';
                document.getElementById('resultsContainer').style.display = 'none'; // Hide results when provider is changed
            });
        });
    </script>
    @endsection
</body>
</html>
