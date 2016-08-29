<?php

require("Crud.php");

class NewsletterSubscription implements Crud
{
    private $id;
    private $email;
    private $name;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public static function getAll()
    {
        try {
            $connection = Database::instance();
            $sql = "SELECT * from newsletter_subscriptions";
            $query = $connection->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        }
        catch(\PDOException $e)
        {
            print "Error!: " . $e->getMessage();
        }
    }

    public static function findById($id)
    {
        try {
            $connection = Database::instance();
            $sql = "SELECT * from newsletter_subscriptions WHERE id = ?";
            $query = $connection->prepare($sql);
            $query->bindParam(1, $id, \PDO::PARAM_INT);
            $query->execute();
            return $query->fetch();
        }
        catch(\PDOException $e)
        {
            print "Error!: " . $e->getMessage();
        }
    }

    public static function findByEmail($email)
    {
        try {
            $connection = Database::instance();
            $sql = "SELECT * from newsletter_subscriptions WHERE email = ?";
            $query = $connection->prepare($sql);
            $query->bindParam(1, $email, \PDO::PARAM_INT);
            $query->execute();
            return $query->fetch();
        }
        catch(\PDOException $e)
        {
            print "Error!: " . $e->getMessage();
        }
    }

    public static function insert($newsletterSubscription)
    {
        try {
            $connection = Database::instance();
            $sql = "insert into newsletter_subscriptions (name, email) VALUES (:name, :email)";
            $query = $connection->prepare($sql);
            $query->bindValue(':name', $newsletterSubscription->getName());
            $query->bindValue(':email', $newsletterSubscription->getEmail());
            return $query->execute();
        }
        catch(\PDOException $e)
        {
            print "Error!: " . $e->getMessage();
        }
    }

    public static function update($user)
    {

    }

    public static function delete($id)
    {

    }
}
