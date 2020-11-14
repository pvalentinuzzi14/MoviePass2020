<?php namespace DAO;
use Models\Ticket as Ticket;
use DAO\Connection as Connection;
use \PDOException as PDOException;

class Tickets {

    private $connection;

    public function create(Ticket $ticket) {
        $value = 0;

        try
        {
            $query = "INSERT INTO tickets (number, id_purchase, id_showtime) VALUES (:number, :idPurchase, :idShowtime)";
            $parameters["number"] = $ticket->getNumber();
            $parameters["idPurchase"] = $ticket->getIdPurchase();
            $parameters["idShowtime"] = $ticket->getShowtime()->getId();

            $this->connection = Connection::getInstance();

            $value = $this->connection->executeNonQuery($query, $parameters);
        }
        catch (PDOException $e)
        {
            throw $e;
        }
        return $value;
    }
    private function read($row) {
        $ticket = new Ticket();
        $ticket->setId($row["id_ticket"]);
        $ticket->setIdPurchase($row["id_purchase"]);
        $ticket->setNumber($row["number"]);
        $ticket->setShowtime($row["id_showtime"]);
        return $ticket;
    }

    public function getAll()
    {
        $paymentList = array();

        try
        {
            $query = "SELECT * FROM tickets";

            $this->connection = Connection::getInstance();

            $resultSet = $this->connection->execute($query);

            if(!empty($resultSet)) {
                foreach ($resultSet as $row) {
                    $payment = $this->read($row);
    
                    array_push($paymentList, $payment);
                }
            }
        }
        catch (PDOException $e)
        {
            throw $e;
        }
        return $paymentList;
    }
}