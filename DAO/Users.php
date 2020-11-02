<?php
namespace DAO;
use Models\User as User;
use PDOException;
use DAO\UsersRole as UserRole;

class Users{
 private $connection;

 /* Crea un user a partir de un formulario */ 
 public function create (User $user)
 {
     $value = 0;
    try
    {
        $query = "INSERT INTO users (email, password, first_name, last_name, id_user_role, id_facebook) 
        VALUES (:email, :password, :firstName, :lastName, :idUserRole, :id_facebook)";

        $parameters["email"] = $user->getEmail();
        $parameters["password"] = $user->getPassword();
        $parameters["firstName"] = $user->getFirstName();
        $parameters["lastName"] = $user->getLastName();
        $parameters["idUserRole"] = $user->getUserRoleId();
        $parameters["id_facebook"] = $user->getIdFacebook();

        $this->connection = Connection::getInstance();

        $value = $this->connection->executeNonQuery($query, $parameters);

    }catch(PDOException $e)
    {
        throw $e;
    }
    return $value;

 }
 private function read($value) 
 {
    $user = new User();
    $user->setId($value["id"]);
    $user->setEmail($value["email"]);
    $user->setPassword($value["password"]);
    $user->setFirstName($value["first_name"]);
    $user->setLastName($value["last_name"]);
    $user->setPhoto($value["photo"]);
    $user->setIdFacebook($value["id_facebook"]);

    /*User Role*/
    $idUserRole = $value["id_user_role"];
    $userRoleDAO = new UserRole();
    $userRole = $userRoleDAO->retrieveOne($idUserRole);
    $user->setUserRole($userRole);
    return $user;
}

/* Devuelve todos los users*/
 public function retrieveAll()
  {
    $userList = array();

    try
    {
        $query = "SELECT * FROM users";

        $this->connection = Connection::getInstance();

        $resultSet = $this->connection->execute($query);  //traigo users

        if(!empty($resultSet)) {
            foreach ($resultSet as $value) {
                $user = $this->read($value);
                array_push($userList, $user);
            }
        }
    }
    catch (PDOException $e)
    {
        throw $e;
    }
    return $userList;
}

public function checkUserList()
{
    try
    {
        $query = "SELECT COUNT(*) as quantity FROM users";

        $this->connection = Connection::getInstance();

        $resultSet = $this->connection->execute($query);  //traigo users

    }
    catch (PDOException $e)
    {
        throw $e;
    }
    return $resultSet[0]['quantity'];
}

/* Devuelve un user a partir del id*/
public function retrieveOne($id)
 {
    $user = null;

    try
    {
        $parameters['id'] = $id;

        $query = "SELECT * FROM users WHERE idUsers=:id";

        $this->connection = Connection::getInstance();

        $resultSet = $this->connection->execute($query, $parameters);

        if(!empty($resultSet))
        {
            $user = $this->read($resultSet[0]);
        }
    }
    catch (PDOException $e)
    {
        throw $e;
    }
    return $user;
}
/* Actualizo el nombre principal */
public function updateFirstName($id, $firstName) 
{
    $parameters['id'] = $id;
    $parameters['firstName'] = $firstName;
    $query = "UPDATE users SET first_name=:firstName WHERE id=:id";

    $value = 0;

    try
    {
        $this->connection = Connection::getInstance();
        $value = $this->connection->executeNonQuery($query, $parameters);
    }
    catch(PDOException $e)
    {
        throw $e;
    }
    return $value;
}
/* Actualizo Last name */
public function updateLastName($id, $lastName) 
{
    $parameters['id'] = $id;
    $parameters['lastName'] = $lastName;
    $query = "UPDATE users SET last_name=:lastName WHERE id=:id";

    $value = 0;

    try
    {
        $this->connection = Connection::getInstance();
        $value = $this->connection->executeNonQuery($query, $parameters);
    }
    catch(PDOException $e)
    {
        throw $e;
    }
    return $value;
}

public function checkUserToLogin($email,$password)
{
    $parameters['email'] = $email;
    $parameters['password'] = $password;
    $query = "SELECT u.idUsers,u.email FROM users u WHERE u.email=:email AND u.password =:password";

    try
    {
        $this->connection = Connection::getInstance();
        $value = $this->connection->execute($query, $parameters);
    }
    catch(PDOException $e)
    {
        throw $e;
    }
    return $value;
}

 
}


?>