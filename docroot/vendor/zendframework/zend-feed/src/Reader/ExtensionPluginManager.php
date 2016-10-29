<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Zend\Feed\Reader;

use Zend\ServiceManager\AbstractPluginManager;
<<<<<<< HEAD
=======
use Zend\ServiceManager\Exception\InvalidServiceException;
use Zend\ServiceManager\Factory\InvokableFactory;
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9

/**
 * Plugin manager implementation for feed reader extensions based on the
 * AbstractPluginManager.
 *
 * Validation checks that we have an Extension\AbstractEntry or
 * Extension\AbstractFeed.
 */
class ExtensionPluginManager extends AbstractPluginManager
{
    /**
<<<<<<< HEAD
     * Default set of extension classes
     *
     * @var array
     */
    protected $invokableClasses = [
        'atomentry'            => 'Zend\Feed\Reader\Extension\Atom\Entry',
        'atomfeed'             => 'Zend\Feed\Reader\Extension\Atom\Feed',
        'contententry'         => 'Zend\Feed\Reader\Extension\Content\Entry',
        'creativecommonsentry' => 'Zend\Feed\Reader\Extension\CreativeCommons\Entry',
        'creativecommonsfeed'  => 'Zend\Feed\Reader\Extension\CreativeCommons\Feed',
        'dublincoreentry'      => 'Zend\Feed\Reader\Extension\DublinCore\Entry',
        'dublincorefeed'       => 'Zend\Feed\Reader\Extension\DublinCore\Feed',
        'podcastentry'         => 'Zend\Feed\Reader\Extension\Podcast\Entry',
        'podcastfeed'          => 'Zend\Feed\Reader\Extension\Podcast\Feed',
        'slashentry'           => 'Zend\Feed\Reader\Extension\Slash\Entry',
        'syndicationfeed'      => 'Zend\Feed\Reader\Extension\Syndication\Feed',
        'threadentry'          => 'Zend\Feed\Reader\Extension\Thread\Entry',
        'wellformedwebentry'   => 'Zend\Feed\Reader\Extension\WellFormedWeb\Entry',
    ];

    /**
     * Do not share instances
=======
     * Aliases for default set of extension classes
     *
     * @var array
     */
    protected $aliases = [
        'atomentry'            => Extension\Atom\Entry::class,
        'atomEntry'            => Extension\Atom\Entry::class,
        'AtomEntry'            => Extension\Atom\Entry::class,
        'atomfeed'             => Extension\Atom\Feed::class,
        'atomFeed'             => Extension\Atom\Feed::class,
        'AtomFeed'             => Extension\Atom\Feed::class,
        'contententry'         => Extension\Content\Entry::class,
        'contentEntry'         => Extension\Content\Entry::class,
        'ContentEntry'         => Extension\Content\Entry::class,
        'creativecommonsentry' => Extension\CreativeCommons\Entry::class,
        'creativeCommonsEntry' => Extension\CreativeCommons\Entry::class,
        'CreativeCommonsEntry' => Extension\CreativeCommons\Entry::class,
        'creativecommonsfeed'  => Extension\CreativeCommons\Feed::class,
        'creativeCommonsFeed'  => Extension\CreativeCommons\Feed::class,
        'CreativeCommonsFeed'  => Extension\CreativeCommons\Feed::class,
        'dublincoreentry'      => Extension\DublinCore\Entry::class,
        'dublinCoreEntry'      => Extension\DublinCore\Entry::class,
        'DublinCoreEntry'      => Extension\DublinCore\Entry::class,
        'dublincorefeed'       => Extension\DublinCore\Feed::class,
        'dublinCoreFeed'       => Extension\DublinCore\Feed::class,
        'DublinCoreFeed'       => Extension\DublinCore\Feed::class,
        'podcastentry'         => Extension\Podcast\Entry::class,
        'podcastEntry'         => Extension\Podcast\Entry::class,
        'PodcastEntry'         => Extension\Podcast\Entry::class,
        'podcastfeed'          => Extension\Podcast\Feed::class,
        'podcastFeed'          => Extension\Podcast\Feed::class,
        'PodcastFeed'          => Extension\Podcast\Feed::class,
        'slashentry'           => Extension\Slash\Entry::class,
        'slashEntry'           => Extension\Slash\Entry::class,
        'SlashEntry'           => Extension\Slash\Entry::class,
        'syndicationfeed'      => Extension\Syndication\Feed::class,
        'syndicationFeed'      => Extension\Syndication\Feed::class,
        'SyndicationFeed'      => Extension\Syndication\Feed::class,
        'threadentry'          => Extension\Thread\Entry::class,
        'threadEntry'          => Extension\Thread\Entry::class,
        'ThreadEntry'          => Extension\Thread\Entry::class,
        'wellformedwebentry'   => Extension\WellFormedWeb\Entry::class,
        'wellFormedWebEntry'   => Extension\WellFormedWeb\Entry::class,
        'WellFormedWebEntry'   => Extension\WellFormedWeb\Entry::class,
    ];

