<?php
namespace ChallengeTeam\Challenge\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 Michael Blunck <michidrau@gmail.com>
 *  			Mirco Winkler <mirco.winkler@gmail.com>
 *  			
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class ChallengeTeam\Challenge\Controller\PlayerController.
 *
 * @author Michael Blunck <michidrau@gmail.com>
 * @author Mirco Winkler <mirco.winkler@gmail.com>
 */
class PlayerControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \ChallengeTeam\Challenge\Controller\PlayerController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('ChallengeTeam\\Challenge\\Controller\\PlayerController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllPlayersFromRepositoryAndAssignsThemToView()
	{

		$allPlayers = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$playerRepository = $this->getMock('ChallengeTeam\\Challenge\\Domain\\Repository\\PlayerRepository', array('findAll'), array(), '', FALSE);
		$playerRepository->expects($this->once())->method('findAll')->will($this->returnValue($allPlayers));
		$this->inject($this->subject, 'playerRepository', $playerRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('players', $allPlayers);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenPlayerToView()
	{
		$player = new \ChallengeTeam\Challenge\Domain\Model\Player();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('player', $player);

		$this->subject->showAction($player);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenPlayerToPlayerRepository()
	{
		$player = new \ChallengeTeam\Challenge\Domain\Model\Player();

		$playerRepository = $this->getMock('ChallengeTeam\\Challenge\\Domain\\Repository\\PlayerRepository', array('add'), array(), '', FALSE);
		$playerRepository->expects($this->once())->method('add')->with($player);
		$this->inject($this->subject, 'playerRepository', $playerRepository);

		$this->subject->createAction($player);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenPlayerToView()
	{
		$player = new \ChallengeTeam\Challenge\Domain\Model\Player();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('player', $player);

		$this->subject->editAction($player);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenPlayerInPlayerRepository()
	{
		$player = new \ChallengeTeam\Challenge\Domain\Model\Player();

		$playerRepository = $this->getMock('ChallengeTeam\\Challenge\\Domain\\Repository\\PlayerRepository', array('update'), array(), '', FALSE);
		$playerRepository->expects($this->once())->method('update')->with($player);
		$this->inject($this->subject, 'playerRepository', $playerRepository);

		$this->subject->updateAction($player);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenPlayerFromPlayerRepository()
	{
		$player = new \ChallengeTeam\Challenge\Domain\Model\Player();

		$playerRepository = $this->getMock('ChallengeTeam\\Challenge\\Domain\\Repository\\PlayerRepository', array('remove'), array(), '', FALSE);
		$playerRepository->expects($this->once())->method('remove')->with($player);
		$this->inject($this->subject, 'playerRepository', $playerRepository);

		$this->subject->deleteAction($player);
	}
}
