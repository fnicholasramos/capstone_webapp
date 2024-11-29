<?php require 'function/privilege/users_privilege.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Privilege</title>
    <link rel="stylesheet" href="../assets/edit-privilege.css">

     <!-- Montserrat font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>User Privilege</h2>

        <form action="function/privilege/update_privilege.php" method="POST">
            <table>
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Privilege</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (!empty($users)): ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td>
                                    <p class="user">
                                        <?= htmlspecialchars($user['username']); ?>
                                    </p>
                                    
                                </td>

                                <td>
                                    <select name="privilege[<?= $user['id']; ?>]">
                                        <option value="admin" <?= $user['privilege'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
                                        <option value="user" <?= $user['privilege'] === 'user' ? 'selected' : ''; ?>>User</option>
                                    </select>
                                </td>

                                <td>
                                    <!-- Update button is now inside the form, and will trigger form submission -->
                                    <button class="btn update-btn" type="submit" name="update" value="<?= $user['id']; ?>">&#9998; Update</button>
                                    <button class="btn delete-btn" type="button" onclick="deleteUser(<?= $user['id']; ?>)">
                                        <strong>&#128465;</strong> Delete
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="3">No users found</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </form>
    </div>
    
    <!-- Update -->

    <!-- Delete -->
    <script>
        function deleteUser(userId) {
            if (confirm('Are you sure you want to DELETE this user?')) {
                window.location.href = 'function/privilege/delete_user.php?id=' + userId; // Redirect to a delete script
            }
        }
    </script>
</body>
</html>