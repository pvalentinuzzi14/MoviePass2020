<?php
    namespace DAO;

    use Models\Genre as Genre;

    class Genres{
       
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

        public function RefreshData()
        {
            $arrayToDecode = json_decode(file_get_contents('https://api.themoviedb.org/3/genre/movie/list?api_key=2f0f4f905a5085a4cb6411b8c639165b&language=en-US'),true);

            foreach($arrayToDecode['genres'] as $valuesArray)
            {
                $movie = new Genre();
                $movie->setId($valuesArray["id"]); 
                $movie->setName($valuesArray["name"]);
                array_push($this->list,$movie);
            }

            $jsonContent = json_encode($arrayToDecode['genres'], JSON_PRETTY_PRINT);

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