function fetchRealTimeData() {
    fetch('function/monitoring/fetch_data.php')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.getElementById('real-time');
            tableBody.innerHTML = ''; // Clear existing rows

            data.forEach(row => {
                const dischargeLink = (userPrivilege === 'admin') 
                    ? `<a href="function/discharge/discharge.php?id=${row.id}" onclick='return confirm("Are you sure to DISCHARGE this patient?");'>Discharge</a>`
                    : '';

                const rowHtml = `
                    <tr>
                        <td>${row.patient_name}</td>
                        <td>${row.room_number}</td>
                        <td style="color: ${row.device_id ? 'inherit' : '#0066cc'};">${row.device_id ? row.device_id : 'null'}</td>
                        <td>${row.answer}</td>
                        <td>${row.drip_rate_answer}</td>
                        <td style="color: ${row.liter ? 'inherit' : '#0066cc'};">${row.liter}</td>
                        <td style="color: ${row.percent ? 'inherit' : '#0066cc'};">${row.percent}</td>
                        <td>${row.nurse}</td>
                        <td>
                            <div class='dropdown'>
                                <button class='dropdown-button' onclick='toggleDropdown(event)'>Select &#11206;</button>
                                <div class='dropdown-menu'>
                                    <a href='#' onclick="openEditModal(
                                        '${row.id}',
                                        '${row.patient_name}',
                                        '${row.diagnose}',
                                        '${row.room_number}',
                                        '${row.iv_fluid_name}', 
                                        '${row.volume}', 
                                        '${row.flow_rate}',
                                        '${row.answer}',

                                        '${row.drop_factor}',
                                        '${row.minutes}',
                                        '${row.drip_rate_answer}',


                                        '${row.incorp}',
                                        '${row.ivf_no}',
                                        '${row.date_started}',
                                        '${row.time_started}',
                                        '${row.date_consumed}',
                                        '${row.time_consumed}',
                                        '${row.nurse}',
                                        '${row.device_id}'
                                    )">View</a>
                                    ${dischargeLink}
                                </div>
                            </div>
                        </td>
                    </tr>
                `;
                tableBody.innerHTML += rowHtml;
            });

            // Reapply search function after updating the table
            searchTable(); // Call search function here
        })
        .catch(error => console.error('Error fetching data:', error));
}

setInterval(fetchRealTimeData, 2000); // Fetch every 1 second for real-time updates
// Initial load
fetchRealTimeData();
