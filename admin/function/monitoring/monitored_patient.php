<?php

include 'db.php';

// Join table "iv_data"
$sql = "SELECT do.id, 
               do.patient_name, 
               do.device_id, 
               do.room_number, 
               do.iv_fluid_name, 
               do.volume, 
               do.flow_rate, 
               do.answer, 
               do.drop_factor,
               do.minutes,
               do.drip_rate_answer,
               do.incorp, 
               do.ivf_no, 
               do.date_started, 
               do.time_started, 
               do.date_consumed, 
               do.time_consumed, 
               do.nurse, 

               iv.device_id, iv.liter, iv.percent  
        FROM doc_orders do 
        LEFT JOIN iv_data iv ON do.device_id = iv.device_id 
        ORDER BY do.id DESC";

// SQL query to select patient data
//$sql = "SELECT id, patient_name, iv_fluid_name, volume, flow_rate, incorp, ivf_no, date_started, time_started, date_consumed, time_consumed, nurse FROM doc_orders ORDER BY id DESC";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['patient_name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['room_number']) . "</td>";
        echo "<td>" . (empty($row['device_id']) ? "<p style='color: red;'>N/A</p>" : htmlspecialchars($row['device_id'])) . "</td>"; 
        echo "<td>" . htmlspecialchars($row['flow_rate']) . "</td>"; // real-time flowrate data
        echo "<td>" . htmlspecialchars($row['liter']) . "</td>";  // real-time volume(mL) data
        echo "<td>" . htmlspecialchars($row['percent']) . "</td>";  // real-time percent = volume
        echo "<td>
                <div class='dropdown'>
                    <button class='dropdown-button' onclick='toggleDropdown(event)'>Select &#11206;</button>
                    <div class='dropdown-menu'>
                        <a href='#' onclick=\"openEditModal(
                            '{$row['id']}',
                            '{$row['patient_name']}',
                            '{$row['room_number']}',
                            '{$row['iv_fluid_name']}',
                            '{$row['volume']}',
                            '{$row['flow_rate']}',

                            '{$row['drop_factor']}',
                            '{$row['minutes']}',
                            '{$row['drip_rate_answer']}',


                            '{$row['incorp']}',
                            '{$row['ivf_no']}',
                            '{$row['date_started']}',
                            '{$row['time_started']}',
                            '{$row['date_consumed']}',
                            '{$row['time_consumed']}',
                            '{$row['nurse']}',
                            '{$row['device_id']}'
                            
                        )\">View</a>
                        <a href='function/discharge/discharge.php?id={$row['id']}' onclick='return confirm(\"Are you sure to DISCHARGE this patient?\");'>Discharge</a>
                    </div>
                </div>
                
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6' style='color: red;'>No patients found</td></tr>";
}

$conn->close(); 
?>
