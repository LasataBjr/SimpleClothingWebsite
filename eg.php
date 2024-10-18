<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout with Sidebar, Navbar, and Form</title>
    <link rel="stylesheet" href="assets/CSS/styles.css">
</head>
<body>
    <div class="container">
        <nav class="navbar">
            <h1>Navbar</h1>
        </nav>
        <aside class="sidebar">
            <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 4</a></li>
            </ul>
        </aside>
        <main class="main-content">
            <form class="form">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name"><br><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email"><br><br>
                <label for="message">Message:</label>
                <textarea id="message" name="message"></textarea><br><br>
                <button type="submit">Submit</button>
            </form>
        </main>
    </div>
</body>
</html>
