<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                background-color: #f4f4f4;
                text-align: center;
                margin-top: 50px;
            }
            
            .form-container {
                width: 300px;
                margin: 0 auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            
            .form-container label {
                display: block;
                text-align: left;
                margin-bottom: 8px;
                color: #333;
            }
            
            .form-container input {
                width: 100%;
                padding: 8px;
                margin-bottom: 16px;
                box-sizing: border-box;
            }
            
            .form-container button {
                background-color: #4caf50;
                color: #fff;
                padding: 10px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                width: 100%;
            }
        </style>
  
    </head>
    <body >
        <div class="form-container">
            <h2>User Registration</h2>
            <form action="your_registration_script.php" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                
                <button type="submit">Register</button>
            </form>
        </div>
    </body>
</html>
