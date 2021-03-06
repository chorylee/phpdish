<?php
/**
 * PHPDish comment component.
 *
 * @author Tao <taosikai@yeah.net>
 */

namespace  PHPDish\Bundle\CoreBundle\Model;

use PHPDish\Bundle\UserBundle\Model\UserAwareInterface;

interface CommentInterface extends IdentifiableInterface, ContentInterface, DateTimeInterface, UserAwareInterface, EnabledInterface
{
}
