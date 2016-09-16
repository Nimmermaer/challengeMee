<?php
namespace ChallengeTeam\Challenge\Controller;

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
 * ChallengeController
 */
class ChallengeController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * challengeRepository
     * 
     * @var \ChallengeTeam\Challenge\Domain\Repository\ChallengeRepository
     * @inject
     */
    protected $challengeRepository = NULL;
    
    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $challenges = $this->challengeRepository->findAll();
        $this->view->assign('challenges', $challenges);
    }
    
    /**
     * action show
     * 
     * @param \ChallengeTeam\Challenge\Domain\Model\Challenge $challenge
     * @return void
     */
    public function showAction(\ChallengeTeam\Challenge\Domain\Model\Challenge $challenge)
    {
        $this->view->assign('challenge', $challenge);
    }
    
    /**
     * action new
     * 
     * @return void
     */
    public function newAction()
    {
        
    }
    
    /**
     * action create
     * 
     * @param \ChallengeTeam\Challenge\Domain\Model\Challenge $newChallenge
     * @return void
     */
    public function createAction(\ChallengeTeam\Challenge\Domain\Model\Challenge $newChallenge)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->challengeRepository->add($newChallenge);
        $this->redirect('list');
    }
    
    /**
     * action edit
     * 
     * @param \ChallengeTeam\Challenge\Domain\Model\Challenge $challenge
     * @ignorevalidation $challenge
     * @return void
     */
    public function editAction(\ChallengeTeam\Challenge\Domain\Model\Challenge $challenge)
    {
        $this->view->assign('challenge', $challenge);
    }
    
    /**
     * action update
     * 
     * @param \ChallengeTeam\Challenge\Domain\Model\Challenge $challenge
     * @return void
     */
    public function updateAction(\ChallengeTeam\Challenge\Domain\Model\Challenge $challenge)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->challengeRepository->update($challenge);
        $this->redirect('list');
    }
    
    /**
     * action delete
     * 
     * @param \ChallengeTeam\Challenge\Domain\Model\Challenge $challenge
     * @return void
     */
    public function deleteAction(\ChallengeTeam\Challenge\Domain\Model\Challenge $challenge)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->challengeRepository->remove($challenge);
        $this->redirect('list');
    }
    
    /**
     * action sortingWithLike
     * 
     * @return void
     */
    public function sortingWithLikeAction()
    {
        
    }
    
    /**
     * action showMoves
     * 
     * @return void
     */
    public function showMovesAction()
    {
        
    }
    
    /**
     * action filter
     * 
     * @return void
     */
    public function filterAction()
    {
        
    }
    
    /**
     * action share
     * 
     * @return void
     */
    public function shareAction()
    {
        
    }
    
    /**
     * action invitePlayer
     * 
     * @return void
     */
    public function invitePlayerAction()
    {
        
    }

}