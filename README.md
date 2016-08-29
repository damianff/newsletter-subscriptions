# Newsletter subscription using MVC

PHP script that will display a form to update a MySQL/MariaDB table.

The table is called “newsletter_subscriptions” and contains email addresses. 

CREATE TABLE script (Create_table_newsletter_subscriptions.sql) in the root directory.

The form must ask for for the email address. When the form is submitted:

● if the email address already exists in the table, it will show an error message.

● if the email doesn’t exists, then it will insert a new row in the table, and display a

success message.
