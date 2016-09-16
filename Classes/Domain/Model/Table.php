<?php
namespace ChallengeTeam\Challenge\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Michael Blunck <michidrau@gmail.com>
 *           Mirco Winkler <mirco.winkler@gmail.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Table
 */
class Table extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * month
     * 
     * @var \DateTime
     */
    protected $month = null;
    
    /**
     * year
     * 
     * @var string
     */
    protected $year = '';
    
    /**
     * challenges
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChallengeTeam\Challenge\Domain\Model\Challenge>
     * @cascade remove
     * @lazy
     */
    protected $challenges = null;
    
    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }
    
    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     * 
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->challenges = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }
    
    /**
     * Returns the month
     * 
     * @return \DateTime $month
     */
    public function getMonth()
    {
        return $this->month;
    }
    
    /**
     * Sets the month
     * 
     * @param \DateTime $month
     * @return void
     */
    public function setMonth(\DateTime $month)
    {
        $this->month = $month;
    }
    
    /**
     * Returns the year
     * 
     * @return string $year
     */
    public function getYear()
    {
        return $this->year;
    }
    
    /**
     * Sets the year
     * 
     * @param string $year
     * @return void
     */
    public function setYear($year)
    {
        $this->year = $year;
    }
    
    /**
     * Adds a Challenge
     * 
     * @param \ChallengeTeam\Challenge\Domain\Model\Challenge $challenge
     * @return void
     */
    public function addChallenge(\ChallengeTeam\Challenge\Domain\Model\Challenge $challenge)
    {
        $this->challenges->attach($challenge);
    }
    
    /**
     * Removes a Challenge
     * 
     * @param \ChallengeTeam\Challenge\Domain\Model\Challenge $challengeToRemove The Challenge to be removed
     * @return void
     */
    public function removeChallenge(\ChallengeTeam\Challenge\Domain\Model\Challenge $challengeToRemove)
    {
        $this->challenges->detach($challengeToRemove);
    }
    
    /**
     * Returns the challenges
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChallengeTeam\Challenge\Domain\Model\Challenge> $challenges
     */
    public function getChallenges()
    {
        return $this->challenges;
    }
    
    /**
     * Sets the challenges
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChallengeTeam\Challenge\Domain\Model\Challenge> $challenges
     * @return void
     */
    public function setChallenges(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $challenges)
    {
        $this->challenges = $challenges;
    }

}