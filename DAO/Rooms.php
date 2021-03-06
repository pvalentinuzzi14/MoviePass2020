<?php 
namespace DAO;
use Models\Room as Room;
use DAO\Connection;
use PDOException;

class Rooms{
	
	private $connection;
	
	public function add(Room $item)
	{
			try {
				$query = "INSERT INTO rooms (state,id_cinema,room_name,capacity,ticket_price) VALUES (:state,:id_cinema,:room_name,:capacity,:ticket_price)";
				$parameters["state"] = $item->getState();
				$parameters["id_cinema"] = $item->getCinema();
				$parameters["room_name"] = $item->getName();
				$parameters["capacity"] = $item->getcapacity();
				$parameters["ticket_price"] = $item->getTicketPrice();				
				$this->connection = Connection::getInstance();
				$value = $this->connection->executeNonQuery($query,$parameters);

			} catch (PDOException $e) {
				throw $e;
			}
			return $value;
	}

	private function create($statementRes)
	{
		$room = new Room();
		$room->setID($statementRes['idRooms']);
		$room->setState($statementRes['state']);
		$room->setName($statementRes['room_name']);
		$room->setCapacity($statementRes['capacity']);
		$room->setTicketPrice($statementRes['ticket_price']);
		$room->setCinema($statementRes['cinema_name']);

		return $room;
	}

	public function getAll()
	{
		$roomsList = array();

		try {
			$sql = "SELECT r.idRooms,r.room_name,r.state,r.capacity,r.ticket_price,c.cinema_name 
			FROM rooms r INNER JOIN cinemas c ON c.idCinemas=r.id_cinema";
			$this->connection = Connection::getInstance();
			
			$statement = $this->connection->execute($sql);

			if(!empty($statement))
			{
				foreach ($statement as $value) {
					$cineAux = $this->create($value);
					array_push($roomsList,$cineAux);
				}
			}
		} catch (PDOException $e) {
			throw $e;
		}

		return $roomsList;
	}

	public function getAllAvaible()
	{
		$cinemasList = array();

		try {
			$sql = "SELECT r.idRooms,r.room_name,r.state,r.capacity,r.ticket_price,c.cinema_name 
			FROM rooms r INNER JOIN cinemas c ON c.idCinemas=r.id_cinema
			WHERE r.state=1" ;
			
			$this->connection = Connection::getInstance();
			
			$statement = $this->connection->execute($sql);

			if(!empty($statement))
			{
				foreach ($statement as $value) {
					$cineAux = $this->create($value);
					array_push($cinemasList,$cineAux);
				}
			}
		} catch (PDOException $e) {
			throw $e;
		}

		return $cinemasList;
	}

	public function getOne($id)
	{
		$room = null;

		try {
			$parameters['id'] = $id; 

			$sql = "SELECT r.idRooms,r.room_name,r.state,r.capacity,r.ticket_price,c.cinema_name 
			FROM rooms r INNER JOIN cinemas c ON c.idCinemas=r.id_cinema
			WHERE idRooms=:id";
			
			$this->connection = Connection::getInstance();
			
			$statement = $this->connection->execute($sql,$parameters);

			if(!empty($statement))
			{
				$room = $this->create($statement[0]);
			}
		} catch (PDOException $e) {
			throw $e;
		}

		return $room;
	}

	public function remove($id)
	{
		$parameters['id'] = $id; 
        $parameters['delete_state'] = 0; 

        $sql = "UPDATE rooms SET state= :delete_state WHERE idRooms=:id";
		$statement = 0;
		try {
		$this->connection = Connection::getInstance();
		$statement = $this->connection->executeNonQuery($sql,$parameters);		
		}catch (PDOException $ex) {
			throw $ex;
		}

		return $statement;
    }
    
    public function updateState($id,$newState)
	{
		try {
            $parameters['newState'] = $newState;
			$parameters ['id'] = $id;
			$query = "UPDATE rooms SET state = :newState WHERE idRooms = :id";		
			
			$this->connection = Connection::getInstance();
			$value = $this->connection->executeNonQuery($query,$parameters);

		} catch (PDOException $e) {
			throw $e;
		}
		return $value;
	}
	
	public function updateCinema($id,$newCinema)
	{
		try {
            $parameters['newCinema'] = $newCinema;
			$parameters ['id'] = $id;
			$query = "UPDATE rooms SET id_cinema = :newCinema WHERE idRooms = :id";		
			
			$this->connection = Connection::getInstance();
			$value = $this->connection->executeNonQuery($query,$parameters);

		} catch (PDOException $e) {
			throw $e;
		}
		return $value;
    }

	public function updateName($id,$nombre)
	{
		try {
            $parameters['room'] = $nombre;
			$parameters ['id'] = $id;
			$query = "UPDATE rooms SET room_name = :room WHERE idRooms = :id";		
			
			$this->connection = Connection::getInstance();
			$value = $this->connection->executeNonQuery($query,$parameters);

		} catch (PDOException $e) {
			throw $e;
		}
		return $value;
    }
    
    public function updateIdroom($id,$idroom)
	{
		try {
            $parameters['new'] = $idroom;
			$parameters ['id'] = $id;
			$query = "UPDATE rooms SET id_room = :new WHERE idRooms = :id";		
			
			$this->connection = Connection::getInstance();
			$value = $this->connection->executeNonQuery($query,$parameters);

		} catch (PDOException $e) {
			throw $e;
		}
		return $value;
    }
    
    public function updateCapacity($id,$newCapacity)
	{
		try {
            $parameters['newCapacity'] = $newCapacity;
			$parameters ['id'] = $id;
			$query = "UPDATE rooms SET capacity = :newCapacity WHERE idRooms = :id";		
			
			$this->connection = Connection::getInstance();
			$value = $this->connection->executeNonQuery($query,$parameters);

		} catch (PDOException $e) {
			throw $e;
		}
		return $value;
    }
    
    public function updateTicketPrice($id,$newPrice)
	{
		try {
            $parameters['newPrice'] = $newPrice;
			$parameters ['id'] = $id;
			$query = "UPDATE rooms SET ticket_price = :newPrice WHERE idRooms = :id";		
			
			$this->connection = Connection::getInstance();
			$value = $this->connection->executeNonQuery($query,$parameters);

		} catch (PDOException $e) {
			throw $e;
		}
		return $value;
	}

}

 ?>