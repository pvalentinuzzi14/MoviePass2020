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
				$query = "INSERT INTO rooms (state,room_name,capacity,ticket_price) VALUES (:state,:room_name,:capacity,:ticket_price)";
				$parameters["state"] = $item->getState();
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
		return $room;
	}

	public function getAll()
	{
		$roomsList = array();

		try {
			$sql = "SELECT * FROM rooms";
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

	public function getOne($id)
	{
		$room = null;

		try {
			$parameters['id'] = $id; 

			$sql = "SELECT * FROM rooms WHERE idRooms=:id";
			
			$this->connection = Connection::getInstance();
			
			$statement = $this->connection->execute($sql);

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

        $sql = "UPDATE rooms SET (state= :delete_state) WHERE idRooms=:id";
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
			$query = "UPDATE rooms SET (state = :newState) WHERE idRooms = :id";		
			
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
			$query = "UPDATE rooms SET (room_name = :room) WHERE idRooms = :id";		
			
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
			$query = "UPDATE rooms SET (id_room = :new) WHERE idRooms = :id";		
			
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
			$query = "UPDATE rooms SET (capacity = :newCapacity) WHERE idRooms = :id";		
			
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
			$query = "UPDATE rooms SET (ticket_price = :newPrice) WHERE idRooms = :id";		
			
			$this->connection = Connection::getInstance();
			$value = $this->connection->executeNonQuery($query,$parameters);

		} catch (PDOException $e) {
			throw $e;
		}
		return $value;
	}

}

 ?>