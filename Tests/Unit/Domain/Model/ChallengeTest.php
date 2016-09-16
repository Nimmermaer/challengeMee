<?php

namespace ChallengeTeam\Challenge\Tests\Unit\Domain\Model;

/***************************************************************
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
 * Test case for class \ChallengeTeam\Challenge\Domain\Model\Challenge.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Michael Blunck <michidrau@gmail.com>
 * @author Mirco Winkler <mirco.winkler@gmail.com>
 */
class ChallengeTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \ChallengeTeam\Challenge\Domain\Model\Challenge
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \ChallengeTeam\Challenge\Domain\Model\Challenge();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getTitle()
		);
	}

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle()
	{
		$this->subject->setTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'title',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getDescription()
		);
	}

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription()
	{
		$this->subject->setDescription('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'description',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getReckoningReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getReckoning()
		);
	}

	/**
	 * @test
	 */
	public function setReckoningForStringSetsReckoning()
	{
		$this->subject->setReckoning('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'reckoning',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLikesReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setLikesForIntSetsLikes()
	{	}

	/**
	 * @test
	 */
	public function getWinningPointReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setWinningPointForIntSetsWinningPoint()
	{	}

	/**
	 * @test
	 */
	public function getQrCodeReturnsInitialValueForFileReference()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getQrCode()
		);
	}

	/**
	 * @test
	 */
	public function setQrCodeForFileReferenceSetsQrCode()
	{
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setQrCode($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'qrCode',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getMovesReturnsInitialValueForMove()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getMoves()
		);
	}

	/**
	 * @test
	 */
	public function setMovesForMoveSetsMoves()
	{
		$movesFixture = new \ChallengeTeam\Challenge\Domain\Model\Move();
		$this->subject->setMoves($movesFixture);

		$this->assertAttributeEquals(
			$movesFixture,
			'moves',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getOwnerReturnsInitialValueForPlayer()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getOwner()
		);
	}

	/**
	 * @test
	 */
	public function setOwnerForObjectStorageContainingPlayerSetsOwner()
	{
		$owner = new \ChallengeTeam\Challenge\Domain\Model\Player();
		$objectStorageHoldingExactlyOneOwner = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneOwner->attach($owner);
		$this->subject->setOwner($objectStorageHoldingExactlyOneOwner);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneOwner,
			'owner',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addOwnerToObjectStorageHoldingOwner()
	{
		$owner = new \ChallengeTeam\Challenge\Domain\Model\Player();
		$ownerObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$ownerObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($owner));
		$this->inject($this->subject, 'owner', $ownerObjectStorageMock);

		$this->subject->addOwner($owner);
	}

	/**
	 * @test
	 */
	public function removeOwnerFromObjectStorageHoldingOwner()
	{
		$owner = new \ChallengeTeam\Challenge\Domain\Model\Player();
		$ownerObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$ownerObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($owner));
		$this->inject($this->subject, 'owner', $ownerObjectStorageMock);

		$this->subject->removeOwner($owner);

	}
}
