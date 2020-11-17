<?php namespace DAO;
use Models\Purchase as M_Purchase;
use Models\Ticket as Ticket;
use DAO\Tickets as DAO_Ticket;
use DAO\Showtimes as DAO_Showtime;
use DAO\Users as DAO_User;
use DAO\Payments as D_Payment;
use DAO\Connection as Connection;
use \PDOException as PDOException;

class Purchases {

    public function create(M_Purchase $purchase) {
        $value = 0;

        try
        {
            //1. Insert - Purchase
            $query = "INSERT INTO purchases (purchased_tickets, date_purchase, discount, id_user)
            VALUES (:totalTickets, :date, :discount, :idUser)";
            $parameters["totalTickets"] = $purchase->getTotalTickets();
            $parameters["date"] = $purchase->getDate();
            $parameters["discount"] = $purchase->getDiscount();
            $parameters["idUser"] = $purchase->getUser()->getId();
            $this->connection = Connection::getInstance();
            $value = $this->connection->executeNonQuery($query, $parameters);
            //
            
            //2. Insert - Payment
            $daoPayment = new D_Payment();
            $query = "SELECT MAX(id_purchase) as max_id FROM purchases ORDER BY id_purchase";
            $resultSet = $this->connection->execute($query);
            $idPurchase = $resultSet[0]["max_id"];
            $purchase->setId($idPurchase);
            $purchase->getPayment()->setIdPurchase($idPurchase);
            $daoPayment->create($purchase->getPayment());
            //

            //3. Insert - Ticket/s
            $daoTicket = new DAO_Ticket();
            foreach($purchase->getTickets() as $ticket) {
                $ticket->setIdPurchase($idPurchase);
                $daoTicket->create($ticket);
            }
            //

            //4. Update id_payment in purchases
            $queryId = "SELECT pay.id_payment as id_payment FROM payments as pay where pay.id_purchase=" . $purchase->getId();
            $resultSet = $this->connection->execute($queryId);
            $idPayment = $resultSet[0]["id_payment"];
            $parametersUpdate["id"] = $purchase->getId();
            $parametersUpdate["idPayment"] = $idPayment;
            $query = "UPDATE purchases SET id_payment=:idPayment where id_purchase=:id";
            $value = $this->connection->executeNonQuery($query, $parametersUpdate);
            $value = $idPurchase;
            //
        }
        catch (PDOException $e)
        {
            throw $e;
        }
        return $value;
    }

      

    public function retrieveNumberOfRowsByDate($date, $user) {
        $value = 0;

        try
        {
            $parameters['date'] = $date;

            $query = "SELECT COUNT(*) FROM purchases p
            WHERE p.id_purchase in 
            (select t.id_purchase from tickets t
            INNER JOIN showtimes s on s.id = t.id_showtime
            WHERE s.date>=:date)
            AND p.id_user=" . $user->getId() . ";";

            $this->connection = Connection::getInstance();

            $resultSet = $this->connection->execute($query, $parameters);

            $value = $resultSet[0]["COUNT(*)"];
        }
        catch (PDOException $e)
        {
            throw $e;
        }
        return $value;
    }

    public function retrieveOne($id) {
        $purchase = array();

        try
        {
            $query = "SELECT * FROM purchases
            WHERE id_purchase=" . $id;
            
            $this->connection = Connection::getInstance();

            $resultSet = $this->connection->execute($query);

            if(!empty($resultSet)) {

                $purchase = new M_Purchase();
                $purchase->setId($resultSet[0]["id_purchase"]);
                $purchase->setTotalTickets($resultSet[0]["purchased_tickets"]);
                $purchase->setDate($resultSet[0]["date_purchase"]);
                $purchase->setDiscount($resultSet[0]["discount"]);
                $idUser = $resultSet[0]["id_user"];
                $idPayment = $resultSet[0]["id_payment"];
                //User
                $userDAO = new DAO_User();
                $user = $userDAO->retrieveOne($idUser);
                $purchase->setUser($user);
                //Payment
                $paymentDAO = new D_Payment();
                $payment = $paymentDAO->retrieveOne($idPayment);
                $purchase->setPayment($payment);
            }
        }
        catch (PDOException $e)
        {
            throw $e;
        }

        return $purchase;
    }

    


    public function retrievePurchases(){
        $purchaseList=array();
        $query = "SELECT sub4.*,m.`name_movie` FROM movies m INNER JOIN (
            SELECT sub3.*,sh.id_movie AS 'idMovie' FROM showtimes sh INNER JOIN (
            SELECT sub2.*,t.id_showtime,COUNT(t.id_purchase) FROM tickets t  INNER JOIN (
            SELECT sub1.*,u.`email` FROM users u INNER JOIN (SELECT pu.*,py.`total` FROM purchases pu INNER JOIN payments py ON py.`id_purchase`=pu.`id_purchase`) sub1 
            ON sub1.id_user = u.`idUsers`
            )sub2 ON sub2.id_purchase = t.id_purchase   GROUP BY t.id_purchase
            ) sub3 ON sub3.id_showtime = sh.id
            )sub4 ON m.`id_movie`=sub4.idMovie";
        try
        {
            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($query);
            if(!empty($resultSet)) {
                foreach ($resultSet as $row) {
                    $array=array();
                    $array['id_purchase']=$row['id_purchase'];
                    $array['purchased_tickets']=$row['purchased_tickets'];
                    $array['date_purchase']=$row['date_purchase'];
                    $array['email']=$row['email'];
                    $array['total']=$row['total'];
                    $array['name_movie']=$row['name_movie'];
                    $array['id_showtime']=$row['id_showtime'];
                    $array['idMovie']=$row['idMovie'];

                    array_push($purchaseList,$array);
                }
        }
    }
        catch(PDOException $e)
        {
            throw $e;
        }

        return $purchaseList;
    }


    public function retrieveProfits($inicio,$final,$idMovie){
        
        if(($inicio!=0)&&($final!=0))
        {
           $purchaseList=array();
            $query = "SELECT sh.*,m.`poster`,SUM(tickets_sold*ticket_price) AS ganancias FROM showtimes sh 
            INNER JOIN movies m ON m.`id_movie`=sh.id_movie 
            GROUP BY id_movie,date_showtime HAVING date_showtime<$final AND date_showtime>=$inicio AND id_movie=$idMovie";
           
        }else{
            $purchaseList=array();
            $query = "SELECT sh.*,m.`poster`,SUM(tickets_sold*ticket_price) AS 'ganancias' FROM showtimes sh 
            INNER JOIN movies m ON m.`id_movie`=sh.id_movie GROUP BY id_movie,date_showtime 
            HAVING id_movie=$idMovie";
           
        }

       try
        {
            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($query);
            if(!empty($resultSet)) {
                foreach ($resultSet as $row) {
                    $array=array();
                    $array['poster']=$row['poster'];
                    $array['idMovie']=$row['id_movie'];
                    $array['ganancias']=$row['ganancias'];
                    array_push($purchaseList,$array);
                }
        }
    }
        catch(PDOException $e)
        {
            throw $e;
        }

        return $purchaseList;
    }

}
?>
