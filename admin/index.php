<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 Forbidden</title>

    <!-- Montserrat -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"   rel="stylesheet">
</head>

<style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        background-color: #ededed;
    }

    .topbar {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        background-color: #545454;
        color: #dedede;
        font-size: 27px;
        font-weight: 400;
        padding: 5px 0 5px 20px;
    }

    .white {
        background-color: white;
        width: fit-content;
        margin: 10px 20px 0 20px;
        padding: 10px;
    }

    .forbidden {
        font-family: 'Montserrat', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        display: flex;
        flex-direction: column;
        border: 2px solid #adadad;
        /* margin: 30px 0 0 20px; */
        padding: 5px;
        width: fit-content;
    }

    .accessDenied {
        color: #a61b1b;
        font-weight: 600;
        font-size: 24px;
    }

    .message {
        color: #212121;
        font-weight: 600;
        font-size: 16px;
    }


</style>

<body>
    <div class="topbar">
       Server Error
    </div>

    <div class="white">
        <div class="forbidden">
            <div class="accessDenied">
                403 - Forbidden: Access is denied.
            </div>

            <div class="message">
                You do not have permission to view this directory or page.
            </div>
        </div>
    </div>
</body>
</html>