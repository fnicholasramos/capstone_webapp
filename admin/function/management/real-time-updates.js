function fetchRealTimeData() {
    fetch('function/management/fetch_data.php')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.getElementById('real-time');
            tableBody.innerHTML = ''; // Clear existing rows

            data.forEach(row => {
                const rowHtml = `
                    <tr>
                        <td>${row.patient_name}</td>
                        <td>${row.room_number}</td>
                        <td>${row.date_of_birth}</td>
                        <td>${row.admit_date}</td>
                        <td>${row.admit_time}</td>
                        <td>${row.device_id ? row.device_id : 'N/A'}</td>
                        <td>${row.liter}</td>
                        <td>${row.percent}</td>
                        <td>
                            <div class='dropdown'>
                                <button class='dropdown-button' onclick='toggleDropdown(event)'>Select &#11206;</button>
                                <div class='dropdown-menu'>
                                    <a href='#' onclick="openEditModal(
                                        '${row.id}',
                                        '${row.patient_name}', 
                                        '${row.room_number}', 
                                        '${row.date_of_birth}', 
                                        '${row.admit_date}', 
                                        '${row.admit_time}',
                                        '${row.device_id}',
                                        '${row.liter}',
                                        '${row.percent}'
                                    )">Edit</a>
                                    <a href='function/management/delete.php?id=${row.id}' onclick='return confirm("Are you sure you want to delete this record PERMANENTLY?");'>Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                `;
                tableBody.innerHTML += rowHtml;
            });
        })
        .catch(error => console.error('Error fetching data:', error));
}


setInterval(fetchRealTimeData, 100);
// Initial load
fetchRealTimeData();
