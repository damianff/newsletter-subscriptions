<?php

require("models/NewsletterSubscription.php");

/**
 * User: ThinkPad
 */
class NewsletterController extends BaseController
{
    //default method
    protected function index()
    {
        View::set("name", "");
        View::set("email", "");
        View::set("nameErr", "");
        View::set("emailErr", "");
        View::render("newsletter/form_newsletter_subscription");
    }

    public function subscription()
    {
        $nameErr = $emailErr = "";
        $name = trim($_POST["name"]);
        $email = trim($_POST["email"]);

        if (empty($name)) {
            $nameErr = "Name is required!";
        }

        if (empty($email)) {
            $emailErr = "E-mail is required!";
        } else {
            $newsletter = NewsletterSubscription::findByEmail($email);
            if($newsletter) {
                $emailErr = "Already exists a subscription for this E-mail!";
            }
        }
        if (($nameErr != '') || ($emailErr != '')) {
            View::set("name", $name);
            View::set("email", $email);
            View::set("nameErr", $nameErr);
            View::set("emailErr", $emailErr);
            View::render("newsletter/form_newsletter_subscription");
        } else {
            $newsletterSubscription = new NewsletterSubscription();
            $newsletterSubscription->setName($name);
            $newsletterSubscription->setEmail($email);
            if (NewsletterSubscription::insert($newsletterSubscription)) {
                View::set("msg", 'Newsletter subscription created succesfully!');
            } else {
                View::set("msg", 'Failed to create Newsletter subscription!');
            }
            View::render("newsletter/result_subscription");
        }
    }
}