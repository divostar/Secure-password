<?php namespace Bobkingstone\Securepass;


/**
 * Class Securepass
 * @package Bobkingstone\Securepass
 */
class Securepass {

    /**
     * @var array
     */
    protected $specials = ['$','£','-','&','*','+','@',':','?','{','}','~','!','^','[',']'];


    /**
     * @param $start
     * @param $limit
     * @return int
     */
    private function getRandomNumber ($start, $limit)
    {
        $random = rand($start,$limit);

        return $random;
    }

    /**
     * @return mixed
     */
    private function getRandomSpecial ()
    {
        $specialsLength = count($this->specials) -1;

        $randIndex = $this->getRandomNumber(0,$specialsLength);

        return $this->specials[$randIndex];
    }

    /**
     * @param int $length
     * @return string
     */
    private function getRandomString($length = 10)
    {
        return str_random($length);
    }

    /**
     * @param int $length
     * @param bool $specials
     * @return array|string
     */
    public function generate($length = 10, $specials = false)
    {

        $string = $this->getRandomString($length);

        if ($specials)
        {
            $string = $this->insertRandomCharacter($string);
        }

        return $string;

    }

    public function generateHuman()
    {
        $string = $this->returnRandomWord();

        $string = $this->insertRandomCharacter($string);

        return $string;
    }

    /**
     * @param $string
     * @return array|string
     */
    private function insertRandomCharacter($string)
    {
        $array = str_split($string);
        $length = strlen($string);

        for($i = 0; $i <= rand(1,4); $i++)
        {
            $symbol = $this->getRandomSpecial();
            $indexToSwop = $this->getRandomNumber(0,$length);

            $array[$indexToSwop] = $symbol;
        }

        $array = implode($array);

        return $array;
    }

    /**
     * @return array
     */
    private function readFileContentsToArray()
    {
        $array = file('wordList.txt', FILE_SKIP_EMPTY_LINES);

        return $array;
    }

    /**
     * @return mixed
     */
    private function returnRandomWord()
    {
        $wordList = readFileContentsToArray();

        $count = getLengthOfArray();

        $random = getRandomNumber(0,$count);

        $word = $wordList[$random];

        return $word;

    }
}