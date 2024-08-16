<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Hotspot User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        .message {
            margin-top: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create Hotspot User</h2>
        <form method="POST" action="create_user.php">
            <label for="profile">Profile:</label>
            <select id="profile" name="profile" required>
                <option value="default">Default</option>
                <option value="other_profile">Other Profile</option>
            </select>

            <label for="limit_uptime">Limit Uptime (e.g., 1h, 1d):</label>
            <input type="text" id="limit_uptime" name="limit_uptime">

            <input type="submit" value="Create User">
        </form>
        <div class="message">
            <?php
            if (isset($_GET['message'])) {
                echo nl2br(htmlspecialchars($_GET['message']));
            }
            ?>
        </div>
    </div>
</body>
</html>