    /**
     * Factories for default set of extension classes
     *
     * @var array
     */
    protected $factories = [
        Extension\Atom\Entry::class            => InvokableFactory::class,
        Extension\Atom\Feed::class             => InvokableFactory::class,
        Extension\Content\Entry::class         => InvokableFactory::class,
        Extension\CreativeCommons\Entry::class => InvokableFactory::class,
        Extension\CreativeCommons\Feed::class  => InvokableFactory::class,
        Extension\DublinCore\Entry::class      => InvokableFactory::class,
        Extension\DublinCore\Feed::class       => InvokableFactory::class,
        Extension\Podcast\Entry::class         => InvokableFactory::class,
        Extension\Podcast\Feed::class          => InvokableFactory::class,
        Extension\Slash\Entry::class           => InvokableFactory::class,
        Extension\Syndication\Feed::class      => InvokableFactory::class,
        Extension\Thread\Entry::class          => InvokableFactory::class,
        Extension\WellFormedWeb\Entry::class   => InvokableFactory::class,
        // Legacy (v2) due to alias resolution; canonical form of resolved
        // alias is used to look up the factory, while the non-normalized
        // resolved alias is used as the requested name passed to the factory.
        'zendfeedreaderextensionatomentry'            => InvokableFactory::class,
        'zendfeedreaderextensionatomfeed'             => InvokableFactory::class,
        'zendfeedreaderextensioncontententry'         => InvokableFactory::class,
        'zendfeedreaderextensioncreativecommonsentry' => InvokableFactory::class,
        'zendfeedreaderextensioncreativecommonsfeed'  => InvokableFactory::class,
        'zendfeedreaderextensiondublincoreentry'      => InvokableFactory::class,
        'zendfeedreaderextensiondublincorefeed'       => InvokableFactory::class,
        'zendfeedreaderextensionpodcastentry'         => InvokableFactory::class,
        'zendfeedreaderextensionpodcastfeed'          => InvokableFactory::class,
        'zendfeedreaderextensionslashentry'           => InvokableFactory::class,
        'zendfeedreaderextensionsyndicationfeed'      => InvokableFactory::class,
        'zendfeedreaderextensionthreadentry'          => InvokableFactory::class,
        'zendfeedreaderextensionwellformedwebentry'   => InvokableFactory::class,
    ];

    /**
     * Do not share instances (v2)
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     *
     * @var bool
     */
    protected $shareByDefault = false;

    /**
<<<<<<< HEAD
=======
     * Do not share instances (v3)
     *
     * @var bool
     */
    protected $sharedByDefault = false;

    /**
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     * Validate the plugin
     *
     * Checks that the extension loaded is of a valid type.
     *
     * @param  mixed $plugin
     * @return void
     * @throws Exception\InvalidArgumentException if invalid
     */
<<<<<<< HEAD
    public function validatePlugin($plugin)
=======
    public function validate($plugin)
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
    {
        if ($plugin instanceof Extension\AbstractEntry
            || $plugin instanceof Extension\AbstractFeed
        ) {
            // we're okay
            return;
        }

<<<<<<< HEAD
        throw new Exception\InvalidArgumentException(sprintf(
=======
        throw new InvalidServiceException(sprintf(
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
            'Plugin of type %s is invalid; must implement %s\Extension\AbstractFeed '
            . 'or %s\Extension\AbstractEntry',
            (is_object($plugin) ? get_class($plugin) : gettype($plugin)),
            __NAMESPACE__,
            __NAMESPACE__
        ));
    }
<<<<<<< HEAD
=======

    /**
     * Validate the plugin (v2)
     *
     * @param  mixed $plugin
     * @return void
     * @throws Exception\InvalidArgumentException if invalid
     */
    public function validatePlugin($plugin)
    {
        try {
            $this->validate($plugin);
        } catch (InvalidServiceException $e) {
            throw new Exception\InvalidArgumentException(sprintf(
                'Plugin of type %s is invalid; must implement %s\Extension\AbstractFeed '
                . 'or %s\Extension\AbstractEntry',
                (is_object($plugin) ? get_class($plugin) : gettype($plugin)),
                __NAMESPACE__,
                __NAMESPACE__
            ));
        }
    }
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
}
