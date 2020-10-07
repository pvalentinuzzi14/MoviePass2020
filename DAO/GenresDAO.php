<?php
    namespace DAO;

    use Models\Genre as Genre;

    class GenresDAO{
       
        private $list = array();
        private $fileName;

        public function __construct()
        {
            $this->fileName = dirname(__DIR__)."/Data/genres.json";
        }

        public function GetAll()
        {
            $this->RetrieveData();
            return $this->list;
        }   

        private function SaveData()
        {
            $arrayToEncode = json_decode(file_get_contents('https://api.themoviedb.org/3/genre/movie/list?api_key=2f0f4f905a5085a4cb6411b8c639165b&language=en-US'),true);
            foreach($this->list as $genre)
            {   
                $valuesArray["id"] = $genre->getId();
                $valuesArray["name"] = $genre->getName();
                array_push($arrayToEncode,$valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

            file_put_contents($this->fileName, $jsonContent);
        }

        private function RetrieveData()
        {
            $this->list = array();
            if(file_exists($this->fileName))
            {
                $jsonContent = file_get_contents($this->fileName);
                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent,true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $genre = new Genre();
                    $genre->setId($valuesArray["id"]);
                    $genre->setName($valuesArray["name"]);
                    array_push($this->list,$genre);
                }
            }
        }

    }
?>