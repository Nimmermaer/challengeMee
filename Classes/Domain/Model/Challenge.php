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
 * Challenge
 */
class Challenge extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     * 
     * @var string
     * @validate NotEmpty
     */
    protected $title = '';
    
    /**
     * description
     * 
     * @var string
     */
    protected $description = '';
    
    /**
     * reckoning
     * 
     * @var string
     */
    protected $reckoning = '';
    
    /**
     * likes
     * 
     * @var int
     */
    protected $likes = 0;
    
    /**
     * winningPoint
     * 
     * @var int
     */
    protected $winningPoint = 0;
    
    /**
     * qrCode
     * 
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $qrCode = null;
    
    /**
     * owner
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChallengeTeam\Challenge\Domain\Model\Player>
     * @cascade remove
     * @lazy
     */
    protected $owner = null;
    
    /**
     * moves
     * 
     * @var \ChallengeTeam\Challenge\Domain\Model\Move
     * @lazy
     */
    protected $moves = null;
    
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
        $this->owner = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }
    
    /**
     * Returns the title
     * 
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Sets the title
     * 
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    /**
     * Returns the description
     * 
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Sets the description
     * 
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    /**
     * Returns the reckoning
     * 
     * @return string $reckoning
     */
    public function getReckoning()
    {
        return $this->reckoning;
    }
    
    /**
     * Sets the reckoning
     * 
     * @param string $reckoning
     * @return void
     */
    public function setReckoning($reckoning)
    {
        $this->reckoning = $reckoning;
    }
    
    /**
     * Returns the likes
     * 
     * @return int $likes
     */
    public function getLikes()
    {
        return $this->likes;
    }
    
    /**
     * Sets the likes
     * 
     * @param int $likes
     * @return void
     */
    public function setLikes($likes)
    {
        $this->likes = $likes;
    }
    
    /**
     * Returns the winningPoint
     * 
     * @return int $winningPoint
     */
    public function getWinningPoint()
    {
        return $this->winningPoint;
    }
    
    /**
     * Sets the winningPoint
     * 
     * @param string $winningPoint
     * @return void
     */
    public function setWinningPoint($winningPoint)
    {
        $this->winningPoint = $winningPoint;
    }
    
    /**
     * Returns the qrCode
     * 
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $qrCode
     */
    public function getQrCode()
    {
        return $this->qrCode;
    }
    
    /**
     * Sets the qrCode
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $qrCode
     * @return void
     */
    public function setQrCode(\TYPO3\CMS\Extbase\Domain\Model\FileReference $qrCode)
    {
        $this->qrCode = $qrCode;
    }
    
    /**
     * Adds a Player
     * 
     * @param \ChallengeTeam\Challenge\Domain\Model\Player $owner
     * @return void
     */
    public function addOwner(\ChallengeTeam\Challenge\Domain\Model\Player $owner)
    {
        $this->owner->attach($owner);
    }
    
    /**
     * Removes a Player
     * 
     * @param \ChallengeTeam\Challenge\Domain\Model\Player $ownerToRemove The Player to be removed
     * @return void
     */
    public function removeOwner(\ChallengeTeam\Challenge\Domain\Model\Player $ownerToRemove)
    {
        $this->owner->detach($ownerToRemove);
    }
    
    /**
     * Returns the owner
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChallengeTeam\Challenge\Domain\Model\Player> $owner
     */
    public function getOwner()
    {
        return $this->owner;
    }
    
    /**
     * Sets the owner
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChallengeTeam\Challenge\Domain\Model\Player> $owner
     * @return void
     */
    public function setOwner(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $owner)
    {
        $this->owner = $owner;
    }
    
    /**
     * Returns the moves
     * 
     * @return \ChallengeTeam\Challenge\Domain\Model\Move $moves
     */
    public function getMoves()
    {
        return $this->moves;
    }
    
    /**
     * Sets the moves
     * 
     * @param \ChallengeTeam\Challenge\Domain\Model\Move $moves
     * @return void
     */
    public function setMoves(\ChallengeTeam\Challenge\Domain\Model\Move $moves)
    {
        $this->moves = $moves;
    }

}