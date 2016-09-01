<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Newsletter Subscription</title>
</head>
<body>
    <h1>Subscribe to our newsletter</h1>
    <form action="/newsletter-subscriptions/newsletter/subscription" method="post">
        Name: <input type="text" name="name" value="<?php echo $name ?>">
        <span>* <?php echo $nameErr;?></span>
        E-mail: <input type="email" name="email" value="<?php echo $email ?>">
        <span>* <?php echo $emailErr;?></span>
        <input type="submit" value="Subscribe">
    </form>
</body>
</html>
